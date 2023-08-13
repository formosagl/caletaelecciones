@extends('layouts.user_type.auth')

@section('content')

<div class="container-fluid mt--7">
    <div class="row mt-3">
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

            <div class="card bg-default shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0">Seleccionar Mesa</h3>
                            <p class="text-sm mb-0">Aquí podrás seleccionar la escuela y mesa a cargar.</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-gray-200">

                    <form method="post" action="{{ route('mesas.cargar') }}" autocomplete="off">
                        @csrf
                        @method('post')

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('escuela') ? ' has-danger' : '' }}">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-escuela">Escuela:</label>
                                        <select class="form-control" id="input-escuela" name="escuela" required>
                                            <option value=""></option>
                                            @foreach ($escuelas as $escuela)
                                            <option value="{{ $escuela->escuelas_id }}" data-desde="{{ $escuela->escuelas_desde }}" data-hasta="{{ $escuela->escuelas_hasta }}">{{ $escuela->escuelas_nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($errors->has('escuela'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('escuela') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('mesa') ? ' has-danger' : '' }}">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-mesa">Mesa Nro:</label>
                                        <select class="form-control" id="input-mesa" name="mesa" required>

                                        </select>
                                    </div>

                                    @if ($errors->has('mesa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mesa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success mt-4">Cargar Mesa</button>
                            </div>
                        </div>

                    </form>

                </div>


            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $("#input-escuela").on('change', function() {

                var a = '<option value=""></option>';
                for (var i = $(this).find("option:selected").data("desde"); i <= $(this).find("option:selected").data("hasta"); i++) {
                    a += '<option value="' + i + '">' + i + '</option>';
                }
                
                $("#input-mesa").html(a);
            });

        });
    </script>
@endpush