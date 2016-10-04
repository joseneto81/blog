    @extends("template")
    @section("content")

        <h1>Meu Blog</h1>
        @foreach($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{$post->content}}</p>
            </div>

            <p>
                <u>Tags:</u>
                @foreach($post->tags as $tag)
                    <u>{{ $tag->name."," }}</u>
                @endforeach
            </p>

            <div><h4>Coment&aacute;rios:</h4>
            @foreach($post->comments as $comment)
                <p><i>{{$comment->comment}} (Por: {{$comment->name}}) </i></p>
            @endforeach

            </div>
            <hr />
        @endforeach

    @endsection