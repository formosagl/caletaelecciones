@extends('layouts.user_type.auth')

@section('content')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-sm-12">
                            <h3 class="mb-0">Cargar datos de una mesa</h3>
                            <p class="text-sm mb-0">Aquí podrás cargar los datos de la escuela/mesa seleccionada.</p>
                        </div>
                        <div class="col-lg-4 col-sm-12 text-end">
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

                    <form method="post" action="{{ route('mesas.store') }}" autocomplete="off">
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-escuelab">Escuela:</label>
                                    <input type="text" name="escuelab" id="input-escuelab" class="form-control form-control-sm form-control-alternative" value="{{ $escuelas->escuelas_nombre }}" readonly />
                                    <input type="hidden" name="escuela" id="input-escuela" value="{{ $escuelas->escuela_id }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-mesa">Mesa:</label>
                                    <input type="text" name="mesa" id="input-mesa" class="form-control form-control-sm form-control-alternative" value="{{ $mesas }}" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="card m-2">

                                    <div class="card-body pt-2">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 701</span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: CAMBIA SANTA CRUZ</a>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sub-cambiacaleta">Sublema:</label>
                                                    <input type="text" name="subcambiacaleta" id="input-sub-cambiacaleta" class="form-control form-control-sm form-control-alternative" value="CAMBIA CALETA" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-cand-cambiacaleta">Nombre:</label>
                                                    <input type="text" name="candcambiacaleta" id="input-cand-cambiacaleta" class="form-control form-control-sm form-control-alternative" value="ZAVAGNO MARINA ELIZABETH" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-cambiacaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-votos-cambiacaleta">Votos:</label>
                                                    <input type="number" name="votoscambiacaleta" id="input-votos-cambiacaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscambiacaleta') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" value="" required />

                                                    @if ($errors->has('votoscambiacaleta'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoscambiacaleta') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-coaliciontuespacio">Sublema:</label>
                                                    <input type="text" name="subcoaliciontuespacio" id="input-sub-coaliciontuespacio" class="form-control form-control-sm form-control-alternative" value="COALICION TU ESPACIO" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-coaliciontuespacio">Nombre:</label>
                                                    <input type="text" name="candcoaliciontuespacio" id="input-cand-coaliciontuespacio" class="form-control form-control-sm form-control-alternative" value="RITONDALE GUILLERMO CLAUDIO" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-coaliciontuespacio') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-coaliciontuespacio">Votos:</label>
                                                    <input type="number" name="votoscoaliciontuespacio" id="input-votos-coaliciontuespacio" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscoaliciontuespacio') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" value="" required />

                                                    @if ($errors->has('votoscoaliciontuespacio'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoscoaliciontuespacio') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-juntosparacambiarcaleta">Sublema:</label>
                                                    <input type="text" name="subjuntosparacambiarcaleta" id="input-sub-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative" value="JUNTOS PARA CAMBIAR CALETA" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-juntosparacambiarcaleta">Nombre:</label>
                                                    <input type="text" name="candjuntosparacambiarcaleta" id="input-cand-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative" value="GANGA JUAN RAMON" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-juntosparacambiarcaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-juntosparacambiarcaleta">Votos:</label>
                                                    <input type="number" name="votosjuntosparacambiarcaleta" id="input-votos-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscoaliciontuespacio') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" value="" required />

                                                    @if ($errors->has('votosjuntosparacambiarcaleta'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosjuntosparacambiarcaleta') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-juntospodemos">Sublema:</label>
                                                    <input type="text" name="subjuntospodemos" id="input-sub-juntospodemos" class="form-control form-control-sm form-control-alternative" value="JUNTOS PODEMOS" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-juntospodemos">Nombre:</label>
                                                    <input type="text" name="candjuntospodemos" id="input-cand-juntospodemos" class="form-control form-control-sm form-control-alternative" value="MERA MONCADA OSCAR DANIEL" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-juntospodemos') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-juntospodemos">Votos:</label>
                                                    <input type="number" name="votosjuntospodemos" id="input-votos-juntospodemos" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosjuntospodemos') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" value="" required />

                                                    @if ($errors->has('votosjuntospodemos'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosjuntospodemos') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-juntosparacambiarcaleta">Sublema:</label>
                                                    <input type="text" name="subjuntosparacambiarcaleta" id="input-sub-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative" value="JUNTOS PARA CAMBIAR CALETA" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-juntosparacambiarcaleta">Nombre:</label>
                                                    <input type="text" name="candjuntosparacambiarcaleta" id="input-cand-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative" value="GANGA JUAN RAMON" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-juntosparacambiarcaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-juntosparacambiarcaleta">Votos:</label>
                                                    <input type="number" name="votosjuntosparacambiarcaleta" id="input-votos-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscoaliciontuespacio') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" value="" required />

                                                    @if ($errors->has('votosjuntosparacambiarcaleta'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosjuntosparacambiarcaleta') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <div class="card m-2">

                                    <div class="card-body pt-2">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro XXX</span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">Lema XXX</a>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sub-cambiacaleta">Sublema:</label>
                                                    <input type="text" name="subcambiacaleta" id="input-sub-cambiacaleta" class="form-control form-control-sm form-control-alternative" value="CAMBIA CALETA" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-cand-cambiacaleta">Nombre:</label>
                                                    <input type="text" name="candcambiacaleta" id="input-cand-cambiacaleta" class="form-control form-control-sm form-control-alternative" value="ZAVAGNO MARINA ELIZABETH" readonly />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-cambiacaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-votos-cambiacaleta">Votos:</label>
                                                    <input type="number" name="votos-cambiacaleta" id="input-votos-cambiacaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votos-cambiacaleta') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" value="" required />

                                                    @if ($errors->has('votos-cambiacaleta'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votos-cambiacaleta') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </div>
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