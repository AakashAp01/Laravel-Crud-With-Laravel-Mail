@extends('layouts.Crud_Lyout')
@section('title')
auth-info
@endsection
@section('main')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-sm-4 m-4">
                <div class="card p-2 d-flex justify-content-center border border-dark" style= "font-size:18px; background-color: rgb(199, 223, 231);">
                     <h2 class="text-center"><u>User-Profile</u></h2><br>
                    <span><i class="bi bi-caret-right-fill "></i>Your Name: <b class="text-danger">{{ $authdata->name }}</b></span><br>
                    <span><i class="bi bi-caret-right-fill"></i>Your Phone: <b class="text-danger">{{ $authdata->phone }}</b></span><br>
                    <span><i class="bi bi-caret-right-fill"></i>Your Email: <b class="text-danger">{{ $authdata->email }}</b></span><br>
                    <p class="text-center text-danger"><b>Your Image </b> <br><br>
                        <img src="/CrudImages/{{ $authdata->image }}" alt="" height="180" width="170"
                            style= "border:5px solid black"  class="rounded-circle ">
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
