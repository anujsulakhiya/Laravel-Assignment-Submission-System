<script src="{{ asset('assets/js/app.js') }}" defer></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>
    /* ------------------------  Faculty JS  -------------------------------*/


    $(document).ready(function() {


        function view_page() {

        }
        $("#dashboard").on("click", function() {

            $("#mainpage").load("/dashboard");
        });

        $("#profile").on("click", function() {

            $("#mainpage").load("/profile");
        });

        $("#createbatch").on("click", function() {

            $("#mainpage").load("/createbatch");
        });

        $("#enrollstudent").on("click", function() {

            $("#mainpage").load("/enrollstudent");
        });

        //For batch name search option in dropdown
        $("#sel1").select2();

    });

    function set_my_ajax_link_listner() {
        $('.my_ajax_link').on('click', (e) => {
            e.preventDefault();
            const page_name = e.target.href;
            load_ajax_page(page_name);
            last_loaded = page_name;
            //  console.log(last_loaded);
        });
    }

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
