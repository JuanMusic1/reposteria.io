@extends('layouts.app')

@section('content')

<div class="card uper">
  
    <div class="card-header">
        Subir ejercicio
    </div>
  
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

      <form method="post" action="{{ route('exercises.store') }}">
          <div class="form-group">
              @csrf
              <label for="title">Título:</label>
              <input type="text" class="form-control" name="exercise_title"/>
          </div>
          <div class="form-group">
              <label for="description">Descripción:</label>
              <input type="text" class="form-control" name="exercise_description"/>
          </div>
          <div class="form-group">
                <label for="tag">Tag:</label>
                <select class="form-control" name="execise_tag">
                    @foreach($tags as $tag)
                        <option>{{ $tag->title }}</option>
                    @endforeach
                </select>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>

    </div>
</div>

@endsection