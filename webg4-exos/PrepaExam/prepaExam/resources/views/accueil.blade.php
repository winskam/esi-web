@extends('canvas')
@section('content')
<h1>Students</h1>
<select id="selectStudent">
    @foreach ($students as $student)
    <option value="{{$student->id}}">{{$student->name}} - {{$student->credits}} crédits</option>
    @endforeach
</select>

<table id="details">
    <thead>
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Credits</td>
    </tr>
    </thead>
    <tbody id="detail">
    </tbody>
</table>

<script src="{{ asset('js/accueil.js') }}"></script>

@endsection