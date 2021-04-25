<script src="{{ asset('assets/js/app.js') }}" defer></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>
    /* ------------------------  Faculty JS  -------------------------------*/

    const CONTENT_WRAPPER = $('#mainpage');

    var last_loaded = null;

    function set_my_ajax_link_listner() {
        $('.my_ajax_link').on('click', (e) => {
            e.preventDefault();
            const page_name = e.target.href;
            CONTENT_WRAPPER.load(page_name);
            localStorage.setItem("last_loaded", page_name);
            // alert(localStorage.getItem("last_loaded"));
            // load_ajax_page(page_name);
            // last_loaded = page_name;
            //  console.log(last_loaded);
        });
    }

    function set_my_ajax_link_in_mainpage() {
        $('.my_mainpage_link').on('click', (e) => {
            e.preventDefault();
            const page_name = e.target.href;
            CONTENT_WRAPPER.load(page_name);
            localStorage.setItem("last_loaded", page_name);
            // load_ajax_page(page_name);
            // last_loaded = page_name;
            //  console.log(last_loaded);
        });
    }

    function load_ajax_page(page_name = "/home_page") {

        page_name = localStorage.getItem("last_loaded");
        CONTENT_WRAPPER.load(page_name, () => {
            set_my_ajax_link_listner();
        });
    }

    function go_back() {
        console.log(1);
        if (last_loaded == null) {
            load_ajax_page();
        } else {
            load_ajax_page(last_loaded);
        }
    }



    $(document).ready(function() {

        set_my_ajax_link_listner();

        if (window.location.search != '?m=join') {
            load_ajax_page();
        }

        $.get(
            "approvestudent",
            function(data) {
                CONTENT_WRAPPER.html(data);
            }
        );


        // $("#dashboard").on("click", function() {

        //     $("#mainpage").load("/dashboard");
        // });

        //For batch name search option in dropdown
        $("#sel1").select2();

    });

    function post_request(element) {

        $.ajax({
            url: element.action,
            method: 'post',
            data: $(element).serialize(),
            success: (response) => {
                console.log(1);
                $("#mainpage").html(response);
            },
            error: () => {
                alert('Error From Server\nTry again after sometime');
            }
        });
        return false;
    }

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

    //table js for appending and deleting new tr in table for enrollment field
    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;
        if (i > 1) {
            document.getElementById('createbatchtable').deleteRow(i);
        }
    }

    function delete_question(row) {
        var i = row.parentNode.parentNode.rowIndex;
        if (i > 1) {
            document.getElementById('createassignment').deleteRow(i);
        }
    }

    function NewRow(e) {

        e = e || window.event;

        if (e.keyCode == 9) {
            insRow();
        }
    }

    function insRow_for_question_new(e) {

        e = e || window.event;

        if (e.keyCode == 9) {
            insRow_for_question();
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

        if (e.keyCode == 9) {
            insRow();
        }
    }


    function insRow_for_question() {

        var x = document.getElementById('createassignment');
        var y = document.getElementById('createnewassignmentbody');

        var len = x.rows.length;
        var new_row = x.rows[len - 1].cloneNode(true);

        new_row.cells[0].innerHTML =
            '<button class="btn" type="button" onclick="deleteRow(this)"><i class="fa fa-window-close" aria-hidden="true"></i> ' +
            len + '</button>'; //auto increment the srno

        new_row.cells[1].getElementsByTagName('textarea')[0].value = "";

        y.appendChild(new_row);
        new_row.cells[1].getElementsByTagName('textarea')[0].focus();

    }

    function insRow_for_question_new(e) {

        e = e || window.event;

        if (e.keyCode == 9) {
            insRow_for_question();
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

    $('#updateprofile').click(function(event) {

    });

    $('#createbatchid').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 9) {
            e.preventDefault();
            return false;
        }
    });

    $("#btnSubmit").submit(function(e) {

        e.preventDefault();

        var table = document.getElementById("createbatchtable");
        var varCount = table.rows.length;

        var batch_name = document.getElementById("batch_name").value;

        var name = "";
        var enrollment = "";

        for (var i = 1; i < varCount; i++) {

            row = table.rows[i];

            name += "," + $(row.cells[1]).find("input").val();
            enrollment += "," + $(row.cells[2]).find("input").val();

        }

        var fd = new FormData();
        fd.append('batch_name', batch_name);
        fd.append('name', name);
        fd.append('enrollment', enrollment);


        $.ajax({
            url: '/create_batch',
            method: 'post',
            data: fd,
            success: (response) => {
                console.log(1);
                $("#mainpage").html(response);
            },
            error: () => {
                alert('Error From Server\nTry again after sometime');
            }
        });
        return false;
    });

</script>
