@extends('layouts.app')

@section('content')

<section class="text-center">
    <div class="container">
        
        <table class="table table-striped">
            
            <thead>
                <tr>
                  <td>Título</td>
                  <td colspan="3"></td>
                </tr>
            </thead>
            
            <tbody>
                @foreach($exercises as $exercise)
                <tr>
                    <td>{{$exercise->title}}</td>
                    <td><a href="{{ route('exercises.show',$exercise->id)}}" class="btn btn-success">Ver</a></td>
                    <td><a href="{{ route('exercises.edit',$exercise->id)}}" class="btn btn-primary">Editar</a></td>
                    <td>
                        <form action="{{ route('exercises.destroy', $exercise->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>            
                </tr>
                @endforeach
            </tbody>
    
        </table>
    </div>
</section>

@endsection