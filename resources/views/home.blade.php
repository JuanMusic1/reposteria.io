@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Tags</h1>
      <p class="lead text-muted">
            Aquí podrás encontrar los principales tópicos  
      <p>
        <a href="#" class="btn btn-primary">Subir ejercicio</a>
      </p>
    </div>
</section>


<ul>
        @foreach($tags as $tag)
            <li><a href="{{ route('tags.index', $tag->id) }}">{{$tag->title}}</a></li>
        @endforeach
    </ul>    


@endsection
