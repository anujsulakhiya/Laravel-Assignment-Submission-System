@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="Enroll Student" breadcumb1="Create New Batch" />

    <form class="" action="createbatch" method="POST">
        @csrf
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text font-weight-bold">Class Name</span></div>
                <input type="text" class="form-control @error('batch_name') is-invalid @enderror" id="batch_name"  name="batch_name" value="" >
                @error('batch_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="hidden" name="email" value="{{ $user->email}}">
        </div>

        <div style="overflow:auto; max-height:400px;">
        <table id="batch_table" class='table'>
            <thead class='thead-light'>
                <tr>
                    <th>Enrollment</th>
                    <th></th>

                </tr>
            </thead>
            <tbody id="batch_table_body"  class='table-bordered'>
                <?php $i=1;$j=2; while($i < 10){ ?>
                <tr>
                    <td scope='col'>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?php echo $i;?></span></div>
                                <input type="text" class="form-control" id="2" name="batch_student_enrollment[]">

                        </div>
                    </td>
                    <td scope='col'>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?php echo $j;?></span></div>
                                <input type="text" class="form-control" id="2" name="batch_student_enrollment[]">

                        </div>
                    </td>
                </tr>
                <?php $i=$i+2 ; $j=$j+2 ; }?>

            </tbody>

        </table>
        </div>
        <button type="submit" name="nameupdate" class="btn btn-danger btn-sm">Create New Class</button>
        <button type="button" onclick="add_batch_enrollment_field()" class="btn btn-sm btn-danger">Add Enrollemnt Field</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">Back</a>
    </form>
</div>

</div>
</div>
</div>
@endsection
