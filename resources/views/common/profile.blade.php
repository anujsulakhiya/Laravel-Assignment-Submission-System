@extends('layouts.app')

@section('content')

    @if ($user->role_id == '1')

        <x-facultysidebar breadcumb="Profile" breadcumb1="" />

    @elseif ($user->role_id == '2')

        <x-studentsidebar studentbreadcumb="Profile " studentbreadcumb1="" />

    @endif


    <table class='table'>
        <thead class='thead-light'>
            <th>Manage {{$user->role}} Profile</th>
            <th></th>
        </thead>
        <tbody class=' table-bordered'>
            <tr>
                <th class='col-md-4'>Name</th>
                <td>{{ $user->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email}}</td>
            </tr>
        </tbody>
    </table>

        <a href="/updateprofile" class="btn btn-danger btn-sm mt-3">Update Profile</a>
        <a href="/changepassword" class="btn btn-secondary btn-sm mt-3">Change Password</a>
</div>

</div>
</div>
</div>
@endsection
