<script src="{{ asset('assets/js/app.js') }}" defer></script>

<script src="{{ asset('assets/js/fancyTable.js') }}" defer></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>


<!-- the jScrollPane script -->
{{-- <script type="text/javascript" src="{{ asset('assets/js/jquery.jscrollpane.min.js') }}"></script> --}}

<!-- the mousewheel plugin - optional to provide mousewheel support -->
<script type="text/javascript" src="{{ asset('assets/js/jquery.mousewheel.js') }}"></script>


<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>



<script>
    /*--------------------------  Faculty JS  --------------------------*/

    const CONTENT_WRAPPER = $('#mainpage');

    var last_loaded = null;
    var back_number = null;

    function set_my_ajax_link_listner() {
        $('.my_ajax_link').on('click', (e) => {
            e.preventDefault();
            const page_name = e.target.href;
            CONTENT_WRAPPER.load(page_name);
            localStorage.setItem("last_loaded", page_name);

        });
    }

    function set_my_ajax_link_in_mainpage() {
        $('.my_mainpage_link').on('click', (e) => {
            e.preventDefault();
            const page_name = e.target.href;
            CONTENT_WRAPPER.load(page_name);
            localStorage.setItem("last_loaded", page_name);
        });
    }

    function load_ajax_page(page_name = "/home_page") {

        page_name = localStorage.getItem("last_loaded");

        CONTENT_WRAPPER.load(page_name, () => {
            set_my_ajax_link_listner();
        });
    }

    function set_back_page() {

        var back = [];
        if (back_number == null) {
            back_number = 0;
        }
        back[back_number] = localStorage.getItem("last_loaded");
        localStorage.setItem("back", JSON.stringify(back));
        back_number = back_number + 1;
    }

    function go_back() {

        console.log(1);

        if (last_loaded == null) {
            load_ajax_page();
        } else {
            load_ajax_page(last_loaded);
        }
    }

    function serach_and_pagination() {

        // $(".search").fancyTable({

        //     sortColumn: 0,
        //     pagination: true,
        //     perPage: 2,
        //     searchable: false,
        //     globalSearch: true

        // });

        //S Search option for tables
        $(".search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".search_table tr").filter(function() {

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        
    }
    $(document).ready(function() {

        set_my_ajax_link_listner();

        if (window.location.search != '?m=join') {
            load_ajax_page();
        }

        set_back_page();

        $('.back').click(function() {
            go_back();
            return false;
        });


    });

    function post_request_with_file(element) {

        $.ajax({
            url: element.action,
            method: 'post',
            data: fileData,
            data: $(element).serialize(),
            beforeSend: function() {
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
            },
            success: (response) => {
                console.log(1);
                $("#mainpage").html(response);
            },
            error: (data) => {
                console.log(data);
                alert('Error From Server\nTry again after sometime');
            }
        });
        return false;
    }

    function post_request(element) {

        $.ajax({
            url: element.action,
            method: 'post',
            data: $(element).serialize(),
            beforeSend: function() {
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
            },
            success: (response) => {
                console.log(1);
                $("#mainpage").html(response);
            },
            error: (data) => {
                console.log(data);
                alert(console.log(data));
            }
        });
        return false;
    }

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('.nav a').click(function() {
        if (window.innerWidth < 550) {
            $("#wrapper").toggleClass("toggled");
        }
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

    function delete_Row(row) {
        var i = row.parentNode.parentNode.rowIndex;
        if (i > 1) {
            document.getElementById('createassignment').delete_Row(i);
        }
    }

    function NewRow(e) {

        e = e || window.event;

        if (e.keyCode == 9) {
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
            '<button class="btn" type="button" onclick="delete_Row(this)"><i class="fa fa-window-close" aria-hidden="true"></i> ' +
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


    $('#createbatchid').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 9) {
            e.preventDefault();
            return false;
        }
    });

</script>
