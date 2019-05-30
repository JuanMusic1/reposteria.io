@extends('layouts.app')

@section('content')

<section class="text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Tags</h1>
        <p class="lead text-muted">Aquí podrás encontrar los principales tópicos</p>
    </div>
</section>

<section class="text-center">
        <div class="container">

        <div class="card-columns">
        @foreach($tags as $tag)

        <a href="{{ route('tags.show', $tag) }}">
        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">{{$tag->title}}</div>
                <div class="card-body">
                <p class="card-text">{{$tag->description}}</p>
            </div>
        </div>
        </a>

        @endforeach

        </div></div>
</section>


@endsection
