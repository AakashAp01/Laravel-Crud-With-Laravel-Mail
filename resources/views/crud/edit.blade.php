@extends('layouts.Crud_Lyout')
@section('title')
Edit_page
@endsection
@section('main')

    <div class="container mt-4 col-sm-8">
        <div class="container mt-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ $message }}<i class="bi bi-check-circle-fill"></i></strong>
                </div>
            @endif
        </div>
        <h1>Edit-User:</h1>

        <div class="card mt-2">
            <form method="POST" action="/{{$edit->id}}/update" class="p-4" enctype="multipart/form-data">
                <h4 class="">User Name: <span class="text-success"><u>{{$edit->name}}</span></h4>

                @csrf
                @method('PUT')

                <div class="mb-3 ">
                    <label for="" class="form-label">Name:</label>
                    <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" value="{{old('name',$edit->name)}}" />
                <span class="text-danger">
                    @error('name')
                    {{$message}}  @enderror
                </span>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Phone:</label>
                    <input type="phone" class="form-control @error('phone')is-invalid @enderror" alt="No Image" name="phone"value="{{old('phone',$edit->phone)}}" />
                    <span class="text-danger">
                        @error('phone')
                        {{$message}}  @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Email:</label>
                    <input type="email" class="form-control @error('email')is-invalid @enderror"
                        name="email"value="{{ old('email',$edit->email) }}" />
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


                <div class="mb-3">
                    <label for="" class="form-label">Password:</label>
                    <input type="password" class="form-control @error('password')is-invalid @enderror" name="password"value="" />
                    <span class="text-danger">
                        @error('password')
                        {{$message}}  @enderror
                    </span>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Image:</label>
                    <input type="file" class="form-control @error('image')is-invalid @enderror" name="image" value="" />
                    <span class="text-danger">
                        @error('image')
                        {{$message}}  @enderror
                    </span>
                </div>
                <br>

                <div class="d-inline">
                <button class="btn btn-dark" type="submit">Edit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
            </form>
        </div>
    </div>

@endsection
