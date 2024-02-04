<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
</head>
<style>
    .navdrop {
        border: 2px solid rgb(255, 255, 255);
        border-radius: 5px;
    }
</style>

<?php
$authdata=Auth::guard('crud')->user()
?>
<body class="">
    <nav class="navbar navbar-expand-lg bg-dark p-3">
        <div class="container-fluid">
            <div class="ms-5"> <a class="navbar-brand  d-inline text-danger fw-bold" href="/dashboard"><i
                        class="bi bi-emoji-sunglasses-fill"></i> Laravel Crud </a>

                        <img style="border: 3px solid rgb(255, 255, 255)" src="/CrudImages/{{ $authdata->image }}" alt="" height="40" width="40"
                        class="rounded-circle"> <span class="text-white"><b>@_{{ $authdata->name }}</b></span>

                    </div>

            <div class="conatiner">
                {{-- <a href="{{route('mail')}}" class="btn btn-light">Send-mail</a> --}}
                <a href="{{ route('partnerindex') }}" class="btn btn-warning" style="margin-right: 40px">Partners <i class="bi bi-people"></i></a>
                <div class="  dropdown md-4 me-5 btn-group dropstart border border-danger">
                    <button type="button" class="btn  text-light text-bold " data-bs-toggle="dropdown">
                        <h5 class="d-inline text-danger"><i class="bi bi-list"></i></h5>
                    </button>
                    <ul class="dropdown-menu bg-dark navdrop">

                        <li><a class="dropdown-item text-primary btn btn-outline-warning "
                                href="{{ route('crud.authinfo') }}">Pofile<i class="bi bi-person"></i></a></li>
                        <li><a class="dropdown-item text-danger btn btn-outline-danger "
                                href="{{ route('crud.logout') }}">Log Out <i class="bi bi-box-arrow-in-left"></i></a>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </nav>

<div style="">
    @yield('main')

</div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @stack('scripts')
</body>

</html>
