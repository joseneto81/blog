<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //permitir que estes atributos sejam setados em massa (mass assignable.), ou seja, setados todos de uma so vez
    protected $fillable = ['title', 'content'];

    //funcao para relacionar um POST a um COMENTARIO. Traz todos os COMENTARIOS de um POST
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    //relacionamento ManyToMany-> traz todas as tags de um POST
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'posts_tags'); //'posts_tags' -> tabela intermediaria do relacionamento ManyToMany
    }

    public function getTagListAttribute()
    {
        //atributo dinamico. As palavras 'get' e 'Attribute' sao obrigatorias. o que fica no meio é o atributo dinamico ($post->taglist)
        $tags = $this->tags()->lists('name')->all(); //traz um array com o nome de todas as tags
        return implode(', ', $tags);
    }
}
