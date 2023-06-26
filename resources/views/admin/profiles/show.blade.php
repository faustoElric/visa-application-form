@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-9 margin-tb">
                <div class="pull-left">
                    <h4><small>Perfil de Candidato:</small>&nbsp;&nbsp;{{ $profile->name }} {{ $profile->lastname }}</h4>
                    <hr>
                </div>
            </div>
            <div class="col-md-3 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-orange" href="{{ route('admin.profiles.index') }}">
                        Regresar
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="container mt-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold bg-orange">
                    Datos Personales
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"><b>Nombre:</b></label><br>
                        {{ $profile->name }}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="lastname"><b>Apellidos:</b></label><br>
                        {{ $profile->lastname }}
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth"><b>Fecha de Nacimiento:</b></label><br>
                                {{ $profile->date_of_birth }}
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="civil_status_id"><b>Estado civil:</b></label><br>
                                {{ $profile->civilStatus->name }}
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_number"><b>Teléfono:</b></label><br>
                                {{ $profile->phone_number }}
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email"><b>Correo Electrónico:</b></label><br>
                                {{ $profile->email }}
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="academic_level_id"><b>Nivel académico:</b></label><br>
                                {{ $profile->academicLevel->name }}
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desired_job"><b>Trabajo deseado:</b></label><br>
                        {{ $profile->desired_job }}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="city"><b>Ciudad:</b></label><br>
                        {{ $profile->city }}
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="state"><b>Departamento:</b></label><br>
                        {{ $profile->state }}
                    </div>
                    <br>
                    <div class="form-group">
                        <label><b>Inglés</b></label>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="english_listening_level_id"><var>Nivel de escucha para idioma inglés:</var></label><br>
                                {{ $profile->english_listening_level_id }}
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="english_speaking_level_id"><var>Nivel de habla para idioma inglés:</var></label><br>
                                {{ $profile->english_speaking_level_id }}
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
                                <label for="children_live_with_me"> <var>Viven conmigo</var>:</label><br>
                                {{ $profile->children_live_with_me }}
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="children_dont_live_with_me"><var>No viven conmigo:</var></label><br>
                                {{ $profile->children_dont_live_with_me }}
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="card-header text-center font-weight-bold bg-orange">
                        Educación o Entrenamiento
                    </div>
                    <br>
                    <div id="education-form-data">
                        <br>
                        @foreach ($profile->educations as $education)
                            <div class="input-group">
                                <div class="item col-12">
                                    <div class="row col-12">
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="school_names"><b>Escuela / Universidad:</b></label><br>
                                                {{ $education->school_name }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="years"><b>Año de estudio:</b></label><br>
                                                {{ $education->year }}
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="areas"><b>Área de estudio:</b></label><br>
                                                {{ $education->area }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="status"><b>Status:</b></label><br>
                                                {{ $education->status }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="education_level_id"><b>Nivel:</b></label><br>
                                                {{ $education->academicLevel->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <div class="card-header text-center font-weight-bold bg-orange">
                        Experiencia laboral
                    </div>
                    <br>
                    <div id="work-experience-form-data">
                        <br>
                        @foreach ($profile->workExperiences as $workExperience)
                            <div class="input-group">
                                <div class="item col-12">
                                    <div class="row col-12">
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="position"><b>Posición:</b></label><br>
                                                {{ $workExperience->position }}
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="time_worked"><b>Tiempo trabajado:</b></label><br>
                                                {{ $workExperience->time_worked }}
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="time_worked"><b>Fecha:</b></label><br>
                                                {{ $workExperience->date_worked }}
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="company"><b>Compañia:</b></label><br>
                                                {{ $workExperience->company }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="activity"><b>Responsabilidades / Tareas:</b></label><br>
                                                {{ $workExperience->activity }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="tool_used"><b>Herramientas utilizadas:</b></label><br>
                                                {{ $workExperience->tool_used }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <div class="card-header text-center font-weight-bold bg-orange">
                        Estatus migratorio
                    </div>
                    <br>
                    <div class="row">
                        @foreach ($profile->answers as $answer)
                            @if ($answer->question->section == 'Immigration Status')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>{{ $answer->question->question }}</b></label><br>
                                        <br>
                                        {{ $answer->answer }}
                                    </div>
                                    <br>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <br>
                    <div class="card-header text-center font-weight-bold bg-orange">
                        Salud
                    </div>
                    <br>
                    <div class="row">
                        @foreach ($profile->answers as $answer)
                            @if ($answer->question->section == 'Health')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>{{ $answer->question->question }}</b></label><br>
                                        <br>
                                        {{ $answer->answer }}
                                    </div>
                                    <br>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <br>
                    <div class="card-header text-center font-weight-bold bg-orange">
                        Habilidades
                    </div>
                    <br>
                    <div class="row">
                        @foreach ($profile->answers as $answer)
                            @if ($answer->question->section == 'Skills')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>{{ $answer->question->question }}</b></label><br>
                                        <br>
                                        {{ $answer->answer }}
                                    </div>
                                    <br>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{--  --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 margin-tb mt-4">
                <div class="pull-right">
                    <a class="btn btn-orange" href="{{ route('admin.profiles.index') }}">
                        Regresar
                    </a>
                </div>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection
