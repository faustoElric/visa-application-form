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
                <br>
                <h5 class="text-center">¡Muchas gracias por tu interés! Por favor llena el siguiente formulario, estaremos notificandote los resultados pronto.</h5>
                <br>
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
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="dd-mm-yyyy" required="">
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
                                    <label for="phone_number">Número de Teléfono:</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control" required="">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="secondary_phone_number">Número de Teléfono secundario</label><br>
                                    <small>(Proporcione el número de un familiar en caso de que presente problemas de señal u otros inconvenientes)</small>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <input type="text" id="secondary_phone_number" name="secondary_phone_number" class="form-control" required="">
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
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state_id">Departamento:</label>
                                    <select id="state_id" name="state_id" class="form-control">
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="township_id">Municipio:</label>
                                    <select id="township_id" name="township_id" class="form-control">
                                        <option disabled>-- Por favor seleccione un Departamento --</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
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
                            <div class="input-group work-experience-item-0">
                                <div class="item col-12">
                                    <div class="row col-12">
                                        <div class="col-md-12 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="position">Posición:</label>
                                                <select name="positions[]" class="form-control col-md-6" required>
                                                    <option value="Agricultura">Agricultura</option>
                                                    <option value="Actividades de hostelería">Actividades de hostelería</option>
                                                    <option value="Actividades profesionales/científicas y técnicas">Actividades profesionales/científicas y técnicas</option>
                                                    <option value="Aeronáutica">Aeronáutica</option>
                                                    <option value="Área artística (entretenimiento o recreacional)">Área artística (entretenimiento o recreacional)</option>
                                                    <option value="Área de comunicación o IT">Área de comunicación o IT</option>
                                                    <option value="Área de empacado y almacenamiento">Área de empacado y almacenamiento</option>
                                                    <option value="Área de finanzas o seguros">Área de finanzas o seguros</option>
                                                    <option value="Área de montaje de ferias y carnavales">Área de montaje de ferias y carnavales</option>
                                                    <option value="Bartender">Bartender</option>
                                                    <option value="Construcción">Construcción</option>
                                                    <option value="Costura">Costura</option>
                                                    <option value="Cuidado de adultos mayores o niños">Cuidado de adultos mayores o niños</option>
                                                    <option value="Enfermería/cuidados de salud">Enfermería/cuidados de salud</option>
                                                    <option value="Jardínería y paisajismo">Jardínería y paisajismo</option>
                                                    <option value="Mantenimiento eléctrico/ industrial, etc">Mantenimiento eléctrico/ industrial, etc</option>
                                                    <option value="Mantenimiento de Torres Comunicacionales">Mantenimiento de Torres Comunicacionales</option>
                                                    <option value="Operario de fábrica">Operario de fábrica</option>
                                                    <option value="Pesca">Pesca</option>
                                                    <option value="Servicio de Transporte">Servicio de Transporte</option>
                                                    <option value="Servicio administrativos o de apoyo">Servicio administrativos o de apoyo</option>
                                                    <option value="Servicios de cocina">Servicios de cocina</option>
                                                    <option value="Servicios de limpieza">Servicios de limpieza</option>
                                                    <option value="Servicios de vigilancia">Servicios de vigilancia</option>
                                                    <option value="Tour Operador">Tour Operador</option>
                                                    <option value="Ventas minorista/mayorista/distribuidor">Ventas minorista/mayorista/distribuidor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="time_worked">Tiempo trabajado:</label>
                                                <input type="text" class="form-control" name="times_worked[]" placeholder="Tiempo trabajado" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="start_date_worked">Fecha Inicio:</label>
                                                <input type="date" name="start_date_worked[]" class="form-control" placeholder="dd-mm-yyyy" required="">
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="end_date_worked">Fecha de Finalización:</label>
                                                <input type="date" name="end_date_worked[]" class="form-control" placeholder="dd-mm-yyyy" required="">
                                            </div>
                                            <br>
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
                                    <div class="row col-12">
                                        <div class="col-12mt-2 mb-2">
                                            <div class="form-group text-end">
                                                <a id="removeWorkExperienceItem[]" class="btn btn-black mt-2 btn-work-experience-remove-item-0">Eliminar Experiencia</a>
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
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control">
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
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
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
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
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control">
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control"></textarea>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
                                <br>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-header text-center font-weight-bold bg-blue">
                            Preguntas Generales
                        </div>
                        <br>
                        <div class="row">
                            @foreach ($generalQuestions as $question)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}</label>
                                    <br>
                                    @if ($question->description != '')
                                        <small>{{ $question->description }}</small>
                                    @endif
                                    <br><br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" required> Si
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" required> No
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control">
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control"></textarea>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
                                <br>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-blue" id="btn-save-data" disabled="true">Guardar datos</button>
                        {{--  --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Main Information Modal -->
<div id="mainInformationModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <h2 class="modal-title text-center">¡Bienvenido al espacio de inscripción al Programa de Movilidad Laboral Visas H-2!</h2>
            </div>
            <div class="modal-body">
                <p>En esta plataforma podrá inscribirse al programa y participar legalmente en las plazas temporales de empleo a través de una visa H-2.</p>
                <p>Existen dos categorías principales dentro del programa: la visa H-2A, destinada para trabajo temporal en el sector agrícola, y la H-2B, para trabajo temporal o estacional no agrícola, como construcción, silvicultura, paisajismo, entre otros tipos de industria.</p>
                <p>Para inscribirse al programa deberá llenar el formulario de inscripción que verá a continuación. Le recomendamos leer bien las preguntas y responder lo más exacto y honesto posible ya que la información será validada.</p>
                <br>
                <h5>ACLARATORIA:</h5>
                <ul>
                    <li>Participar en el Programa de Movilidad Laboral Visas H-2 es COMPLETAMENTE GRATUITO, por lo que ninguna persona o entidad puede solicitarle ningún tipo de contribución económica. Si usted ha sido contactado por otras instancias solicitando algún tipo de remuneración económica, le pedimos que pueda denunciar al siguiente correo: <a href="mailto:denunciasv@state.gov" target="_blanck">denunciasv@state.gov</a>
                    </li>
                    <li>Le recordamos que esto es una inscripción a la base de aplicantes, no es una aplicación a visa o solicitud de visa. Este es el primer paso para que su perfil pueda ser evaluado por empresas contratantes en los Estados Unidos según las características requeridas.</li>
                    <li>Posterior al llenado del formulario, sí cumple con los requisitos, un miembro del <b>Programa de Movilidad Laboral Visas H-2</b> se pondrá en contacto para explicarle los siguientes pasos.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-blue" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endsection

