@extends('layouts.app')

@section('content')
<x-facultysidebar breadcumb="Profile" breadcumb1="Update Profile" />


    <form action="updateuserprofile" method="POST" class="">
        @csrf
    <table class='table'>
        <thead class='thead-light'>
            <th>Manage {{ @$user->role}} Profile</th>
            <th></th>
        </thead>
        <tbody class=' table-bordered'>
            <tr>
                <th class='col-md-4'>Name</th>
                <td><input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ @$user->name}}" autocomplete="name"></td>
            </tr>
            <tr>
                <th>Email</th>
                <input type="hidden" name="email" value="{{ @$user->email}}">
                <td>{{ @$user->email}}</td>
            </tr>
        </tbody>
    </table>
    <button type="submit" name="nameupdate" class="btn btn-danger btn-sm mt-3">Update</button>
    </form>
</div>
</div>
</div>
</div>
@endsection
