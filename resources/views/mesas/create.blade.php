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

                    @if(session()->has('success'))
                        <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="right-3 text-sm py-2 px-4 alert alert-success alert-dismissible">
                        <p class="m-0">{{ session('success')}}</p>
                        @php
                            Session::forget('success');
                        @endphp
                        </div>
                    @endif

                    @if(Session::has('errors'))
                        <div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="text-white list-group-item bg-transparent">Error: {{ $error }}</li>
                                @endforeach
                            </ul>
                            @php
                                Session::forget('errors');
                            @endphp
                        </div>
                    @endif

                    <form method="post" action="{{ route('mesas.store') }}" autocomplete="off">
                        @csrf
                        @method('post')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-escuelab">Escuela:</label>
                                    <input type="text" name="escuelab" id="input-escuelab" class="form-control form-control-sm form-control-alternative" value="{{ $escuelas->escuelas_nombre }}" disabled />
                                    <input type="hidden" name="escuela" id="input-escuela" value="{{ $escuelas->escuelas_id }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-mesab">Mesa:</label>
                                    <input type="text" name="mesab" id="input-mesab" class="form-control form-control-sm form-control-alternative" value="{{ $mesas }}" disabled />
                                    <input type="hidden" name="mesa" id="input-mesa" value="{{ $mesas }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="card m-2 bg-gray-100">
                                    <div class="card-body pt-2">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 701</span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: CAMBIA SANTA CRUZ</a>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sub-cambiacaleta">Sublema:</label>
                                                    <input type="text" name="subcambiacaleta" id="input-sub-cambiacaleta" class="form-control form-control-sm form-control-alternative" value="CAMBIA CALETA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-cand-cambiacaleta">Nombre:</label>
                                                    <input type="text" name="candcambiacaleta" id="input-cand-cambiacaleta" class="form-control form-control-sm form-control-alternative" value="ZAVAGNO MARINA ELIZABETH" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-cambiacaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-votos-cambiacaleta">Votos:</label>
                                                    <input type="number" name="votoscambiacaleta" id="input-votos-cambiacaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscambiacaleta') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

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
                                                    <input type="text" name="subcoaliciontuespacio" id="input-sub-coaliciontuespacio" class="form-control form-control-sm form-control-alternative" value="COALICION TU ESPACIO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-coaliciontuespacio">Nombre:</label>
                                                    <input type="text" name="candcoaliciontuespacio" id="input-cand-coaliciontuespacio" class="form-control form-control-sm form-control-alternative" value="RITONDALE GUILLERMO CLAUDIO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-coaliciontuespacio') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-coaliciontuespacio">Votos:</label>
                                                    <input type="number" name="votoscoaliciontuespacio" id="input-votos-coaliciontuespacio" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscoaliciontuespacio') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

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
                                                    <input type="text" name="subjuntosparacambiarcaleta" id="input-sub-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative" value="JUNTOS PARA CAMBIAR CALETA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-juntosparacambiarcaleta">Nombre:</label>
                                                    <input type="text" name="candjuntosparacambiarcaleta" id="input-cand-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative" value="GANGA JUAN RAMON" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-juntosparacambiarcaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-juntosparacambiarcaleta">Votos:</label>
                                                    <input type="number" name="votosjuntosparacambiarcaleta" id="input-votos-juntosparacambiarcaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosjuntosparacambiarcaleta') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

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
                                                    <input type="text" name="subjuntospodemos" id="input-sub-juntospodemos" class="form-control form-control-sm form-control-alternative" value="JUNTOS PODEMOS" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-juntospodemos">Nombre:</label>
                                                    <input type="text" name="candjuntospodemos" id="input-cand-juntospodemos" class="form-control form-control-sm form-control-alternative" value="MERA MONCADA OSCAR DANIEL" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-juntospodemos') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-juntospodemos">Votos:</label>
                                                    <input type="number" name="votosjuntospodemos" id="input-votos-juntospodemos" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosjuntospodemos') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

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
                                                    <label class="form-control-label d-lg-none" for="input-sub-porcaleta">Sublema:</label>
                                                    <input type="text" name="subporcaleta" id="input-sub-porcaleta" class="form-control form-control-sm form-control-alternative" value="POR CALETA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-porcaleta">Nombre:</label>
                                                    <input type="text" name="candporcaleta" id="input-cand-porcaleta" class="form-control form-control-sm form-control-alternative" value="LUCERO MIRTA AZUCENA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-porcaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-porcaleta">Votos:</label>
                                                    <input type="number" name="votosporcaleta" id="input-votos-porcaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosporcaleta') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosporcaleta'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosporcaleta') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 d-none d-lg-block"></div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-total-lema701">Total Lema 701:</label>
                                                    <input type="text" name="total-lema701" id="input-total-lema701" class="form-control form-control-sm form-control-alternative text-center" value="0" disabled />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="card m-2">
                                    <div class="card-body pt-2 bg-gray-100">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 702</span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: UNION POR LA PATRIA</a>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sub-19dediciembre">Sublema:</label>
                                                    <input type="text" name="sub19dediciembre" id="input-sub-19dediciembre" class="form-control form-control-sm form-control-alternative" value="19 DE DICIEMBRE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-cand-19dediciembre">Nombre:</label>
                                                    <input type="text" name="cand19dediciembre" id="input-cand-19dediciembre" class="form-control form-control-sm form-control-alternative" value="JARA ELIZABETH DEL CARMEN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-19dediciembre') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-votos-19dediciembre">Votos:</label>
                                                    <input type="number" name="votos19dediciembre" id="input-votos-19dediciembre" class="form-control form-control-sm form-control-alternative{{ $errors->has('votos19dediciembre') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votos19dediciembre'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votos19dediciembre') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-caletacrece">Sublema:</label>
                                                    <input type="text" name="subcaletacrece" id="input-sub-caletacrece" class="form-control form-control-sm form-control-alternative" value="CALETA OLIVIA CRECE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-caletacrece">Nombre:</label>
                                                    <input type="text" name="candcaletacrece" id="input-cand-caletacrece" class="form-control form-control-sm form-control-alternative" value="ROGNETTA NELSON MATIAS" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-caletacrece') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-caletacrece">Votos:</label>
                                                    <input type="number" name="votoscaletacrece" id="input-votos-coaliciontuespacio" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscaletacrece') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoscaletacrece'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoscaletacrece') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-caletanosune">Sublema:</label>
                                                    <input type="text" name="subcaletanosune" id="input-sub-caletanosune" class="form-control form-control-sm form-control-alternative" value="CALETA OLIVIA NOS UNE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-caletanosune">Nombre:</label>
                                                    <input type="text" name="candcaletanosune" id="input-cand-caletanosune" class="form-control form-control-sm form-control-alternative" value="JUAREZ JUAN CARLOS" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-caletanosune') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-caletanosune">Votos:</label>
                                                    <input type="number" name="votoscaletanosune" id="input-votos-caletanosune" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscaletanosune') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoscaletanosune'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoscaletanosune') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-caletasi">Sublema:</label>
                                                    <input type="text" name="subcaletasi" id="input-sub-caletasi" class="form-control form-control-sm form-control-alternative" value="CALETA SI" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-caletasi">Nombre:</label>
                                                    <input type="text" name="candcaletasi" id="input-cand-caletasi" class="form-control form-control-sm form-control-alternative" value="REYNOSO KARINA DEL CARMEN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-caletasi') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-caletasi">Votos:</label>
                                                    <input type="number" name="votoscaletasi" id="input-votos-caletasi" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscaletasi') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoscaletasi'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoscaletasi') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-caminoalavictoria">Sublema:</label>
                                                    <input type="text" name="subcaminoalavictoria" id="input-sub-caminoalavictoria" class="form-control form-control-sm form-control-alternative" value="CAMINO A LA VICTORIA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-caminoalavictoria">Nombre:</label>
                                                    <input type="text" name="candcaminoalavictoria" id="input-cand-caminoalavictoria" class="form-control form-control-sm form-control-alternative" value="FLORES DIEGO ANTONIO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-caminoalavictoria') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-caminoalavictoria">Votos:</label>
                                                    <input type="number" name="votoscaminoalavictoria" id="input-votos-caminoalavictoria" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscaminoalavictoria') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoscaminoalavictoria'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoscaminoalavictoria') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-desarrollocaletense">Sublema:</label>
                                                    <input type="text" name="subdesarrollocaletense" id="input-sub-desarrollocaletense" class="form-control form-control-sm form-control-alternative" value="DESARROLLO CALETENSE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-desarrollocaletense">Nombre:</label>
                                                    <input type="text" name="canddesarrollocaletense" id="input-cand-desarrollocaletense" class="form-control form-control-sm form-control-alternative" value="CIFUENTES WALTER ALEJANDRO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-desarrollocaletense') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-desarrollocaletense">Votos:</label>
                                                    <input type="number" name="votosdesarrollocaletense" id="input-votos-desarrollocaletense" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosdesarrollocaletense') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosdesarrollocaletense'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosdesarrollocaletense') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-elegimoscreer">Sublema:</label>
                                                    <input type="text" name="subelegimoscreer" id="input-sub-elegimoscreer" class="form-control form-control-sm form-control-alternative" value="ELEGIMOS CREER" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-elegimoscreer">Nombre:</label>
                                                    <input type="text" name="candelegimoscreer" id="input-cand-elegimoscreer" class="form-control form-control-sm form-control-alternative" value="REARTE CLAUDIA ALEJANDRA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-elegimoscreer') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-elegimoscreer">Votos:</label>
                                                    <input type="number" name="votoselegimoscreer" id="input-votos-elegimoscreer" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoselegimoscreer') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoselegimoscreer'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoselegimoscreer') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-fuezajoven">Sublema:</label>
                                                    <input type="text" name="subfuezajoven" id="input-sub-fuezajoven" class="form-control form-control-sm form-control-alternative" value="FUERZA JOVEN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-fuezajoven">Nombre:</label>
                                                    <input type="text" name="candfuezajoven" id="input-cand-fuezajoven" class="form-control form-control-sm form-control-alternative" value="TRONCOSO MIGUEL DAVID" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-fuezajoven') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-fuezajoven">Votos:</label>
                                                    <input type="number" name="votosfuezajoven" id="input-votos-fuezajoven" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosfuezajoven') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosfuezajoven'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosfuezajoven') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-hastalavictoria">Sublema:</label>
                                                    <input type="text" name="subhastalavictoria" id="input-sub-hastalavictoria" class="form-control form-control-sm form-control-alternative" value="HASTA LA VICTORIA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-hastalavictoria">Nombre:</label>
                                                    <input type="text" name="candhastalavictoria" id="input-cand-hastalavictoria" class="form-control form-control-sm form-control-alternative" value="ACOSTA ROBERTO CESAR" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-hastalavictoria') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-hastalavictoria">Votos:</label>
                                                    <input type="number" name="votoshastalavictoria" id="input-votos-hastalavictoria" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoshastalavictoria') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoshastalavictoria'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoshastalavictoria') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-kolinacaleta">Sublema:</label>
                                                    <input type="text" name="subkolinacaleta" id="input-sub-kolinacaleta" class="form-control form-control-sm form-control-alternative" value="KOLINA CALETA OLIVIA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-kolinacaleta">Nombre:</label>
                                                    <input type="text" name="candkolinacaleta" id="input-cand-kolinacaleta" class="form-control form-control-sm form-control-alternative" value="HUANCO LUIS ALBERTO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-kolinacaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-kolinacaleta">Votos:</label>
                                                    <input type="number" name="votoskolinacaleta" id="input-votos-kolinacaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoskolinacaleta') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoskolinacaleta'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoskolinacaleta') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-lealtadycompromiso">Sublema:</label>
                                                    <input type="text" name="sublealtadycompromiso" id="input-sub-lealtadycompromiso" class="form-control form-control-sm form-control-alternative" value="LEALTAD Y COMPROMISO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-lealtadycompromiso">Nombre:</label>
                                                    <input type="text" name="candlealtadycompromiso" id="input-cand-lealtadycompromiso" class="form-control form-control-sm form-control-alternative" value="PEREDO ARIEL ANDRES" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-lealtadycompromiso') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-lealtadycompromiso">Votos:</label>
                                                    <input type="number" name="votoslealtadycompromiso" id="input-votos-lealtadycompromiso" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoslealtadycompromiso') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoslealtadycompromiso'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoslealtadycompromiso') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-mascerca">Sublema:</label>
                                                    <input type="text" name="submascerca" id="input-sub-mascerca" class="form-control form-control-sm form-control-alternative" value="MAS CERCA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-mascerca">Nombre:</label>
                                                    <input type="text" name="candmascerca" id="input-cand-mascerca" class="form-control form-control-sm form-control-alternative" value="DIAZ SANDRA LILIANA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-mascerca') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-mascerca">Votos:</label>
                                                    <input type="number" name="votosmascerca" id="input-votos-mascerca" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosmascerca') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosmascerca'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosmascerca') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-mejorcaleta">Sublema:</label>
                                                    <input type="text" name="submejorcaleta" id="input-sub-mejorcaleta" class="form-control form-control-sm form-control-alternative" value="MEJOR CALETA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-mejorcaleta">Nombre:</label>
                                                    <input type="text" name="candmejorcaleta" id="input-cand-mejorcaleta" class="form-control form-control-sm form-control-alternative" value="RIVERO RICARDO RUBEN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-mejorcaleta') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-mejorcaleta">Votos:</label>
                                                    <input type="number" name="votosmejorcaleta" id="input-votos-mejorcaleta" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosmejorcaleta') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosmejorcaleta'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosmejorcaleta') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-naceunaesperanza">Sublema:</label>
                                                    <input type="text" name="subnaceunaesperanza" id="input-sub-naceunaesperanza" class="form-control form-control-sm form-control-alternative" value="NACE UNA ESPERANZA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-naceunaesperanza">Nombre:</label>
                                                    <input type="text" name="candnaceunaesperanza" id="input-cand-naceunaesperanza" class="form-control form-control-sm form-control-alternative" value="SASSO TANIA PAOLA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-naceunaesperanza') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-naceunaesperanza">Votos:</label>
                                                    <input type="number" name="votosnaceunaesperanza" id="input-votos-naceunaesperanza" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosnaceunaesperanza') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosnaceunaesperanza'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosnaceunaesperanza') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-pensarcaletense">Sublema:</label>
                                                    <input type="text" name="subpensarcaletense" id="input-sub-pensarcaletense" class="form-control form-control-sm form-control-alternative" value="PENSAR CALETENSE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-pensarcaletense">Nombre:</label>
                                                    <input type="text" name="candpensarcaletense" id="input-cand-pensarcaletense" class="form-control form-control-sm form-control-alternative" value="AYBAR MANUEL ALEJANDRO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-pensarcaletense') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-pensarcaletense">Votos:</label>
                                                    <input type="number" name="votospensarcaletense" id="input-votos-pensarcaletense" class="form-control form-control-sm form-control-alternative{{ $errors->has('votospensarcaletense') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votospensarcaletense'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votospensarcaletense') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-propuestajoven">Sublema:</label>
                                                    <input type="text" name="subpropuestajoven" id="input-sub-propuestajoven" class="form-control form-control-sm form-control-alternative" value="PROPUESTA JOVEN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-propuestajoven">Nombre:</label>
                                                    <input type="text" name="candpropuestajoven" id="input-cand-propuestajoven" class="form-control form-control-sm form-control-alternative" value="CARDENAS ANDREA KARINA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-propuestajoven') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-propuestajoven">Votos:</label>
                                                    <input type="number" name="votospropuestajoven" id="input-votos-propuestajoven" class="form-control form-control-sm form-control-alternative{{ $errors->has('votospropuestajoven') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votospropuestajoven'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votospropuestajoven') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-proyectojoven">Sublema:</label>
                                                    <input type="text" name="subproyectojoven" id="input-sub-proyectojoven" class="form-control form-control-sm form-control-alternative" value="PROYECTO JOVEN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-proyectojoven">Nombre:</label>
                                                    <input type="text" name="candproyectojoven" id="input-cand-proyectojoven" class="form-control form-control-sm form-control-alternative" value="TERRAZ GERARDO VICENTE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-proyectojoven') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-proyectojoven">Votos:</label>
                                                    <input type="number" name="votosproyectojoven" id="input-votos-proyectojoven" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosproyectojoven') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosproyectojoven'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosproyectojoven') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-unidadycompromiso">Sublema:</label>
                                                    <input type="text" name="subunidadycompromiso" id="input-sub-unidadycompromiso" class="form-control form-control-sm form-control-alternative" value="UNIDAD Y COMPROMISO MILITANTE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-unidadycompromiso">Nombre:</label>
                                                    <input type="text" name="candunidadycompromiso" id="input-cand-unidadycompromiso" class="form-control form-control-sm form-control-alternative" value="SALINAS MARIA DE LA PAZ" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-unidadycompromiso') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-unidadycompromiso">Votos:</label>
                                                    <input type="number" name="votosunidadycompromiso" id="input-votos-unidadycompromiso" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosunidadycompromiso') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosunidadycompromiso'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosunidadycompromiso') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 d-none d-lg-block"></div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-total-lema702">Total Lema 702:</label>
                                                    <input type="text" name="total-lema702" id="input-total-lema702" class="form-control form-control-sm form-control-alternative text-center" value="0" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card m-2">
                                    <div class="card-body pt-2 bg-gray-100">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 703</span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: FRENTE DE IZQUIERDA Y DE TRABAJADORES</a>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sub-frentedeizquierda">Sublema:</label>
                                                    <input type="text" name="subfrentedeizquierda" id="input-sub-frentedeizquierda" class="form-control form-control-sm form-control-alternative" value="UNIDAD (FIT-U)" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-cand-frentedeizquierda">Nombre:</label>
                                                    <input type="text" name="candfrentedeizquierda" id="input-cand-frentedeizquierda" class="form-control form-control-sm form-control-alternative" value="FARFAN RUTH LORENA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-frentedeizquierda') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-votos-frentedeizquierda">Votos:</label>
                                                    <input type="number" name="votosfrentedeizquierda" id="input-votos-frentedeizquierda" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosfrentedeizquierda') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosfrentedeizquierda'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosfrentedeizquierda') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 d-none d-lg-block"></div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-total-lema703">Total Lema 703:</label>
                                                    <input type="text" name="total-lema703" id="input-total-lema703" class="form-control form-control-sm form-control-alternative text-center" value="0" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card m-2 bg-gray-100">
                                    <div class="card-body pt-2">
                                        <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 704</span>
                                        <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: POR SANTA CRUZ</a>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-sub-cambiandostacruz">Sublema:</label>
                                                    <input type="text" name="subcambiandostacruz" id="input-sub-cambiandostacruz" class="form-control form-control-sm form-control-alternative" value="CAMBIANDO SANTA CRUZ" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-cand-cambiandostacruz">Nombre:</label>
                                                    <input type="text" name="candcambiandostacruz" id="input-cand-cambiandostacruz" class="form-control form-control-sm form-control-alternative" value="GOMEZ HECTOR ARGENTINO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-cambiandostacruz') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-votos-cambiandostacruz">Votos:</label>
                                                    <input type="number" name="votoscambiandostacruz" id="input-votos-cambiandostacruz" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscambiandostacruz') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoscambiandostacruz'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoscambiandostacruz') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-consensopro">Sublema:</label>
                                                    <input type="text" name="subconsensopro" id="input-sub-consensopro" class="form-control form-control-sm form-control-alternative" value="CONSENSO PRO SANTA CRUZ" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-consensopro">Nombre:</label>
                                                    <input type="text" name="candconsensopro" id="input-cand-consensopro" class="form-control form-control-sm form-control-alternative" value="BEHM ERNESTO OMAR" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-consensopro') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-consensopro">Votos:</label>
                                                    <input type="number" name="votosconsensopro" id="input-votos-consensopro" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosconsensopro') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosconsensopro'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosconsensopro') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-esahora">Sublema:</label>
                                                    <input type="text" name="subesahora" id="input-sub-esahora" class="form-control form-control-sm form-control-alternative" value="ES AHORA SANTA CRUZ" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-esahora">Nombre:</label>
                                                    <input type="text" name="candesahora" id="input-cand-esahora" class="form-control form-control-sm form-control-alternative" value="NAVARRETE LISANDRO JAVIER" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-esahora') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-esahora">Votos:</label>
                                                    <input type="number" name="votosesahora" id="input-votos-esahora" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosesahora') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosesahora'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosesahora') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-lafuerzadelcambio">Sublema:</label>
                                                    <input type="text" name="sublafuerzadelcambio" id="input-sub-lafuerzadelcambio" class="form-control form-control-sm form-control-alternative" value="LA FUERZA DEL CAMBIO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-lafuerzadelcambio">Nombre:</label>
                                                    <input type="text" name="candlafuerzadelcambio" id="input-cand-lafuerzadelcambio" class="form-control form-control-sm form-control-alternative" value="GOMEZ CASTRO ROSARIO AYLEN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-lafuerzadelcambio') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-lafuerzadelcambio">Votos:</label>
                                                    <input type="number" name="votoslafuerzadelcambio" id="input-votos-lafuerzadelcambio" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoslafuerzadelcambio') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votoslafuerzadelcambio'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votoslafuerzadelcambio') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-massantacruz">Sublema:</label>
                                                    <input type="text" name="submassantacruz" id="input-sub-massantacruz" class="form-control form-control-sm form-control-alternative" value="MAS SANTA CRUZ" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-massantacruz">Nombre:</label>
                                                    <input type="text" name="candmassantacruz" id="input-cand-massantacruz" class="form-control form-control-sm form-control-alternative" value="ACOSTA DAVID EMANUEL" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-massantacruz') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-massantacruz">Votos:</label>
                                                    <input type="number" name="votosmassantacruz" id="input-votos-massantacruz" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosmassantacruz') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosmassantacruz'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosmassantacruz') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-milei">Sublema:</label>
                                                    <input type="text" name="submilei" id="input-sub-milei" class="form-control form-control-sm form-control-alternative" value="MILEI" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-milei">Nombre:</label>
                                                    <input type="text" name="candmilei" id="input-cand-milei" class="form-control form-control-sm form-control-alternative" value="MUÑOZ JAVIER EDUARDO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-milei') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-milei">Votos:</label>
                                                    <input type="number" name="votosmilei" id="input-votos-milei" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosmilei') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosmilei'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosmilei') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-paracrecer">Sublema:</label>
                                                    <input type="text" name="subparacrecer" id="input-sub-paracrecer" class="form-control form-control-sm form-control-alternative" value="PARA CRECER" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-paracrecer">Nombre:</label>
                                                    <input type="text" name="candparacrecer" id="input-cand-paracrecer" class="form-control form-control-sm form-control-alternative" value="PRADOS CARLOS FACUNDO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-paracrecer') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-paracrecer">Votos:</label>
                                                    <input type="number" name="votosparacrecer" id="input-votos-paracrecer" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosparacrecer') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosparacrecer'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosparacrecer') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-podemosrenovar">Sublema:</label>
                                                    <input type="text" name="subpodemosrenovar" id="input-sub-podemosrenovar" class="form-control form-control-sm form-control-alternative" value="PODEMOS RENOVAR" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-podemosrenovar">Nombre:</label>
                                                    <input type="text" name="candpodemosrenovar" id="input-cand-podemosrenovar" class="form-control form-control-sm form-control-alternative" value="JUAREZ PABLO LEANDRO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-podemosrenovar') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-podemosrenovar">Votos:</label>
                                                    <input type="number" name="votospodemosrenovar" id="input-votos-podemosrenovar" class="form-control form-control-sm form-control-alternative{{ $errors->has('votospodemosrenovar') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votospodemosrenovar'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votospodemosrenovar') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-porcaletaoliv">Sublema:</label>
                                                    <input type="text" name="subporcaletaoliv" id="input-sub-porcaletaoliv" class="form-control form-control-sm form-control-alternative" value="POR CALETA OLIVIA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-porcaletaoliv">Nombre:</label>
                                                    <input type="text" name="candporcaletaoliv" id="input-cand-porcaletaoliv" class="form-control form-control-sm form-control-alternative" value="NANNY HERALDO JUAN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-porcaletaoliv') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-porcaletaoliv">Votos:</label>
                                                    <input type="number" name="votosporcaletaoliv" id="input-votos-porcaletaoliv" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosporcaletaoliv') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votosporcaletaoliv'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votosporcaletaoliv') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-santacruzpuede">Sublema:</label>
                                                    <input type="text" name="subsantacruzpuede" id="input-sub-santacruzpuede" class="form-control form-control-sm form-control-alternative" value="SANTA CRUZ PUEDE" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-santacruzpuede">Nombre:</label>
                                                    <input type="text" name="candsantacruzpuede" id="input-cand-santacruzpuede" class="form-control form-control-sm form-control-alternative" value="CHAMORRO VICTOR HUGO" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-santacruzpuede') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-santacruzpuede">Votos:</label>
                                                    <input type="number" name="votossantacruzpuede" id="input-votos-santacruzpuede" class="form-control form-control-sm form-control-alternative{{ $errors->has('votossantacruzpuede') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votossantacruzpuede'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votossantacruzpuede') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-soluciones">Sublema:</label>
                                                    <input type="text" name="subsoluciones" id="input-sub-soluciones" class="form-control form-control-sm form-control-alternative" value="SOLUCIONES" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-soluciones">Nombre:</label>
                                                    <input type="text" name="candsoluciones" id="input-cand-soluciones" class="form-control form-control-sm form-control-alternative" value="ACUÑA KUNZ JUAN ERWIN" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-soluciones') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-soluciones">Votos:</label>
                                                    <input type="number" name="votossoluciones" id="input-votos-soluciones" class="form-control form-control-sm form-control-alternative{{ $errors->has('votossoluciones') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votossoluciones'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votossoluciones') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-sub-somosstacruz">Sublema:</label>
                                                    <input type="text" name="subsomosstacruz" id="input-sub-somosstacruz" class="form-control form-control-sm form-control-alternative" value="SOMOS SANTA CRUZ" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 d-none d-lg-block">
                                                <div class="form-group">
                                                    <label class="form-control-label d-lg-none" for="input-cand-somosstacruz">Nombre:</label>
                                                    <input type="text" name="candsomosstacruz" id="input-cand-somosstacruz" class="form-control form-control-sm form-control-alternative" value="NAVES CONNIE ROSSANNA" disabled />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-group{{ $errors->has('votos-somosstacruz') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label d-lg-none" for="input-votos-somosstacruz">Votos:</label>
                                                    <input type="number" name="votossomosstacruz" id="input-votos-somosstacruz" class="form-control form-control-sm form-control-alternative{{ $errors->has('votossomosstacruz') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                                    @if ($errors->has('votossomosstacruz'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('votossomosstacruz') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>                                        

                                        <div class="row">
                                            <div class="col-lg-8 d-none d-lg-block"></div>
                                            <div class="col-lg-4 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-total-lema704">Total Lema 704:</label>
                                                    <input type="text" name="total-lema704" id="input-total-lema704" class="form-control form-control-sm form-control-alternative text-center" value="0" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-group{{ $errors->has('votosnulos') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-votosnulos">Votos Mulos:</label>
                                            <input type="number" name="votosnulos" id="input-votosnulos" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosnulos') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                            @if ($errors->has('votosnulos'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('votosnulos') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-group{{ $errors->has('votosrecurridos') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-votosrecurridos">Votos Recurridos:</label>
                                            <input type="number" name="votosrecurridos" id="input-votosrecurridos" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosrecurridos') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                            @if ($errors->has('votosrecurridos'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('votosrecurridos') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-group{{ $errors->has('votosimpugnados') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-votosimpugnados">Votos Id Impugnada:</label>
                                            <input type="number" name="votosimpugnados" id="input-votosimpugnados" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosimpugnados') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                            @if ($errors->has('votosimpugnados'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('votosimpugnados') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-group{{ $errors->has('votoscomelectoral') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-votoscomelectoral">Votos Com.Electoral:</label>
                                            <input type="number" name="votoscomelectoral" id="input-votoscomelectoral" class="form-control form-control-sm form-control-alternative{{ $errors->has('votoscomelectoral') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                            @if ($errors->has('votoscomelectoral'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('votoscomelectoral') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-group{{ $errors->has('votosblanco') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-votosblanco">Votos Blanco:</label>
                                            <input type="number" name="votosblanco" id="input-votosblanco" class="form-control form-control-sm form-control-alternative{{ $errors->has('votosblanco') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                            @if ($errors->has('votosblanco'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('votosblanco') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="form-group{{ $errors->has('totalgral') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-totalgral">Total General:</label>
                                            <input type="number" name="totalgral" id="input-totalgral" class="form-control form-control-sm form-control-alternative{{ $errors->has('totalgral') ? ' is-invalid' : '' }}" maxlength="3" placeholder="Votos" min="0" value="" required />

                                            @if ($errors->has('totalgral'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('totalgral') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @if(Session::has('errors'))
                            @php
                                Session::forget('errors');
                            @endphp
                        @endif

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