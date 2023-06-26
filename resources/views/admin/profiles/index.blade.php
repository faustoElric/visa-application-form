@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header text-center font-weight-bold bg-orange">
                    Filtros de búsqueda
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label><strong>Estado Civil:</strong></label>
                                <br><br>
                                <select id="civil_status_id" name="civil_status_id" class="form-control">
                                    <option value="" selected>--- Seleccione una opción ---</option>
                                    @foreach ($civilStatuses as $civilStatus)
                                        <option value="{{ $civilStatus->id }}">{{ $civilStatus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label><strong>Nivel Académico:</strong></label>
                                <br><br>
                                <select id="academic_level_id" name="academic_level_id" class="form-control">
                                    <option value="" selected>--- Seleccione una opción ---</option>
                                    @foreach ($academicLevels as $academicLevel)
                                        <option value="{{ $academicLevel->id }}">{{ $academicLevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label><strong>Rango de Fecha de cumpleaños:</strong></label>
                                <br><br>
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1 mt-4">
            <div class="card">
                <div class="card-header text-center font-weight-bold bg-orange">
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
