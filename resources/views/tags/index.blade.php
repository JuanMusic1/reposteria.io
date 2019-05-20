@extends('layouts.app')

@section('content')

<section class="text-center">
        <div class="container">
<table class="table table-striped">
        <thead>
            <tr>
              <td>Título</td>
              <td colspan="2"></td>
            </tr>
        </thead>
        <tbody>
            @foreach($exercises as $exercise)
            <tr>
                <td>{{$exercise->title}}</td>
                <td><a href="{{ route('exercises.edit',$exercise->id)}}" class="btn btn-primary">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
     </table>
    </div>
</section>

@endsection