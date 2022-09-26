@extends('canevas')
@section('content')
<h1>À faire...</h1>
<ul>
    @foreach ($todos as $todo)
    <li><a href="/todos/{{$todo->id}}">{{$todo->name}}</a></li>
    @endforeach
    <ul>
        @endsection