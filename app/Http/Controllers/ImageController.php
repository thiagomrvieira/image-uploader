<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('images.index');
    }

    public function show()
    {
        //  Return all images
    }

    public function store(Request $request)
    {
        //  Save the image to the database
    }
}
