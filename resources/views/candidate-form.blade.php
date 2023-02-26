@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container mt-4">
            @if(session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif
            <div class="card">
              <div class="card-header text-center font-weight-bold bg-dark-blue">
                Perfil de Candidato - Aplicación a Visas
              </div>
              <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
                 @csrf
                  <div class="form-group">
                    <label for="name">Nombres: </label>
                    <input type="text" id="name" name="name" class="form-control" required="">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="lastname">Apellidos: </label>
                    <input type="text" id="lastname" name="lastname" class="form-control" required="">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="date_of_birth">Fecha de Nacimiento: </label>
                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required="">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="civil_status">Estado civil: </label>
                    <select name="civil_status" class="form-control">
                        @foreach ($civilStatuses as $civilStatus)
                            <option value="{{ $civilStatus->id }}">{{ $civilStatus->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="lastname">Nivel académico: </label>
                    <select name="civil_status" class="form-control">
                        @foreach ($academicLevels as $academicLevel)
                            <option value="{{ $academicLevel->id }}">{{ $academicLevel->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="desired_job">Trabajo deseado: </label>
                    <input type="text" id="desired_job" name="desired_job" class="form-control" required="">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="city">Ciudad: </label>
                    <input type="text" id="city" name="city" class="form-control" required="">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="state">Estado: </label>
                    <input type="text" id="state" name="state" class="form-control" required="">
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="english_listening_level_id">Inglés Listening: </label>
                    <select name="english_listening_level_id" class="form-control">
                        @foreach ($englishLevels as $englishLevel)
                            <option value="{{ $englishLevel->id }}">{{ $englishLevel->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <br>
                  <div class="form-group">
                    <label for="english_speaking_level_id">Inglés Speaking: </label>
                    <select name="english_speaking_level_id" class="form-control">
                        @foreach ($englishLevels as $englishLevel)
                            <option value="{{ $englishLevel->id }}">{{ $englishLevel->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <br>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
