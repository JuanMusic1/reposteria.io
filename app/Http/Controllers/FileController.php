<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Exercise;

use Auth;


class FileController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $file       = File::find($id);
        $exercise   = Exercise::find(File::find($id)->exercise_id);
        $users      = $exercise->users;
        $users_id   = array();

        // Create array of users in exercise_user

        foreach($users as $user){
            array_push($users_id, $user->id);
        }

        // Check if actual user is in array of users

        if(in_array(Auth::user()->id, $users_id))
        {
            File::find($id)->delete($id);
            return response()->json(['success' => true, 'message' => 'File deleted']);
        }
        else
        {
            return response()->json(['success' => false, 'message' => 'Error']);
        }
    }
}
