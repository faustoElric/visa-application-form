@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-10 margin-tb">
                <div class="pull-left">
                    <h4><small>Perfil de Candidato:</small></h4>
                    <h2 class="text-center">{{ $profile->name }} {{ $profile->lastname }}</h2>
                    <hr>
                </div>
            </div>
            <div class="col-md-2 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-blue" href="{{ route('admin.profiles.index') }}">
                        Regresar
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="container mt-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold bg-blue">
                    Datos Personales
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="visa_type">Tipo de Visa:</label><br>
                                {{ $profile->visa_type }}
                                <br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="has_passport">¿Tiene Pasaporte?</label><br>
                                {{ $profile->has_passport }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre:</label><br>
                                {{ $profile->name }}
                                <br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Apellidos:</label><br>
                                {{ $profile->lastname }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date_of_birth">DOB (Fecha de Nacimiento):</label>
                                {{ $profile->date_of_birth }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dui">DUI:</label>
                                {{ $profile->dui }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Sexo:</label><br>
                                {{ $profile->gender }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="phone_number">Número de Teléfono:</label>
                                {{ $profile->phone_number }}
                                <br>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="secondary_phone_number">Número de Teléfono secundario:</label><br>
                                {{ $profile->secondary_phone_number }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="email">Correo Electrónico:</label>
                                {{ $profile->email }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="academic_level_id">Nivel académico:</label>
                                {{ $profile->academicLevel->name }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="state_id">Departamento:</label><br>
                                {{ $profile->state->name }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="township_id">Municipio:</label><br>
                                {{ $profile->township->name }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="employment_status">Estado de Empleo:</label>
                                {{ $profile->employment_status }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><b>Hijos</b></label>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="children_live_with_me"> <var>Viven conmigo:</var>:</label>
                                {{ $profile->children_live_with_me }}
                                <br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="children_dont_live_with_me">No viven conmigo:</label>
                                {{ $profile->children_live_with_me }}
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center font-weight-bold bg-blue">
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
                    <div class="card-header text-center font-weight-bold bg-blue">
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
                    <div class="card-header text-center font-weight-bold bg-blue">
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
                    <div class="card-header text-center font-weight-bold bg-blue">
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
                    <div class="card-header text-center font-weight-bold bg-blue">
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
