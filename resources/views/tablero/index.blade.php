@extends('layouts.app')

@section('template_title')
    Tablero
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tablero') }}
                            </span>
                            <!--
                             <div class="float-right">
                                <a href="{{ route('tableros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                            -->
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
                            <p class="fw-bold" style="font-weight: bold;">Estado 0 = Apagado</p>
                            <p class="fw-bold" style="font-weight: bold;">Estado 1 = Encendido</p>
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Descripcion</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tableros as $tablero)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $tablero->descripcion }}</td>
											<td>{{ $tablero->estado }}</td>

                                            <td>
                                                <form action="{{ route('tableros.destroy',$tablero->id) }}" method="POST">
                                                   <!-- <a class="btn btn-sm btn-primary " href="{{ route('tableros.show',$tablero->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a> -->
                                                    <a class="btn btn-sm text-light bg-info" href="{{ route('tableros.edit',$tablero->id) }}"><i class="fa fa-fw fa-edit"></i>On/Off</a>
                                                    @csrf
                                                    @method('DELETE')
                                                <!--    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button> -->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tableros->links() !!}
            </div>
        </div>
    </div>
@endsection
