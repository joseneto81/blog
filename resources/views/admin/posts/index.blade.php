    @extends("template")
    @section("content")

        <h1>Blog Admin</h1>

        <p><a href="{{ route('admin.posts.create') }}" class='btn btn-success'>Novo Post</a></p>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Ações</th>
            </tr>
            @foreach($posts AS $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', ['id'=>$post->id]) }}" class='btn btn-default'>Editar</a>
                    <a href="{{ route('admin.posts.delete', ['id'=>$post->id]) }}" class='btn btn-danger'>Excluir</a>
                </td>
            </tr>
            @endforeach
        </table>
        <!-- monta paginacao sem escapar os caracteres especiais -->
        {!! $posts->render() !!}
    @endsection