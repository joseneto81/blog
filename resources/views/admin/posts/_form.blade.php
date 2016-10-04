

    <div class='form-group'>
        {!! Form::label('title','Título:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('content','Post:') !!}
        {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
    </div>

<!--
    <div class='form-group'>
        {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.index')}}" class='btn btn-primary'>Voltar</a>
    </div>
-->