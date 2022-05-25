<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class MainController extends Controller
{
    public function index()
    {
        $photos = Album::getAllPhotos();
        return view('welcome', compact('photos'));
    }
}
