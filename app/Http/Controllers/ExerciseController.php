<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Exercise;
use App\File;

use Auth;
use Storage;


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

        // Save exercise

        $request->validate([
            'exercise_title'=>'required',
            'exercise_description'=> 'required',
            'exercise_tag' => 'required'
          ]);

        $exercises = new Exercise([
            'title' => $request->get('exercise_title'),
            'description' => $request->get('exercise_description'),
            'tag_id'=> $request->get('exercise_tag')
        ]);

        $exercises->save();
        

        // Save exercise_user

        $user = Auth::user()->id;
        $exercises->users()->attach($user);
        
        if($request->get('exercise_users') != "")
        {
            foreach (explode(',', $request->get('exercise_users')) as $id)
            {
                $exercises->users()->attach($id);
            }
        }


        // Save files
        
        if($request->hasFile('attachment'))
        {
            $allowedfileExtension = ['pdf','jpg','png','docx'];
            $attachments = $request->file('attachment');

            foreach ($attachments as $attachment)
            {

                $attachmentName = $attachment->getClientOriginalName();
                $extension      = $attachment->getClientOriginalExtension();
                $check          = in_array($extension,$allowedfileExtension);
                $filename       = $attachmentName.'_'.time().'.'.$extension;


                if($check)
                {   
                    // Storage
                    $attachment->storeAs('public/'.$exercises->id, $filename);

                    //Save in database
                    $files = new File([
                        'exercise_id' => $exercises->id,
                        'url' =>  $filename
                    ]);
                    $files->save();

                }   

            }
        }


        //return redirect('/exercises')->with('success', 'Ejercicio agregado correctamente');        

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
