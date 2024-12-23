<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $submissions = Contact::orderBy('created_at', 'desc')->get(); // Sort by latest submission
        return view('admin.GetcontactUs', compact('submissions'));
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|digits_between:8,15',
            'subject' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'file' => 'nullable|image|max:2048', // Max file size: 2MB
        ]);

        // Handle file upload if provided
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
            \Log::info('File uploaded successfully: ' . $filePath); // Log the file path
        } else {
            \Log::info('No file uploaded');
        }
        

        \Log::info('Data to be saved:', [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contact_number'],
            'subject' => $validatedData['subject'],
            'description' => $validatedData['description'],
            'file_path' => $filePath,
        ]);
        
        Contact::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contact_number'],
            'subject' => $validatedData['subject'],
            'description' => $validatedData['description'],
            'file_path' => $filePath,
        ]);
        

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function destroy($id)
    {
        $submission = Contact::findOrFail($id); // Find the submission by ID
        $submission->delete(); // Delete the submission

        return redirect()->route('admin.contact.submissions')->with('success', 'Submission deleted successfully!');
    }
}
