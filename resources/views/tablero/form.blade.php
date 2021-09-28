<body onload="initialize()">
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $tablero->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
   <!--     <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $tablero->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
-->
        <div class="form-group">
            <label for="form-control">
            <input type="text" class="form-control @error('estado') is-invalid @enderror" 
            name="estado" id="e" value="{{ $tablero->estado }}"
            style="color:white; border: 0;" >
            @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>


    </div>
    <div class="box-footer mt20">
        <a class="btn text-light bg-info float-right" style="font-weight: bold;" href="{{ route('tableros.index') }}">Cancelar</a>
        <button type="submit" id="b" style="font-weight: bold;" class="btn text-white">Off</button>
    </div>
</div>

@section('js')
<script type="text/javascript">
    function initialize() {
        var estado = $('#e').val().split(' ').join('');
        var uno = document.getElementById('b');
        if(estado == 0){
            $("#e").val('1');
            uno.innerHTML = 'Off';
            $("#b").css("background-color", "#FF0000");
        }else if(estado == 1){
            $("#e").val('0'); 
            uno.innerHTML = 'On';
            $("#b").css("background-color", "#16EA00");
        }    
    } 
</script>
@endsection