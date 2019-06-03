@extends('layouts.app')

@section('content')


<div class="container">
    
    <h1 class="mt-5">{{ $exercise->title }}</h1>
    <p class="lead">{{ $exercise->description }}</p>
    <div class="card-columns">

    @foreach($files as $file)

        <div class="card">

        @if($file['type'] == "image")

            <img class="card-img-top" src='../storage/{{ $exercise->id }}/{{ $file->url }}' class="img-thumbnail"/>
        
        @elseif($file['type'] == "audio")

            <audio controls>
                <source class="card-img-top" src='../storage/{{ $exercise->id }}/{{ $file->url }}' type="audio/{{$file['extension']}}">
                Your browser does not support the audio tag.
            </audio>

        @elseif($file['type'] == "video")

        <div class="ard-img-top embed-responsive">
            <iframe class="embed-responsive-item" src='../storage/{{ $exercise->id }}/{{ $file->url }}' allowfullscreen></iframe>
        </div>

        @else

            <embed class="card-img-top" src='../storage/{{ $exercise->id }}/{{ $file->url }}' />

        @endif

          
        </div>



    @endforeach

    </div>

</div>

@endsection