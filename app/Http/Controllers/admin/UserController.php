<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); // Pagination
        return view('admin.UserData', compact('users')); // Make sure the view file name matches
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user')); // Ensure this view exists
    }

    public function update(Request $request, $id)
    {    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'role' => 'required|in:customer,admin',  // Ensure the role is validated
        ]);
    
        $user = User::findOrFail($id);
    
        // Only update the user if the role is valid
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->contact_number,
            'role' => $request->role,  // This should match 'customer' or 'admin'
        ]);
    
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }
    
    
}
