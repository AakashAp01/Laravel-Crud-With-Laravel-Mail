@extends('layouts.Crud_Lyout')
@section('title')
    Home_page
@endsection
@section('main')
    <div class="container">

        <div class="container mt-4">

            @if ($message = Session::get('success'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ $message }}<i class="bi bi-check-circle-fill"></i></strong>
                </div>
            @endif

        </div>
        <div class="float-end mt-3">
            <a href="/create" class="btn btn-success mt-2">Create-User <i class="bi bi-person-plus-fill"></i></a>
        </div><br>

        <h2 class=""> <u>User-Data:</u></h2>
        <table class="table table-striped mt-4  col-sm-8">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userdata as $user)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><a href="/{{ $user->id }}/see" class="text-dark"> {{ $user->name }}</a></td>

                        <td><img src="CrudImages/{{ $user->image }}" alt="" class="rounded-circle " width="50"
                                height="50">
                        </td>
                        <td class="text-center">
                            <a href="/{{ $user->id }}/edit" class="btn btn-info">Edit</a>
                            <a href="/{{ $user->id }}/delete" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

            {{ $userdata->links()}}

    </div>
@endsection
