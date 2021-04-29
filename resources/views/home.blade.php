@extends('layouts.app')

@section('content')

<div class="card border-primary">
    <div class="card-header text-white bg-primary">{{ __('Dashboard') }}</div>
    <div class="card-body">
        @if (auth()->user()->is_Support)
        <div class="card border-success mb-3">
            <div class="card-header text-white bg-success">
                <h4 class="card-title">Incidencias asignadas a mí</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha creación</th>
                            <th>Título</th>
                        </tr>
                    </thead>
                    <tbody id="dashboard_my_incidents">
                        @foreach ($my_incidents as $incident)
                            <tr>
                                <td>
                                    <a href="/ver/{{ $incident->id }}">
                                        {{ $incident->id }}
                                    </a>
                                </td>
                                <td>{{ $incident->category->name }}</td>
                                <td>{{ $incident->severity_full }}</td>
                                <td>{{ $incident->state }}</td>
                                <td>{{ $incident->created_at }}</td>
                                <td>{{ $incident->title_short }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="card border-success mb-3">
            <div class="card-header text-white bg-success">
                <h4 class="card-title">Incidencias sin asignar</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha creación</th>
                            <th>Título</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody id="dashboard_pending_incidents">
                        @foreach ($pending_incidents as $incident)
                            <tr>
                                <td>
                                    <a href="/ver/{{ $incident->id }}">
                                        {{ $incident->id }}
                                    </a>
                                </td>
                                <td>{{ $incident->category->name }}</td>
                                <td>{{ $incident->severity_full }}</td>
                                <td>{{ $incident->state }}</td>
                                <td>{{ $incident->created_at }}</td>
                                <td>{{ $incident->title_short }}</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">
                                        Atender
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div> 
             
        @endif
        
        <div class="card border-success mb-3">
            <div class="card-header text-white bg-success">
                <h4 class="card-title">Incidencias reportadas por mí</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Categoría</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha creación</th>
                            <th>Título</th>
                            <th>Responsable</th>
                        </tr>
                    </thead>
                    <tbody id="dashboard_by_me">
                        @foreach ($incidents_by_me as $incident)
                            <tr>
                                <td>
                                    <a href="/ver/{{ $incident->id }}">
                                        {{ $incident->id }}
                                    </a>
                                </td>
                                <td>{{ $incident->category->name }}</td>
                                <td>{{ $incident->severity_full }}</td>
                                <td>{{ $incident->state }}</td>
                                <td>{{ $incident->created_at }}</td>
                                <td>{{ $incident->title_short }}</td>
                                <td>
                                    {{ $incident->support_id ?: 'Sin asignar'}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>        
                    
    </div>
</div>
@endsection