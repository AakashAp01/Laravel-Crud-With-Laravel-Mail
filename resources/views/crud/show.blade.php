@extends('layouts.Crud_Lyout')
@section('title')
    Show_page
@endsection
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-3 m-4">
                <div class="card p-4">
                    <h2 class="text-center"><u>Details</u></h2>
                    <span ><i class="bi bi-caret-right-fill"></i>User Name: <b class="text-danger">{{ $see->name }}</b></span><br>
                    <span><i class="bi bi-caret-right-fill"></i>User Phone: <b class="text-danger">{{ $see->phone }}</b></span><br>
                    <span><i class="bi bi-caret-right-fill"></i>User Email: <b class="text-danger">{{ $see->email }}</b></span><br>
                    <p> <i class="bi bi-caret-right-fill"></i>Profile Image: <br><br>
                        <img src="/CrudImages/{{ $see->image }}" alt="" height="220" width="170"
                            style= "margin-left:20px;">
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
