@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Proyecto</th>
                        <th>Categoría</th>
                        <th>Fecha de envío</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="incident_key">{{ $incident->id }}</td>
                        <td id="incident_project">{{ $incident->project->name }}</td>
                        <td id="incident_category">{{ $incident->category_name }}</td>
                        <td id="incident_created_at">{{ $incident->created_at }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Asignada a</th>
                        <th>Nivel</th>
                        <th>Estado</th>
                        <th>Severidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="incident_responsible">{{ $incident->support_name }}</td>
                        <td>publico</td>
                        <td id="incident_state">{{ $incident->state }}</td>
                        <td id="incident_severity">{{ $incident->severity_full }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Título</th>
                        <td id="incident_summary">{{ $incident->title }}</td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td id="incident_description">{{ $incident->description }}</td>
                    </tr>
                    <tr>
                        <th>Adjuntos</th>
                        <td id="incident_attachment">No se han adjuntado archivos</td>
                    </tr>
                </tbody>
            </table> 
            @if ($incident->support_id == null && $incident->active && auth()->user()->canTake($incident))
                <a href="/incidencia/{{ $incident->id }}/atender" class="btn btn-primary btn-sm" id="incident_btn_apply">
                Atender incidencia
                </a>
            @endif        
        </div>
    </div>
       
@endsection