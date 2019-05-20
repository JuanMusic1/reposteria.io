@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-8">

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
                
                  <form method="post" action="{{ route('exercises.store') }} " enctype="multipart/form-data">
                      
                    <div class="form-group">
                          @csrf
                          <label for="exercise_title">Título:</label>
                          <input type="text" class="form-control" name="exercise_title"/>
                      </div>
                      
                      <div class="form-group">
                          <label for="exercise_description">Descripción:</label>
                          <textarea class="form-control" name="exercise_description" rows="5"></textarea>
                      </div>
                      
                        <div class="form-group">
                            <label for="exercise_tag">Categoría:</label>
                            <select class="form-control" name="exercise_tag">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                      
                      <div class="form-group">
                            <div class="form-group">
                                <label for="exercise_description">IDs de los usuarios separados por coma: (Ej: 11,12,13)</label>
                                <textarea class="form-control" name="exercise_users" rows="2"></textarea>
                            </div>
                      </div>

                      <div class="form-group control-group increment">
                            <label for="files">Archivos:</label>
                            <input type="file" class="form-control-file" name="attachment[]" multiple>
                      </div>

                      <button type="submit" class="btn btn-primary">Subir</button>
                  
                    </form>
              
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 

          var lsthmtl = $(".clone").html();

          $(".increment").after(lsthmtl);

      });

      $("body").on("click",".btn-danger",function(){ 

          $(this).parents(".hdtuto control-group lst").remove();

      });

    });

</script>

@endsection