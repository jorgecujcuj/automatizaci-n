@extends('layouts.app')

@section('template_title')
    {{ $img->name ?? 'Show Img' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Img</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('imgs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idtablero:</strong>
                            {{ $img->idtablero }}
                        </div>
                        <div class="form-group">
                            <strong>Img:</strong>
                            {{ $img->img }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
