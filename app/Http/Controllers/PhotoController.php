<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Album;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('admin.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Album $album){

        $request->validate([
            "image" => "required|array|min:1|max:3",
            "image.*" => "image",
        ]);
        
        if($request->hasFile('image') && $request->file('image')){
            // $album->addMediaFromRequest('image')->toMediaCollection($album->title);
            // dd($request);
            foreach($request->file('image') as $image) {
                $album->addMedia($image)->toMediaCollection($album->title);
             }
        }
    
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function remove(Album $album, $id)
    {
        $media = $album->getMedia($album->title);
        $photo = $media->where('id', $id)->first();
        $photo->delete();
        return redirect()->back();
    }
}
