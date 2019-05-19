@extends('layouts.app')

@section('content')

<section class="text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Tags</h1>
        <p class="lead text-muted">Aquí podrás encontrar los principales tópicos</p>
        <ul>
            @foreach($tags as $tag)
                <li><a href="{{ route('tags.index', $tag->id) }}">{{$tag->title}}</a></li>
            @endforeach
        </ul> 
    </div>
</section>

@endsection
