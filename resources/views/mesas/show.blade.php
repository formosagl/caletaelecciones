@extends('layouts.user_type.auth')

@section('content')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-12">
                <div class="card bg-light shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nueva Lista de Candidatos</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('mesas.index') }}" class="btn btn-sm btn-primary">Volver</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif

                        <form method="post" action="{{ route('mesas.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            @if ($errors->count() > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-9 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-nombre">Nombre:</label>
                                        <input type="text" name="nombre" id="input-nombre" class="form-control form-control-sm form-control-alternative{{ $errors->has('nombre') ? ' is-invalid' : '' }}" maxlength="60" placeholder="Nombre" value="" required />

                                        @if ($errors->has('nombre'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <label class="form-control-label" for="input-tipo"># Elección:</label>
                                    <select class="form-control form-control-sm" id="input-tipo" name="tipo">
                                        <option value="0" selected># 1</option>
                                        <option value="1"># 2</option>
                                        <option value="2"># 3</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="form-control-label" for="input-color">Color:</label>
                                    <input type="text" maxlength="7" class="colorpicker form-control form-control-sm" value="" id="input-color" name="color" data-color-format="hex" />

                                    @if ($errors->has('color'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('color') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group{{ $errors->has('cargo1') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cargo1">Cargo:</label>
                                        <input type="text" name="cargo1" id="input-cargo1" class="form-control form-control-sm form-control-alternative{{ $errors->has('cargo1') ? ' is-invalid' : '' }}" maxlength="60" placeholder="Cargo" value="" required />

                                        @if ($errors->has('cargo1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cargo1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group{{ $errors->has('candidato1') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-candidato1">Candidato #1:</label>
                                        <input type="text" name="candidato1" id="input-candidato1" class="form-control form-control-sm form-control-alternative{{ $errors->has('candidato1') ? ' is-invalid' : '' }}" maxlength="60" placeholder="Candidato #1" value="" required />
                                        
                                        @if ($errors->has('candidato1'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('candidato1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group{{ $errors->has('cargo2') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cargo2">Cargo:</label>
                                        <input type="text" name="cargo2" id="input-cargo2" class="form-control form-control-sm form-control-alternative{{ $errors->has('cargo2') ? ' is-invalid' : '' }}" maxlength="60" placeholder="Cargo" value="" required />

                                        @if ($errors->has('cargo2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('cargo2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="form-group{{ $errors->has('candidato2') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-candidato2">Candidato #1:</label>
                                        <input type="text" name="candidato2" id="input-candidato2" class="form-control form-control-sm form-control-alternative{{ $errors->has('candidato2') ? ' is-invalid' : '' }}" maxlength="60" placeholder="Candidato #2" value="" required />
                                        
                                        @if ($errors->has('candidato2'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('candidato2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group{{ $errors->has('imagen') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-imagen">{{ __('Imagen (PNG 400x260)') }}</label>
                                        <input type="file" name="imagen" id="input-imagen" class="form-control form-control-sm form-control-alternative{{ $errors->has('imagen') ? ' is-invalid' : '' }}" placeholder="{{ __('Imagen') }}" required />

                                        @if ($errors->has('imagen'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('imagen') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group{{ $errors->has('logo') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-logo">{{ __('Logo (PNG 270x120)') }}</label>
                                        <input type="file" name="logo" id="input-logo" class="form-control form-control-sm form-control-alternative{{ $errors->has('logo') ? ' is-invalid' : '' }}" placeholder="{{ __('Logo') }}" required />

                                        @if ($errors->has('logo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <a class="btn btn-secondary mt-4" href="{{ route('mesas.index') }}">Descartar cambios</a>
                                    <button type="submit" class="btn btn-success mt-4">Guardar</button>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

