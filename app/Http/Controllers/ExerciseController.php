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

    public function __construct()
    {
        $this->middleware('auth');
    }

   /**
     * Desplegar la lista de ejercicios a
     * los que tiene acceso el usuario actual
     *
     */
    public function index()
    {
        $exercises = Auth::user()->exercises;

        return view('tags.index', compact('exercises'));

    }

    /**
     * Mostrar el formulario para la creación de un ejercicio
     *
     */
    public function create()
    {   
        $tags = Tag::all();

        return view('exercises.create', compact('tags'));

    }

    /**
     * Manejar el almacenamiento de información
     * en las distintas tablas relacionadas
     * a un ejercicio
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


        return redirect('/home')->with('success', 'Ejercicio agregado correctamente');        

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
     * Mostrar el formulario de edición de un ejercicio
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Exercise::find($id);

        return view('exercises.edit', compact('exercise'));
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
     * Eliminar un ejercicio determinado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = Exercise::find($id);
        $exercise->delete();

        return redirect('/home')->with('success', 'El ejercicio fue eliminado exitosamente');
    }
}
