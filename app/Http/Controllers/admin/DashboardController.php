<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }

    public function getContactUs(){
    $submissions = Contact::all(); // Retrieve all submissions
    return view('admin.GetcontactUs', compact('submissions'));
    } 
}
