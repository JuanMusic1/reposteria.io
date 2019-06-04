<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;

class ApiController extends Controller
{
    /**
     * Mostrar ejercicios por un respectivo tag
     *
     */
    public function showExercisesByTag(Request $request)
    {
        
        $tag_id = $request->tag;

        $exercises = Exercise::where('tag_id', $tag_id)->get();

        if(count($exercises) > 0){
            return response()->json(['exercises' => $exercises], 200);
        } else {
            return response()->json(['error' => 'notag'], 401);
        }

    }

}
