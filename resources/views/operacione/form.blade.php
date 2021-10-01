<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idcatalogo') }}
            {{ Form::text('idcatalogo', $operacione->idcatalogo, ['class' => 'form-control' . ($errors->has('idcatalogo') ? ' is-invalid' : ''), 'placeholder' => 'Idcatalogo']) }}
            {!! $errors->first('idcatalogo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idtablero') }}
            {{ Form::text('idtablero', $operacione->idtablero, ['class' => 'form-control' . ($errors->has('idtablero') ? ' is-invalid' : ''), 'placeholder' => 'Idtablero']) }}
            {!! $errors->first('idtablero', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('iduser') }}
            {{ Form::text('iduser', $operacione->iduser, ['class' => 'form-control' . ($errors->has('iduser') ? ' is-invalid' : ''), 'placeholder' => 'Iduser']) }}
            {!! $errors->first('iduser', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>