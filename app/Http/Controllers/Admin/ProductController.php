<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Product/Index');
    }

    public function create()
    {
        return Inertia::render('Admin/Product/Create');
    }

    public function store(Request $request)
    {
        return $request->all();
    }
}
