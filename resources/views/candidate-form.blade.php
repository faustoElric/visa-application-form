@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Hay un problema, por favor verifique los campos.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form name="add-profile-form" id="add-profile-form" action="{{ route('candidate-form-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header text-center font-weight-bold bg-dark-blue">
                        Perfil de Candidato - Aplicación a Visas
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombres:</label>
                            <input type="text" id="name" name="name" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="lastname">Apellidos:</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" required="">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Fecha de Nacimiento:</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required="">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="civil_status_id">Estado civil:</label>
                                    <select name="civil_status_id" class="form-control">
                                        @foreach ($civilStatuses as $civilStatus)
                                            <option value="{{ $civilStatus->id }}">{{ $civilStatus->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="academic_level_id">Nivel académico:</label>
                                    <select name="academic_level_id" class="form-control">
                                        @foreach ($academicLevels as $academicLevel)
                                            <option value="{{ $academicLevel->id }}">{{ $academicLevel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desired_job">Trabajo deseado:</label>
                            <input type="text" id="desired_job" name="desired_job" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="city">Ciudad:</label>
                            <input type="text" id="city" name="city" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="state">Estado:</label>
                            <input type="text" id="state" name="state" class="form-control" required="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Inglés</b></label>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="english_listening_level_id">Listening:</label>
                                    <select name="english_listening_level_id" class="form-control">
                                        @foreach ($englishLevels as $englishLevel)
                                            <option value="{{ $englishLevel->id }}">{{ $englishLevel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="english_speaking_level_id">Speaking:</label>
                                    <select name="english_speaking_level_id" class="form-control">
                                        @foreach ($englishLevels as $englishLevel)
                                            <option value="{{ $englishLevel->id }}">{{ $englishLevel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><b>Hijos</b></label>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="children_live_with_me"> <var>Viven conmigo</var>:</label>
                                    <input type="number" id="children_live_with_me" name="children_live_with_me" class="form-control" required="" min="0" value="0">
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="children_dont_live_with_me">No viven conmigo:</label>
                                    <input type="number" id="children_dont_live_with_me" name="children_dont_live_with_me" class="form-control" required="" min="0" value="0">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card-header text-center font-weight-bold bg-dark-blue">
                            Educación o Entrenamiento
                        </div>
                        <br>
                        <div id="education-form">
                            <div class="row">
                                <div class="col-12 text-rigth">
                                    <a class="clone-education btn btn-secondary btn-sm">+ Agregar estudio</a>
                                </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="item col-12">
                                    <div class="row col-12">
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="school_names">Escuela / Universidad:</label>
                                                <input type="text" class="form-control col-md-6" name="school_names[]" placeholder="Escuela / Univerdad" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="years">Año de estudio:</label>
                                                <input type="text" class="form-control col-md-6" name="years[]" placeholder="Año de estudio" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="areas">Área de estudio:</label>
                                                <input type="text" class="form-control col-md-6" name="areas[]" placeholder="Área de estudio" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="status">Status:</label>
                                                <select name="statuses[]" class="form-control col-md-6">
                                                    <option value="1">Completo</option>
                                                    <option value="2">En Proceso</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="education_level_id">Nivel:</label>
                                                <select name="education_level_ids[]" class="form-control col-md-6">
                                                    @foreach ($academicLevels as $academicLevel)
                                                        <option value="{{ $academicLevel->id }}">{{ $academicLevel->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card-header text-center font-weight-bold bg-dark-blue">
                            Experiencia laboral
                        </div>
                        <br>
                        <div id="work-experience-form">
                            <div class="row">
                                <div class="col-12 text-rigth">
                                    <a class="clone-work-experience btn btn-secondary btn-sm">+ Agregar experiencia laboral</a>
                                </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="item col-12">
                                    <div class="row col-12">
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="position">Posición:</label>
                                                <input type="text" class="form-control" name="positions[]" placeholder="Posición" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="time_worked">Tiempo trabajado:</label>
                                                <input type="text" class="form-control" name="times_worked[]" placeholder="Tiempo trabajado" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="time_worked">Fecha:</label>
                                                <input type="text" class="form-control" name="dates_worked[]" placeholder="Fecha" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="company">Compañia:</label>
                                                <input type="text" class="form-control" name="companies[]" placeholder="Compañia" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="activity">Responsabilidades / Tareas:</label>
                                                <textarea class="form-control" name="activities[]" placeholder="Responsabilidades / Tareas" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="tool_used">Herramientas utilizadas:</label>
                                                <textarea class="form-control col-md-6" name="tools_used[]" placeholder="Herramientas utilizadas" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card-header text-center font-weight-bold bg-dark-blue">
                            Estatus migratorio
                        </div>
                        <br>
                        <div class="row">
                            @foreach ($immigrationStatusQuestions as $question)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}</label>
                                    <br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" required> Si
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" required> No
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control"></textarea>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
                                <br>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="card-header text-center font-weight-bold bg-dark-blue">
                            Salud
                        </div>
                        <br>
                        <div class="row">
                            @foreach ($healthQuestions as $question)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}</label>
                                    <br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" required> Si
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" required> No
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control"></textarea>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
                                <br>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="card-header text-center font-weight-bold bg-dark-blue">
                            Habilidades
                        </div>
                        <br>
                        <div class="row">
                            @foreach ($skillsQuestions as $question)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}</label>
                                    <br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" required> Si
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" required> No
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control"></textarea>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
                                <br>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn bg-dark-blue">Guardar datos</button>
                        {{--  --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

