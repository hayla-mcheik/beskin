<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AdminDashboardController extends Controller
{
    public function admindashboard()
    {
        $user = auth()->user();
        return view('admin.dashboard');
    }
}
