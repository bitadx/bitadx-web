<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Enquiry::count();
        $products = Course::count();
        return view('backend.index', compact('orders','products'));
    }

}
