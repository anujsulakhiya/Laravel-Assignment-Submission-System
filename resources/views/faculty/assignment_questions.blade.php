<section class="forms">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="h5"><a href="/my_assignment"
                                class=" fa fa-arrow-left mr-2 my_mainpage_link"></a>Assignment Details</h3>
                    </div>
                    {{-- {{ $Assignment_question }} --}}
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            @if (!empty($Assignment_question[0]->id))

                                <table class='table'>
                                    <thead>
                                        <th>S No.</th>
                                        <th>Questions</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        {{-- {{$batchdetail}} --}}
                                        <?php $i = 1; ?>
                                        @foreach ($Assignment_question as $question)
                                            <tr>
                                                <td>Q {{ $i }}</td>
                                                <td>{{ $question->questions }}</td>

                                                <td class=""><a href="/view_submission/{{ $question->id }}"
                                                        class="btn btn-sm btn-danger my_mainpage_link ">View</a></td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach

                                    </tbody>
                                </table>

                            @else
                                <div class="alert alert-warning">
                                    <strong></strong> No Question Created
                                    For this Assignment !

                                </div>

                            @endif

                        </div>
                        <br>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        set_my_ajax_link_in_mainpage();

    });

</script>
