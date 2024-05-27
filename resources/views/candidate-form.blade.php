@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <img src="{{url('images/main-banner.jpg')}}" class="img-fluid" alt="Main Banner">
        </div>
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
                <br><br>
                <h2 class="text-center"><b>¡Muchas gracias por tu interés!</b></h2>
                <h3 class="text-center">Por favor llena el siguiente formulario, estaremos notificandote los resultados pronto.</h3>
                <br><br>
                <div class="card">
                    <div class="card-header text-center font-weight-bold bg-blue">
                        Perfil de Candidato
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="visa_type">Tipo de Visa:&nbsp;<span style="color: red">*</span></label><br>
                                    <input type="radio" name="visa_type" value="1-H2B" class="input-validar" required> 1-H2B &nbsp;
                                    <input type="radio" name="visa_type" value="2-H2A" class="input-validar" required> 2-H2A
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="has_passport">¿Tiene Pasaporte?&nbsp;<span style="color: red">*</span></label><br>
                                    <input type="radio" name="has_passport" value="1" class="input-validar" required> Si &nbsp;
                                    <input type="radio" name="has_passport" value="0" class="input-validar" required> No
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Nombres:&nbsp;<span style="color: red">*</span></label><br>
                            <small>Ingresa tu nombre tal como aparece en tu DUI</small>
                            <br>
                            <input type="text" id="name" name="name" class="form-control input-validar" required="">
                            <br>
                            <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="lastname">Apellidos:&nbsp;<span style="color: red">*</span></label><br>
                            <small>Ingresa tu apellido tal como aparece en tu DUI</small>
                            <br>
                            <input type="text" id="lastname" name="lastname" class="form-control input-validar" required="">
                            <br>
                            <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_of_birth">DOB (Fecha de Nacimiento):&nbsp;<span style="color: red">*</span></label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control input-validar" placeholder="dd-mm-yyyy" required="">
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dui">DUI:&nbsp;<span style="color: red">*</span></label>
                                    <input type="text" id="dui" name="dui" class="form-control input-validar" required="" placeholder="########-#">
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Sexo:&nbsp;<span style="color: red">*</span></label><br>
                                    <input type="radio" name="gender" value="Masculino" class="input-validar" required> Masculino &nbsp;
                                    <input type="radio" name="gender" value="Femenino" class="input-validar" required> Femenino
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="phone_number">Número de Teléfono:&nbsp;<span style="color: red">*</span></label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control input-validar" required="">
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="secondary_phone_number">Número de Teléfono secundario:&nbsp;<span style="color: red">*</span></label><br>
                                    <small>(Proporcione el número de un familiar en caso de que presente problemas de señal u otros inconvenientes)</small>
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <input type="text" id="secondary_phone_number" name="secondary_phone_number" class="form-control input-validar" required="">
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico:&nbsp;<span style="color: red">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control input-validar" required="">
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="academic_level_id">Nivel académico:&nbsp;<span style="color: red">*</span></label>
                                    <select name="academic_level_id" class="form-control input-validar" required>
                                        @foreach ($academicLevels as $academicLevel)
                                            <option value="{{ $academicLevel->id }}">{{ $academicLevel->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="state_id">Departamento:&nbsp;<span style="color: red">*</span></label><br>
                                    <small>Indica el departamento donde resides actualmente (aunque sea diferente al indicado en tu DUI)</small>
                                    <br>
                                    <select id="state_id" name="state_id" class="form-control input-validar" required>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="township_id">Municipio:&nbsp;<span style="color: red">*</span></label><br>
                                    <small>Indica el municipio donde resides actualmente (aunque sea diferente al indicado en tu DUI)</small>
                                    <br>
                                    <select id="township_id" name="township_id" class="form-control input-validar" required>
                                        <option disabled>-- Por favor seleccione un Departamento --</option>
                                    </select>
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="employment_status">Estado de Empleo:&nbsp;<span style="color: red">*</span></label>
                                    <select name="employment_status" class="form-control col-md-6" required>
                                        <option value="Desempleado">Desempleado</option>
                                        <option value="Empleado">Empleado</option>
                                        <option value="Empleador">Empleador</option>
                                    </select>
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label><b>Inglés</b></label>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="english_level_id">Nivel de escucha para idioma inglés:</label>
                                    <select name="english_level_id" class="form-control input-validar">
                                        @foreach ($englishLevels as $englishLevel)
                                            <option value="{{ $englishLevel->id }}">{{ $englishLevel->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label><b>Hijos</b></label>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="children_live_with_me"> <var>Viven conmigo:&nbsp;<span style="color: red">*</span></var>:</label>
                                    <input type="number" id="children_live_with_me" name="children_live_with_me" class="form-control input-validar" required="" min="0" value="0">
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="children_dont_live_with_me">No viven conmigo:&nbsp;<span style="color: red">*</span></label>
                                    <input type="number" id="children_dont_live_with_me" name="children_dont_live_with_me" class="form-control input-validar" required="" min="0" value="0">
                                    <br>
                                    <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card-header text-center font-weight-bold bg-blue">
                            Educación o Entrenamiento
                        </div>
                        <br>
                        <div id="education-form">
                            <br>
                            <div class="input-group">
                                <div class="item col-12">
                                    <div class="row col-12">
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="school_names">Escuela / Universidad:&nbsp;<span style="color: red">*</span></label>
                                                <input type="text" class="form-control col-md-6" name="school_names[]" placeholder="Escuela / Univerdad" required>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="years">Año de estudio:&nbsp;<span style="color: red">*</span></label>
                                                <input type="text" class="form-control col-md-6" name="years[]" placeholder="Año de estudio" required>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="areas">Área de estudio:&nbsp;<span style="color: red">*</span></label>
                                                <input type="text" class="form-control col-md-6" name="areas[]" placeholder="Área de estudio" required>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="status">Status:&nbsp;<span style="color: red">*</span></label>
                                                <select name="statuses[]" class="form-control col-md-6" required>
                                                    <option value="1">Completo</option>
                                                    <option value="2">En Proceso</option>
                                                    <option value="3">Suspendido</option>
                                                    <option value="4">Incompleto</option>
                                                </select>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="education_level_id">Nivel:&nbsp;<span style="color: red">*</span></label>
                                                <select name="education_level_ids[]" class="form-control col-md-6" required>
                                                    @foreach ($academicLevels as $academicLevel)
                                                        <option value="{{ $academicLevel->id }}">{{ $academicLevel->name }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-12 text-rigth">
                                    <a class="clone-education btn btn-sm btn-blue">+ Agregar estudio</a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card-header text-center font-weight-bold bg-blue">
                            Experiencia laboral
                        </div>
                        <br>
                        <div id="work-experience-form">
                            <br>
                            <div class="input-group work-experience-item-0">
                                <div class="item col-12">
                                    <div class="row col-12">
                                        <div class="col-md-12 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="position">Posición:&nbsp;<span style="color: red">*</span></label>
                                                <select name="positions[]" class="form-control col-md-6" required>
                                                    <option value='No posee experiencia laboral'>No posee experiencia laboral</option>
                                                    <option value='Servicios de limpieza en hoteles, moteles u hostales'>Servicios de limpieza en hoteles, moteles u hostales</option>
                                                    <option value='Limpieza industrial'>Limpieza industrial</option>
                                                    <option value='Servicios domésticos (limpieza en casas u otros informales)'>Servicios domésticos (limpieza en casas u otros informales)</option>
                                                    <option value='Lavandería'>Lavandería</option>
                                                    <option value='Mantenimiento de piscinas'>Mantenimiento de piscinas</option>
                                                    <option value='Cuidado de adultos mayores o niños'>Cuidado de adultos mayores o niños</option>
                                                    <option value='Atención al cliente en inglés'>Atención al cliente en inglés</option>
                                                    <option value='Atención al cliente en español'>Atención al cliente en español</option>
                                                    <option value='Área de finanzas o seguros'>Área de finanzas o seguros</option>
                                                    <option value='Ventas (minorista/mayorista/distribuidor)'>Ventas (minorista/mayorista/distribuidor)</option>
                                                    <option value='Cajero'>Cajero</option>
                                                    <option value='Chef profesional'>Chef profesional</option>
                                                    <option value='Cocinero en fast food'>Cocinero en fast food</option>
                                                    <option value='Cocinero independiente'>Cocinero independiente</option>
                                                    <option value='Auxiliar de cocina'>Auxiliar de cocina</option>
                                                    <option value='Barista'>Barista</option>
                                                    <option value='Bartender'>Bartender</option>
                                                    <option value='Mesero'>Mesero</option>
                                                    <option value='Lavaplatos'>Lavaplatos</option>
                                                    <option value='Panadería'>Panadería</option>
                                                    <option value='Pastelería'>Pastelería</option>
                                                    <option value='Montaje de eventos'>Montaje de eventos</option>
                                                    <option value='Procesamiento de alimentos'>Procesamiento de alimentos</option>
                                                    <option value='Construcción'>Construcción</option>
                                                    <option value='Electricista'>Electricista</option>
                                                    <option value='Soldador'>Soldador</option>
                                                    <option value='Fontanería'>Fontanería</option>
                                                    <option value='Mantenimiento de aires acondicionados'>Mantenimiento de aires acondicionados</option>
                                                    <option value='Mecánico de obra de banco'>Mecánico de obra de banco</option>
                                                    <option value='Carpintería'>Carpintería</option>
                                                    <option value='Techero'>Techero</option>
                                                    <option value='Mecánico automotriz'>Mecánico automotriz</option>
                                                    <option value='Operario de maquinaria industrial'>Operario de maquinaria industrial</option>
                                                    <option value='Ensamblaje de piezas industriales'>Ensamblaje de piezas industriales</option>
                                                    <option value='Mantenimiento de torres comunicacionales'>Mantenimiento de torres comunicacionales</option>
                                                    <option value='Lectura de planos industriales'>Lectura de planos industriales</option>
                                                    <option value='Avicultura'>Avicultura</option>
                                                    <option value='Agricultura'>Agricultura</option>
                                                    <option value='Ganadería'>Ganadería</option>
                                                    <option value='Silvicultura'>Silvicultura</option>
                                                    <option value='Apicultura'>Apicultura</option>
                                                    <option value='Jardinería'>Jardinería</option>
                                                    <option value='Arbolero'>Arbolero</option>
                                                    <option value='Pesca o acuicultura'>Pesca o acuicultura</option>
                                                    <option value='Servicio militar'>Servicio militar</option>
                                                    <option value='Bombero'>Bombero</option>
                                                    <option value='Guardavidas'>Guardavidas</option>
                                                    <option value='Servicios de vigilancia'>Servicios de vigilancia</option>
                                                    <option value='Actividades profesionales, cientí­ficas y técnicas'>Actividades profesionales, cientí­ficas y técnicas</option>
                                                    <option value='Área de comunicación o IT'>Área de comunicación o IT</option>
                                                    <option value='Servicios administrativos o de apoyo'>Servicios administrativos o de apoyo</option>
                                                    <option value='Actividades de atención de la salud humana y de asistencia social'>Actividades de atención de la salud humana y de asistencia social</option>
                                                    <option value='Marino mercante'>Marino mercante</option>
                                                    <option value='Fotografía'>Fotografía</option>
                                                    <option value='Control de calidad'>Control de calidad</option>
                                                    <option value='Enseñanza'>Enseñanza</option>
                                                    <option value='Diseñador gráfico'>Diseñador gráfico</option>
                                                    <option value='Aeronáutica'>Aeronáutica</option>
                                                    <option value='Pintor'>Pintor</option>
                                                    <option value='Mecánico industrial'>Mecánico industrial</option>
                                                    <option value='Zapatero'>Zapatero</option>
                                                    <option value='Serigrafía y sublimación'>Serigrafía y sublimación</option>
                                                    <option value='Área de belleza y cuidado personal'>Área de belleza y cuidado personal</option>
                                                    <option value='Explotación de minas o canteras'>Explotación de minas o canteras</option>
                                                    <option value='Área de montaje de ferias y carnavales'>Área de montaje de ferias y carnavales</option>
                                                    <option value='Costurero'>Costurero</option>
                                                    <option value='Mantenimiento industrial'>Mantenimiento industrial</option>
                                                    <option value='Servicio de transporte'>Servicio de transporte</option>
                                                    <option value='Área de almacenamiento (bodega, empacado)'>Área de almacenamiento (bodega, empacado)</option>
                                                    <option value='Área artí­stica, entretenimiento o recreacional'>Área artí­stica, entretenimiento o recreacional</option>
                                                </select>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="time_worked">Tiempo trabajado:&nbsp;<span style="color: red">*</span></label>
                                                <input type="text" class="form-control input-validar" name="times_worked[]" placeholder="Tiempo trabajado" required>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="start_date_worked">Fecha Inicio:&nbsp;<span style="color: red">*</span></label>
                                                <input type="date" name="start_date_worked[]" class="form-control input-validar" placeholder="dd-mm-yyyy" required="">
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="end_date_worked">Fecha de Finalización:&nbsp;<span style="color: red">*</span></label>
                                                <input type="date" name="end_date_worked[]" class="form-control input-validar" placeholder="dd-mm-yyyy" required="">
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="col-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="company">Compañía:&nbsp;<span style="color: red">*</span></label>
                                                <input type="text" class="form-control input-validar" name="companies[]" placeholder="Compañía" required>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="activity">Responsabilidades / Tareas:&nbsp;<span style="color: red">*</span></label><br>
                                                <small>Esta pregunta tiene el objetivo de entender las funciones que realizaba por lo que le solicitamos atentamente que pueda dar una descripción detallada de estas. Recuerde que esta información nos ayuda a proponer su perfil en ofertas de trabajo en las que cumpla con los requisitos.</small>
                                                <br><br>
                                                <textarea class="form-control input-validar" name="activities[]" placeholder="Responsabilidades / Tareas" required></textarea>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-2">
                                            <div class="form-group">
                                                <label for="tool_used">Herramientas utilizadas:&nbsp;<span style="color: red">*</span></label>
                                                <textarea class="form-control col-md-6" name="tools_used[]" placeholder="Herramientas utilizadas" required></textarea>
                                                <br>
                                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-12">
                                        <div class="col-12 mt-2 mb-2">
                                            <div class="form-group text-end">
                                                <a class="clone-work-experience btn btn-sm btn-blue mt-2">+ Agregar experiencia laboral</a>
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
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}&nbsp;<span style="color: red">*</span></label>
                                    <br>
                                    @if ($question->description != '')
                                        <small>{{ $question->description }}</small>
                                    @endif
                                    <br><br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" class="input-validar" required> Si&nbsp;
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" class="input-validar" required> No
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control input-validar">
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control input-validar" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control input-validar"></textarea>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @endif
                                        <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
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
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}&nbsp;<span style="color: red">*</span></label>
                                    <br>
                                    @if ($question->description != '')
                                        <small>{{ $question->description }}</small>
                                    @endif
                                    <br><br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" class="input-validar" required> Si&nbsp;
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" class="input-validar" required> No
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control input-validar">
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control input-validar" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control input-validar"></textarea>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
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
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}&nbsp;<span style="color: red">*</span></label>
                                    <br>
                                    @if ($question->description != '')
                                        <small>{{ $question->description }}</small>
                                    @endif
                                    <br><br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" class="input-validar" required> Si&nbsp;
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" class="input-validar" required> No
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control input-validar">
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control input-validar" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control input-validar"></textarea>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
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
                                    <label for="answers[{{ $question->id }}]">{{ $question->question }}&nbsp;<span style="color: red">*</span></label>
                                    <br>
                                    @if ($question->description != '')
                                        <small>{{ $question->description }}</small>
                                    @endif
                                    <br><br>
                                    @if ($question->type == 'radio')
                                        <input type="radio" name="answers[{{ $question->id }}]" value="Si" class="input-validar" required> Si&nbsp;
                                        <input type="radio" name="answers[{{ $question->id }}]" value="No" class="input-validar" required> No
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == 'number')
                                        <input type="number" name="answers[{{ $question->id }}]" min="0" required class="form-control input-validar">
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @elseif ($question->type == "select")
                                        <select name="answers[{{ $question->id }}]" class="form-control input-validar" required>
                                            @foreach (json_decode($question->question_json_items) as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @else
                                        <textarea name="answers[{{ $question->id }}]" class="form-control input-validar"></textarea>
                                        <br>
                                        <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
                                        <br><br>
                                    @endif
                                    <input type="hidden" name="question_ids[{{ $question->id }}]" value="{{ $question->id }}">
                                </div>
                                <br>
                                <span class="mensaje-alerta" style="display: none; color: red;">Esta pregunta es obligatoria.</span>
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
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <img src="{{url('images/usaid_logo.png')}}" class="img-fluid" id="usaid" style="width: 85%">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <img src="{{url('images/ministerio_relaciones_exteriores_logo.png')}}" class="img-fluid" id="mre" style="margin-top: -5%;width: 90%">
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                <br>
                <p>En esta plataforma podrá inscribirse al programa y participar legalmente en las plazas temporales de empleo a través de una visa H-2.</p>
                <p>Existen dos categorías principales dentro del programa: la visa H-2A, destinada para trabajo temporal en el sector agrícola, y la H-2B, para trabajo temporal o estacional no agrícola, como construcción, silvicultura, paisajismo, entre otros tipos de industria.</p>
                <p>Para inscribirse al programa deberá llenar el formulario de inscripción que verá a continuación. Le recomendamos leer bien las preguntas y responder lo más exacto y honesto posible ya que la información será validada.</p>
                <br>
                <h5>ACLARATORIA:</h5>
                <ul>
                    <li>Participar en el Programa de Movilidad Laboral Visas H-2 es COMPLETAMENTE GRATUITO, por lo que ninguna persona o entidad puede solicitarle ningún tipo de contribución económica. Si usted ha sido contactado por otras instancias solicitando algún tipo de remuneración económica, le pedimos que pueda denunciar al siguiente correo: <a href="mailto:denunciasv@state.gov" target="_blanck">denunciasv@state.gov</a>
                    </li>
                    <li>Le recordamos que esto es una inscripción a la base de aplicantes, no es una aplicación a visa o solicitud de visa. Este es el primer paso para que su perfil pueda ser evaluado por empresas contratantes en los Estados Unidos según las características requeridas.</li>
                    <!--li>Posterior al llenado del formulario, sí cumple con los requisitos, un miembro del <b>Programa de Movilidad Laboral Visas H-2</b> se pondrá en contacto para explicarle los siguientes pasos.</li-->
                </ul>
                <br>
                <p class="text-justify">Con base en la demanda de empresas estadounidenses y si tu perfil cumple los requisitos del equipo del Programa de Movilidad Laboral, se le estará convocando a una entrevista de pre-selección para ver su perfil, si calificas a los requisitos solicitados por las empresas, tu perfil será trasladado a las empresas aliadas y se le convocará a una entrevista de trabajo con el empleador, en la que le darán a conocer las condiciones laborales que se ofrecen.</p>
                <br>
                <h5>Esta inscripción no garantiza un empleo en Estados Unidos</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-blue" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endsection

