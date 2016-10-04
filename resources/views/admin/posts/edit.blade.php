    @extends("template")
    @section("content")

        <h1>Editar Post: "{{$post->title}}"</h1>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class='alert alert-block alert-warning'>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($post, ['route'=>['admin.posts.update', $post->id],'method'=>'put']) !!} <!-- fazer com que o form de edicao venha preenchido automaticamente -->

        @include("admin.posts._form")

        <div class='form-group'>
            {!! Form::label('tag','Tags:', ['class'=>'form-label']) !!}
            {!! Form::textarea('tags', $post->tagList, ['class'=>'form-control', 'rows'=>'1']) !!}
        </div>

        <div class='form-group'>
            <!--{!! Form::button('Voltar', ['class'=>'btn btn-primary']) !!}-->
            {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}
            <a href="{{route('admin.index')}}" class='btn btn-primary'>Voltar</a>
        </div>

        {!! Form::close() !!}

    @endsection