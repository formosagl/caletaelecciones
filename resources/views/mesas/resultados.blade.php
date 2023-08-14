@extends('layouts.user_type.auth')

@section('content')

<div class="container-fluid mt--7">
    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">

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

            <div class="card bg-light shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Resultados Generales</h3>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">Volver</a>
                        </div>
                    </div>
                </div>


                <div class="row mt-4 mx-2">
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize">Lema 701</p>
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">CAMBIA SANTA CRUZ</p>
                                            <h5 class="font-weight-bolder mb-0">{{ $resultados['total701'] }} <small class="text-sm font-weight-lighter">votos</small> <span class="text-success font-weight-bolder">{{ number_format( (($resultados['total701'] * 100 ) / $resultados['totalgral']) , 2, ",", ".") }}<small>%</small></span></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize">Lema 702</p>
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">UNION POR LA PATRIA</p>
                                            <h5 class="font-weight-bolder mb-0">{{ $resultados['total702'] }} <small class="text-sm font-weight-lighter">votos</small> <span class="text-success font-weight-bolder">{{ number_format( (($resultados['total702'] * 100 ) / $resultados['totalgral']) , 2, ",", ".") }}<small>%</small></span></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize">Lema 703</p>
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">FRENTE DE IZQUIERDA</p>
                                            <h5 class="font-weight-bolder mb-0">{{ $resultados['total703'] }} <small class="text-sm font-weight-lighter">votos</small> <span class="text-success font-weight-bolder">{{ number_format( (($resultados['total703'] * 100 ) / $resultados['totalgral']) , 2, ",", ".") }}<small>%</small></span></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize">Lema 704</p>
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">POR SANTA CRUZ</p>
                                            <h5 class="font-weight-bolder mb-0">{{ $resultados['total704'] }} <small class="text-sm font-weight-lighter">votos</small> <span class="text-success font-weight-bolder">{{ number_format( (($resultados['total704'] * 100 ) / $resultados['totalgral']) , 2, ",", ".") }}<small>%</small></span></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 701</span>
                            <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: CAMBIA SANTA CRUZ</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sublema</th>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Candidato</th>
                                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Votos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">CAMBIA CALETA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">ZAVAGNO MARINA ELIZABETH</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscambiacaleta'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">COALICION TU ESPACIO</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">RITONDALE GUILLERMO CLAUDIO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscoaliciontuespacio'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">JUNTOS PARA CAMBIAR CALETA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">GANGA JUAN RAMON</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosjuntosparacambiarcaleta'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">JUNTOS PODEMOS</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">MERA MONCADA OSCAR DANIEL</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosjuntospodemos'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">POR CALETA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">LUCERO MIRTA AZUCENA</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosporcaleta'] }}</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card bg-default shadow mt-3">
                        <div class="card-header bg-transparent border-0">
                            <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 702</span>
                            <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: UNION POR LA PATRIA</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sublema</th>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Candidato</th>
                                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Votos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">19 DE DICIEMBRE</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">JARA ELIZABETH DEL CARMEN</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votos19dediciembre'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">CALETA OLIVIA CRECE</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">ROGNETTA NELSON MATIAS</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscaletacrece'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">CALETA OLIVIA NOS UNE</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">JUAREZ JUAN CARLOS</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscaletanosune'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">CALETA SI</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">REYNOSO KARINA DEL CARMEN</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscaletasi'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">CAMINO A LA VICTORIA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">FLORES DIEGO ANTONIO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscaminoalavictoria'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">DESARROLLO CALETENSE</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">CIFUENTES WALTER ALEJANDRO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosdesarrollocaletense'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">ELEGIMOS CREER</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">REARTE CLAUDIA ALEJANDRA</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoselegimoscreer'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">FUERZA JOVEN</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">TRONCOSO MIGUEL DAVID</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosfuezajoven'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">HASTA LA VICTORIA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">ACOSTA ROBERTO CESAR</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoshastalavictoria'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">KOLINA CALETA OLIVIA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">HUANCO LUIS ALBERTO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoskolinacaleta'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">LEALTAD Y COMPROMISO</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">PEREDO ARIEL ANDRES</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoslealtadycompromiso'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">MAS CERCA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">DIAZ SANDRA LILIANA</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosmascerca'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">MEJOR CALETA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">RIVERO RICARDO RUBEN</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosmejorcaleta'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">NACE UNA ESPERANZA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">SASSO TANIA PAOLA</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosnaceunaesperanza'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">PENSAR CALETENSE</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">AYBAR MANUEL ALEJANDRO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votospensarcaletense'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">PROPUESTA JOVEN</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">CARDENAS ANDREA KARINA</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votospropuestajoven'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">PROYECTO JOVEN</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">TERRAZ GERARDO VICENTE</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosproyectojoven'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">UNIDAD Y COMPROMISO MILITANTE</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">SALINAS MARIA DE LA PAZ</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosunidadycompromiso'] }}</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card bg-default shadow mt-3">
                        <div class="card-header bg-transparent border-0">
                            <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 703</span>
                            <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: FRENTE DE IZQUIERDA Y DE TRABAJADORES</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sublema</th>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Candidato</th>
                                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Votos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">UNIDAD (FIT-U)</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">FARFAN RUTH LORENA</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosfrentedeizquierda'] }}</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card bg-default shadow mt-3">
                        <div class="card-header bg-transparent border-0">
                            <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">Nro 704</span>
                            <a href="javascript:;" class="card-title h5 d-block text-darker">Lema: POR SANTA CRUZ</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sublema</th>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Candidato</th>
                                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Votos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">CAMBIANDO SANTA CRUZ</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">GOMEZ HECTOR ARGENTINO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscambiandostacruz'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">CONSENSO PRO SANTA CRUZ</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">BEHM ERNESTO OMAR</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosconsensopro'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">ES AHORA SANTA CRUZ</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">NAVARRETE LISANDRO JAVIER</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosesahora'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">LA FUERZA DEL CAMBIO</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">GOMEZ CASTRO ROSARIO AYLEN</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoslafuerzadelcambio'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">MAS SANTA CRUZ</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">ACOSTA DAVID EMANUEL</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosmassantacruz'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">MILEI</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">MUÑOZ JAVIER EDUARDO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosmilei'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">PARA CRECER</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">PRADOS CARLOS FACUNDO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosparacrecer'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">PODEMOS RENOVAR</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">JUAREZ PABLO LEANDRO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votospodemosrenovar'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">POR CALETA OLIVIA</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">NANNY HERALDO JUAN</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosporcaletaoliv'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">SANTA CRUZ PUEDE</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">CHAMORRO VICTOR HUGO</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votossantacruzpuede'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">SOLUCIONES</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">ACUÑA KUNZ JUAN ERWIN</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votossoluciones'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0 px-3 py-1">SOMOS SANTA CRUZ</p>
                                        </td>
                                        <td scope="row">
                                            <p class="text-xs font-weight-bold mb-0">NAVES CONNIE ROSSANNA</p>
                                        </td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votossomosstacruz'] }}</span></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card bg-default shadow mt-3">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">&nbsp;</th>
                                        <th scope="col" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Votos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"><p class="text-xs font-weight-bold mb-0 px-3 py-1">VOTOS NULOS</p></td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosnulos'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"><p class="text-xs font-weight-bold mb-0 px-3 py-1">VOTOS RECURRIDOS</p></td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosrecurridos'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"><p class="text-xs font-weight-bold mb-0 px-3 py-1">VOTOS IMPUGNADOS</p></td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosimpugnados'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"><p class="text-xs font-weight-bold mb-0 px-3 py-1">VOTOS COM.ELECTORAL</p></td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votoscomelectoral'] }}</span></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"><p class="text-xs font-weight-bold mb-0 px-3 py-1">VOTOS BLANCO</p></td>
                                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-normal">{{ $resultados['votosblanco'] }}</span></td>
                                    </tr>
                                    <tr class="bg-dark text-white">
                                        <td scope="row"><p class="text-xs font-weight-bold mb-0 px-3 py-1">VOTOS TOTALES</p></td>
                                        <td class="align-middle text-center"><span class="text-xs font-weight-normal">{{ $resultados['totalgral'] }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="text-center mt-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">Volver</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection