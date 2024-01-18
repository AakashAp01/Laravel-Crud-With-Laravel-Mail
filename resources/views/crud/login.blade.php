<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Log-in page</title>
</head>

<body>
    <div class="container">

        <div class="container mt-5 w-50 rounded" style="background-color:rgb(167, 167, 244);">

            <form action="{{ route('login.auth') }}" method="post" class="mt-4 p-4">
                <h3 class="mb-4 pt-4 text-dark">User Log-In</h3>
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control  @error('email')is-invalid @enderror" id="floatingInput"
                        name="email" placeholder="">
                    <label for="floatingInput">User Email</label>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>

                </div>
                <div class="form-floating">
                    <input type="password" id="pass" class="form-control @error('password')is-invalid @enderror"
                        id="floatingPassword" name="password" placeholder="">
                    <label for="floatingPassword">Password</label>
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button class="btn btn-primary mt-4" class="" type="submit">Login Here</button>
            </form>
        </div>
    </div>
    <script></script>
</body>

</html>
