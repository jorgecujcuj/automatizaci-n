<div class="box box-info padding-1">
    <div class="box-body">
    <div class="form-group">
            {{ Form::label('idTablero') }}
            <select class="form-control" name="idtablero">
                   <option value=""selected disabled> - Selecciona un id - </option>
                    @foreach ($tableros as $tablero)
                    <option value="{{ $tablero->id }}" {{$tablero->id == $img->idtablero ? 'selected' : ''}} >{{ $tablero->descripcion }}</option>
                    @endforeach
            </select>
            @error('idsolicitud')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="grid grid-cols-1 mt-5 mx-7">
            <img id="imagenSeleccionada" style="max-heiht: 25px;">
        </div>
        <div class="form-group">
            <label for="form-control">Seleccione una imagen:
            <input type="file" class="form-control @error('img') is-invalid @enderror hidden" 
            name="img" id="img" value="{{ $img->img }}"
             >
            @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </label>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
   $(document).ready(function (e) {
       $('#img').change(function(){
           let reader = new FileReader();
           reader.onload = (e) =>{
               $('#imagenSeleccionada').attr('src',e.target.result);
           }
           reader.readAsDataURL(this.files[0]);
       });      
   });
</script>
@endsection