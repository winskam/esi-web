@extends('canvas')
@section('content')

<form action="chat" method="POST">
    <input name="login" type="text">
    <select name="channel" id="id"></select>
    <button type="submit">Soumettre</button>
</form>

<script>
    $(document).ready(function() {
        $.get("api/channels", function(jsData, status) {
            for (i = 0; i < jsData.length; i++) {
                $(`#id`).append(`<option value=${jsData[i]["id"]}>` + jsData[i]["name"] + "</option>");

            }
        })
    })
</script>

@endsection