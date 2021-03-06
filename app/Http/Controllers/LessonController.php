<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('backend.lesson.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lesson.assign');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = (new Category)->assignLesson($request->all());
        return redirect()->back()->with('message', 'Kelas Berhasil dipilihkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $user_id = $request->get('user_id');
        $category_id = $request->get('category_id');
        $category = Category::find($category_id);
        $category->users()->detach($user_id);
        return redirect()->back()->with('message', 'pemasangan Pelajaran berhasil dihapus');
        /*$result = Result::where('category_id',$category_id)->where('user_id',$user_id)->exists();
        if($result){
            return redirect()->back()->with('message', 'User sudah mengerjakan kuis, tidak bisa dihapus');
        }
        else{
            $category->users()->detach($user_id);
            return redirect()->back()->with('message', 'pemasangan Kuis berhasil dihapus');
        }*/

    }
}
