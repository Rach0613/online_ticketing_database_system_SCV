<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Seat;

class ShowController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('order_by', 'date'); // Default column to 'date'
        $orderDirection = $request->input('direction', 'asc'); // Default to ascending

        // Retrieve sorted shows from the database
        $shows = Show::orderBy('date', $orderDirection)
                     ->orderByRaw("FIELD(slot, 'MORNING', 'AFTERNOON', 'EVENING')") // Secondary sort by date
                     ->get();
        return view('admin.shows.index', compact('shows'));
    }

    public function create()
    {
        return view('admin.shows.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'slot' => 'required|in:morning,afternoon,evening',
        ]);
    
        // Check if a show for the same date and slot already exists
        $existingShow = Show::where('date', $validated['date'])
            ->where('slot', $validated['slot'])
            ->first();
    
        if ($existingShow) {
            return redirect()->back()->with('error', 'A show for the selected date and slot already exists.');
        }
    
        // Create the new show
        $show = Show::create($validated);
    
        // Ensure no duplicate seats are created
        if (!Seat::where('show_id', $show->id)->exists()) {
            foreach (range('A', 'E') as $row) {
                for ($number = 1; $number <= 12; $number++) {
                    Seat::create([
                        'row' => $row,
                        'number' => $number,
                        'show_id' => $show->id,
                        'status' => 'available',
                    ]);
                }
            }
        } else {
            return redirect()->route('admin.shows.create')->with('error', 'This Date and Slot already exist!');
        }
    
        // Use double quotes or concatenation for dynamic success message
        return redirect()->route('admin.shows.index')->with('success', "Show created for {$show->date} in the {$show->slot} slot successfully!");
    }

    public function edit($id)
    {
        $show = Show::findOrFail($id);
        return view('admin.shows.edit', compact('show'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'date' => 'required|date',
            'slot' => 'required|in:morning,afternoon,evening|unique:shows,slot,' . $id . ',id,date,' . $request->date,
        ]);

        // Update the show
        $show = Show::findOrFail($id);
        $show->update($validated);

        return redirect()->route('admin.shows.index')->with('success', 'Show updated successfully!');
    }

    public function destroy($id)
    {
        // Find the show and delete it
        $show = Show::findOrFail($id);
        $show->delete();

        return redirect()->route('admin.shows.index')->with('success', 'Show deleted successfully!');
    }
    }
