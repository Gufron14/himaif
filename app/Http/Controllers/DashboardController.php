<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard() {
        return view('admin.dashboard.index');
    }

    function announcement() {
        return view('admin.announcement');
    }
}
