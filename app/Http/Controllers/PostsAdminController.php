<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Tag;
//use App\Http\Requests\Request;
//use App\Http\Controllers\Controller;

class PostsAdminController extends Controller
{
    private $post;

    public function __construct(POST $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        //*$posts = $this->post->all(); //trazer todos os posts de uma so vez
        $posts = $this->post->paginate(5); //traz os posts paginando

        return view('admin.posts.index', compact('posts'));
        //return "oi";
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {

        //dd($request->all()); //exibe os dados do post
        /*** codigo substituido pela function

        $tags = array_filter(array_map('trim',explode(',', $request->tags))); //array_map->passa o trim e todas as posicoes // array_filter->deixa apenas as posicoes com dados
        //criar novas tags no banco, caso nao existam, e devolver o id
        $tagsIds = [];
        foreach($tags as $tagName)
        {
            $tagsIds[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }
        ***/

        //dd($tagsIds); //exibe os dados do post

        //grava os dados no banco
        $post = $this->post->create($request->all());

        $post->tags()->sync($this->TagListSync($request->tags)); //sincronizar as tags na tabela intermediaria(se nao existir ela cria; se a tag foi retirada do post ela tbm retira da tabela; e se existir nao faz nada)
        //***$post->tags()->sync($tagsIds); //sincronizar as tags na tabela intermediaria(se nao existir ela cria; se a tag foi retirada do post ela tbm retira da tabela; e se existir nao faz nada)

        //redirecionar para rota
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit',compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $this->post->find($id)->update($request->all());

        $post = $this->post->find($id); //encontrar o post novamente antes de gravar
        $post->tags()->sync($this->TagListSync($request->tags));

        return redirect()->route('admin.index');
    }

    public function delete($id)
    {
        $this->post->find($id)->delete() ;
        return redirect()->route('admin.index');
    }

    private function TagListSync($tags)
    {
        $taglist = array_filter(array_map('trim',explode(',', $tags))); //array_map->passa o trim e todas as posicoes // array_filter->deixa apenas as posicoes com dados
        //criar novas tags no banco, caso nao existam, e devolver o id
        $tagsIds = [];
        foreach($taglist as $tagName)
        {
            $tagsIds[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }
        return $tagsIds;

    }

}