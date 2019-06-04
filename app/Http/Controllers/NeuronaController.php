<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class NeuronaController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $endpoint   = "http://neuronita.tk/api/show/neuronitas";
        $email      = "sierra@sierra.sierra";
        $password   = "s4kpDRJKWu9NjBq";

        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL            => $endpoint,
            CURLOPT_POST           => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => "email=$email&password=$password"
        );
        curl_setopt_array($ch, $curlConfig);
        $neuronas = json_decode(curl_exec($ch),true)['neuronitas'][0];
        curl_close($ch);
        
        return view('neuronas.index', compact('neuronas'));

    }}
