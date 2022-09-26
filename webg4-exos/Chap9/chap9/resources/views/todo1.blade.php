@extends('canevas')
@section('content')
@foreach ($todo as $id)
<h1>Tâche : {{$id->name}}</h1>
<p>{{$id->description}}</p>
<p><a href="/todos">Retour à la liste</a></p>
@endforeach

@endsection