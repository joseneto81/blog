    @extends("template")
    @section("content")

        <h1>Criar Novo Post</h1>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class='alert alert-block alert-warning'>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'admin.posts.store','method'=>'post']) !!}

        <!-- criar todo form em um arquivo separado e incluir em cada pagina -->
        @include("admin.posts._form")

        <div class='form-group'>
            {!! Form::label('tag','Tags:', ['class'=>'form-label']) !!}
            {!! Form::textarea('tags', null, ['class'=>'form-control', 'rows'=>'1']) !!}
        </div>

<!--
        <div class='form-group'>
            {!! Form::label('title','Título:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::label('content','Post:') !!}
            {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
        </div>
-->
        <div class='form-group'>
            <!--{!! Form::button('Voltar', ['class'=>'btn btn-primary']) !!}-->
            {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.index')}}" class='btn btn-primary'>Voltar</a>
        </div>

        {!! Form::close() !!}

    @endsection