@extends('layouts.app')

@section('template_title')
    {{ $operacione->name ?? 'Show Operacione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Operacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('operaciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idcatalogo:</strong>
                            {{ $operacione->idcatalogo }}
                        </div>
                        <div class="form-group">
                            <strong>Idtablero:</strong>
                            {{ $operacione->idtablero }}
                        </div>
                        <div class="form-group">
                            <strong>Iduser:</strong>
                            {{ $operacione->iduser }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
