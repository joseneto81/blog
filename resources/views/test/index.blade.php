	@extends('template')
	
	@section('title')
		Título
	@stop
	
	@section('content')
		 
		<h1>Olá Mundo! <?=$nome?></h1>
		<h1>{{$nome}}</h1>
	@stop
