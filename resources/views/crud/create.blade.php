@extends('layouts.Crud_Lyout')
@section('title')
    Edit_page
@endsection
@section('main')
    <div class="card mt-4 container  col-sm-8">
     <form method="post" action="/store" class="p-2" enctype="multipart/form-data">
            <h2> <u>User-Register:</u></h2><br>
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                    value="{{ old('name') }}"/>
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Phone:</label>
                <input type="phone" class="form-control @error('phone')is-invalid @enderror"
                    name="phone"value="{{ old('phone') }}" />
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email:</label>
                <input type="email" class="form-control @error('email')is-invalid @enderror"
                    name="email"value="{{ old('phone') }}" />
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password:</label>
                <input type="password" class="form-control @error('password')is-invalid @enderror"
                    name="password"value="{{ old('password') }}" />
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Image:</label>
                <input type="file" class="form-control @error('image')is-invalid @enderror" name="image"
                    value="{{ old('image') }}" />
                <span class="text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <br>
            <div class="d-inline">
                <button class="btn btn-dark" type="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </form>
    </div>
    </div>
@endsection
