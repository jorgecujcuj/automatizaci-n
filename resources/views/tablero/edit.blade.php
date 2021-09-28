@extends('layouts.app')

@section('template_title')
    Update Tablero
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Si esta seguro presionar el boton</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tableros.update', $tablero->id) }}"  role="form" enctype="multipart/form-data">
                        <p class="fw-bold" style="font-weight: bold;">Boton Rojo = Apagado</p>
                        <p class="fw-bold" style="font-weight: bold;">Boton Verde = Encendido</p>
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tablero.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
