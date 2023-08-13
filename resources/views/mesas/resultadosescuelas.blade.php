@extends('layouts.argon')

@section('content')
    @include('layouts.headers.nocards')
    
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">

                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(Session::has('errors'))
                    <div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @php
                            Session::forget('errors');
                        @endphp
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card bg-light shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Editar Resultados</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('gallery.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('elecciones.updateresultados' ) }}" autocomplete="off">
                            @csrf
                            @method('post')

                            @for ($i = 1; $i <= 3; $i++)

                                <div class="card bg-default shadow">
                                    <div class="card-header bg-transparent border-0">
                                        <h3 class="mb-0 text-white">Elecciones # {{ $i }}</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-dark table-flush">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Candidato #1</th>
                                                    <th scope="col">Votos</th>
                                                    <th scope="col">Porcentaje</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($elecciones[$i] as $eleccion)
                                                    <tr>
                                                        <td scope="row">{{ $eleccion->nombre }}</td>
                                                        <td>{{ $eleccion->candidato1 }}</td>
                                                        <td><input type="text" name="votos-{{ $eleccion->elecciones_id }}" id="input-votos-{{ $eleccion->elecciones_id }}" class="form-control text-center form-control-sm form-control-alternative{{ $errors->has('cargo1') ? ' is-invalid' : '' }}" maxlength="10" placeholder="Votos" value="{{ $eleccion->votos }}" required /></td>
                                                        <td><input type="text" name="porcentaje-{{ $eleccion->elecciones_id }}" id="input-porcentaje-{{ $eleccion->elecciones_id }}" class="form-control text-center form-control-sm form-control-alternative{{ $errors->has('cargo1') ? ' is-invalid' : '' }}" maxlength="6" placeholder="%" value="{{ $eleccion->porcentaje }}" required /></td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td scope="row">Mesas escrutadas #{{ $i }}:</td>
                                                    <td colspan="3"><input type="text" name="escrutadas-{{ $i }}" id="input-escrutadas-{{ $i }}" class="form-control text-center form-control-sm form-control-alternative{{ $errors->has('cargo1') ? ' is-invalid' : '' }}" maxlength="6" placeholder="%" value="{{ $escrutadas[$i] }}" required /></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endfor

                            <div class="text-center">
                                <a class="btn btn-secondary mt-4" href="{{ route('elecciones.index') }}">Descartar cambios</a>
                                <button type="submit" class="btn btn-success mt-4">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection