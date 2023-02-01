
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
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- 3. show users data -->
                        @forelse($users as $user)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->hobbies }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->getCountry->name }}</td>
                        <td>
                        <!-- 7. set route() for action buttons -->
                             <a href="{{ route('crud.show',['crud' => $user->id]) }}"><i class="fa-solid fa-eye"></i></a>

                            <a class="mx-2" href="{{ route('crud.edit',['crud' => $user->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                            <a href="{{ route('crud.destroy',['crud' => $user->id]) }}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No Data Found</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
