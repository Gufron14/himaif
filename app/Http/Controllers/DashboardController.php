<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard() {
        return view('admin.dashboard');
    }

    function author(){
        return view('author.authorDashboard');
    }
}
