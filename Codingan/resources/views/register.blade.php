<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Mentoring</title>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-info">
    <div class="container">
        <div class="card mx-auto" style="width: 25rem; margin-top:10%;">
            <h2 class="mx-auto mt-2">REGISTER</h2>

            <div class="card-body ">

                @if ($message = Session::get('failed'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="/register" method="post">
                    @csrf
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                    <label for="email" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>

                    <div class="d-grid gap-2 d-md-block text-center mt-3">
                        <input type="submit" class="btn btn-primary col-10" value="Login">

                    </div>
                </form>
                <p href="" class="float-end mt-2">Already Have Account? <a href="/loginIndex">Login</a> </p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>





</html>