/* ------------------------  Faculty JS  -------------------------------*/


$(document).ready(function() {


    $("#dashboard").on("click", function() {

        $("#mainpage").load("/home");
    });

    $("#profile").on("click", function() {

        $("#mainpage").load("/profile");
    });

    $("#dashboard").on("click", function() {

        $("#mainpage").load("/home");
    });

    $("#dashboard").on("click", function() {

        $("#mainpage").load("/home");
    });

    $("#dashboard").on("click", function() {

        $("#mainpage").load("/home");
    });

    $("#dashboard").on("click", function() {

        $("#mainpage").load("/home");
    });

    //For batch name search option in dropdown
    $("#sel1").select2();
});

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

function myFunction() {

    var copyText = document.getElementById("myInput");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Copied the Link: " + copyText.value);
}

$(document).ready(function() {

    // Initialize select2


});


//table js for appending and deleting new tr in table for enrollment field
function deleteRow(row) {
    var i = row.parentNode.parentNode.rowIndex;
    if (i > 1) {
        document.getElementById('createbatchtable').deleteRow(i);
    }
}

function NewRow(e) {

    e = e || window.event;

    if (e.keyCode == 13) {
        insRow();
    }
}

function insRow() {

    var x = document.getElementById('createbatchtable');
    var y = document.getElementById('batchdetails');

    var len = x.rows.length;
    var new_row = x.rows[len - 1].cloneNode(true);

    new_row.cells[0].innerHTML =
        '<button class="btn" type="button" onclick="deleteRow(this)"><i class="fa fa-window-close" aria-hidden="true"></i> ' +
        len + '</button>'; //auto increment the srno

    new_row.cells[1].getElementsByTagName('input')[0].value = "";
    new_row.cells[2].getElementsByTagName('input')[0].value = "";

    y.appendChild(new_row);
    new_row.cells[1].getElementsByTagName('input')[0].focus();

}

function nextItem(e) {

    e = e || window.event;

    if (e.keyCode == 13) {
        insRow();
    }
}

$("#accept").click(function(event) {
    //
    event.preventDefault();

    let id = $("input[name=submission_id]").val();

    // alert($("input[name=submission_id]").val());
    $.ajax({
        url: "/accept",
        type: "POST",
        data: {
            id: id
        },
        success: function(response) {
            console.log(response);
            if (response) {
                $('.success').text(response.success);
                $("#status")[0].reload();
            }
        },
    });
});