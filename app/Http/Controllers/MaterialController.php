<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Material;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        return view('backend.material.index',[
            'materials' => $materials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'category' => 'required',
            'document' => 'required',
            'video' => 'required',
        ]);

        
        $material = new Material;
        $material->title = $request->title;
        $material->content = $request->content;
        $material->category_id = $request->category;
        $path = $request->document->store('public/documents');
        $material->document = Str::substr($path,6); 
        $path = $request->video->store('public/videos');
        $material->video = Str::substr($path,6);
        
        $material->save();
        return redirect('/material');
    }

    /*public function getVideo(Video $video){
        $name = $video->name;
        $fileContents = Storage::disk('local')->get("uploads/videos/{$name}");
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $material = Material::find($id);
        return view('backend.material.show', compact('material'));
        //dd($material->video);
        //returns the view with the post
    }

    public function getVideo($path){
        $video = Storage::disk('local')->get($path);
        $response = Response::make($video, 200);
        $response->header('Content-Type', 'video/mp4');
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        return view('backend.material.edit', compact('material'));
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
        $material = Material::find($id);
        $material->title = $request->title;
        $material->content = $request->content;
        $material->category_id = $request->category;
        $material->save();
        return redirect('/material');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rekt = Material::find($id);
        $rekt->delete();
        return redirect('/material');
    }
    
}
