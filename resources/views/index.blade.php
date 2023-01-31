
<!-- 12. use these for use the main parts here -->
@extends('layouts.user_layout')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-12 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <h4 class="card-title text-center">All Users</h4>
                <a  class="btn btn-success" href="registration.html">Registration</a>
                <hr>
                {{-- 16. include for flash message show --}}
                @include('flash-message')
                <table class="table table-bordered mt-4">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Contact</td>
                        <td>Gender</td>
                        <td>Hobbies</td>
                        <td>Address</td>
                        <td>Country</td>
                        <td>Profile</td>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
