@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 mt-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold bg-blue">
                    Total de usuarios registrados la última semana
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 mt-4">
                    <div class="row">
                        <div class="col-12 col-md-3 offset-md-3 text-center mb-1">
                            <h2>
                                <div id="totalMen"></div>
                            </h2>
                            <h5>Hombres</h5>
                        </div>
                        <div class="col-12 col-md-3 text-center mb-1">
                            <h2>
                                <div id="totalWomen"></div>
                            </h2>
                            <h5>Mujeres</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header text-center font-weight-bold bg-blue">
                    Filtros de búsqueda
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label class="mb-2" for="visa_type"><strong>Tipo de Visa:</strong></label>
                                <select id="visa_type" name="visa_type" class="form-control">
                                    <option value="" selected>--- Seleccione una opción ---</option>
                                    <option value="1-H2B">1-H2B</option>
                                    <option value="2-H2A">2-H2A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="mb-2" for="position"><strong>Área de trabajo:</strong></label>
                                <select id="position" name="position" class="form-control col-md-6" required>
                                    <option value="" selected>--- Seleccione una opción ---</option>
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
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label class="mb-2" for="gender"><strong>Sexo:</strong></label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="" selected>--- Seleccione una opción ---</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label class="mb-2"><strong>Edad mínima:</strong></label>
                                <input type="number" id="min_age" name="min_age" class="form-control" min="18" placeholder="18" required="">
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label class="mb-2"><strong>Edad máxima:</strong></label>
                                    <input type="number" id="max_age" name="max_age" class="form-control" min="18" placeholder="18" required="">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label class="mb-2"><strong>Nivel de Inglés:</strong></label>
                                <select id="english_level_id" name="english_level_id" class="form-control">
                                    <option value="" selected>--- Seleccione una opción ---</option>
                                    @foreach ($englishLevels as $englishLevel)
                                        <option value="{{ $englishLevel->id }}">{{ $englishLevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label class="mb-2"><strong>Fecha de aplicación:</strong></label>
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <label><strong>Desde:</strong></label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="date" id="start_date" name="start_date" class="form-control" required="">
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <label><strong>Hasta:</strong></label>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="date" id="end_date" name="end_date" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label class="mb-2" for="search"><strong>Nombre:</strong></label>
                                <input type="text" name="search" id="search" class="form-control" placeholder="Digita nombre, DUI, teléfono o correo del candidato">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 mt-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold bg-blue">
                    Resultados
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 mt-4">
                    <table id="profileData" class="table table-sm table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Fecha de Nacimiento:</th>
                                <th>Edad</th>
                                <th>Email</th>
                                <th>Fecha de registro</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
