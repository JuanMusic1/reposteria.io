<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;


class ExerciseController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::all();
        return view('exercises.create', compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // Validate shit
        $request->validate([
            'exercise_title'=>'required',
            'exercise_description'=> 'required',
            'exercise_tag' => 'required'
          ]);

        
        $exercises = new Share([
            'exercise_title' => $request->get('exercise_title'),
            'exercise_description'=> $request->get('exercise_description'),
            'exercise_tag'=> $request->get('exercise_tag')
        ]);
        
        $exercises->save();
        
            
        // Get files
        $files = $request->file('attachment');
        if($request->hasFile('attachment'))
        {
            foreach ($files as $file) {
                $file->store('users/' . $this->user->id . '/messages');
            }
        }

        return redirect('/exercises')->with('success', 'Ejercicio agregado correctamente');

        

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
