function loadTable() {
    //$(`#detail`).empty();
    $(`.ligne`).remove();
    $id = $("#selectStudent").val();
    $.get("/pae/student/" + $id, function(jsData, status) {
        for (i = 0; i < jsData.length; i++) {     
            $(`#detail`).append(`<tr class="ligne" id=${jsData[i]["id"]}><td>` + jsData[i]["id"] + "</td><td>" + jsData[i]["title"] + "</td><td>" + jsData[i]["credits"] + "</td></tr>");
        }
        $(document).on('click', 'tr', function() {
            deleteDetail($id, $(this).attr('id'));
        })
    })
}

function deleteDetail($id, $course) {
    $.post(`/pae/student/${$id}/${$course}`,
    { id: $id,course: $course },
    function(data, status) { $(`#${$course}`).remove();})
    reloadSelect();
}

function reloadSelect() {
    //$id = $("#selectStudent").val();
    $.get("/pae/students", function(jsData, status) {
        $(`#selectStudent option`).remove();
        for (i = 0; i < jsData.length; i++) {   
            $(`#selectStudent`).append(`<option value=${jsData[i]["id"]}>` + jsData[i]["name"] + " - " + jsData[i]["credits"] + " crédits</option>");
        }
    })
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    loadTable();
    $("#selectStudent").change(function() {
        loadTable();
    })
})
