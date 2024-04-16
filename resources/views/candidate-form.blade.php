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
                    <div class="card-header text-center font-weight-bold bg-blue">
                        Perfil de Candidato
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="visa_type">Tipo de Visa:</label><br>
                                    <input type="radio" name="visa_type" value="1-H2B" required> 1-H2B &nbsp;
                                    <input type="radio" name="visa_type" value="2-H2A" required> 2-H2A
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="has_passport">Tiene Pasaporte?</label><br>
                                    <input type="radio" name="has_passport" value="1" required> Si &nbsp;
                                    <input type="radio" name="has_passport" value="0" required> No
                                </div>
                                <br>
                            </div>
                        </div>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_of_birth">DOB (Fecha de Nacimiento):</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required="">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dui">DUI:</label>
                                    <input type="text" id="dui" name="dui" class="form-control" required="" placeholder="########-#">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Sexo</label><br>
                                        <input type="radio" name="gender" value="Masculino" required> Masculino &nbsp;
                                        <input type="radio" name="gender" value="Femenino" required> Femenino
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="phone_number">Teléfono:</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control" required="">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="email" id="email" name="email" class="form-control" required="">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
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
                            <label for="state">Departamento:</label>
                            <input type="text" id="state" name="state" class="form-control" required="">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="employment_status">Estado de Empleo:</label>
                                    <select name="employment_status" class="form-control col-md-6">
                                        <option value="Desempleado">Desempleado</option>
                                        <option value="Empleado">Empleado</option>
                                        <option value="Empleador">Empleador</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><b>Inglés</b></label>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="english_level_id">Nivel de escucha para idioma inglés:</label>
                                    <select name="english_level_id" class="form-control">
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
                        <div class="card-header text-center font-weight-bold bg-blue">
                            Educación o Entrenamiento
                        </div>
                        <br>
                        <div id="education-form">
                            <div class="row">
                                <div class="col-12 text-rigth">
                                    <a class="clone-education btn btn-sm btn-blue">+ Agregar estudio</a>
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
                                                    <option value="3">Suspendido</option>
                                                    <option value="4">Incompleto</option>
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
                        <div class="card-header text-center font-weight-bold bg-blue">
                            Experiencia laboral
                        </div>
                        <br>
                        <div id="work-experience-form">
                            <div class="row">
                                <div class="col-12 text-rigth">
                                    <a class="clone-work-experience btn btn-sm btn-blue">+ Agregar experiencia laboral</a>
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
                        <div class="card-header text-center font-weight-bold bg-blue">
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
                        <div class="card-header text-center font-weight-bold bg-blue">
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
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control">
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
                        <div class="card-header text-center font-weight-bold bg-blue">
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
                        <div class="row">
                            <hr>
                            <br>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="information_obtained_by">Dónde se enteró del programa:</label>
                                    <select name="information_obtained_by" class="form-control col-md-6">
                                        <option value="Redes sociales">Redes sociales</option>
                                        <option value="Municipalidad">Municipalidad</option>
                                        <option value="Iglesia">Iglesia</option>
                                        <option value="Un amigo">Un amigo</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Institución Educativa">Institución Educativa</option>
                                        <option value="Institución de Gobierno">Institución de Gobierno</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                                <br><br>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-blue">Guardar datos</button>
                        {{--  --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

