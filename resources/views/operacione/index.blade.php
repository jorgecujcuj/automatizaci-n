@extends('layouts.app')

@section('template_title')
    Operacione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Operacione: ') }}
                            </span>

                             <!--<div class="float-right">
                                <a href="{{ route('operaciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>-->
                                <div class="col-xl-12">
                                    <form action="{{ route('operaciones.index') }}" method="get">
                                        <div class="form-row">
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="y/m/d" name="texto" value="{{ $texto }}">
                                            </div>
                                            <div class="col-auto">
                                                <input type="submit" class="btn btn-primary" name="Buscar">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

										<th>Id</th>
										<th>descripcion1</th>
										<th>fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operaciones as $operacione)
                                        <tr>
                                            
											<td>{{ $operacione->id }}</td>
											<td>{{ $operacione->descripcion1 }}</td>
											<td>{{ $operacione->fecha }}</td>

                                            <!--<td>
                                                <form action="{{ route('operaciones.destroy',$operacione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('operaciones.show',$operacione->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('operaciones.edit',$operacione->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>-->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $operaciones->links() !!}
            </div>
        </div>
    </div>
@endsection
