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
    <div class="container mt-5">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif ($message = Session::get('failed'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Edit
                    </div>
                    <div class="col text-end">
                        <a href="/">Back to homes</a>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <form action="/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <label for="project_name" class="form-label mt-2">Project Name</label>
                    <input type="text" id="project_name" class="form-control" value="{{$data->project_name}}" name="project_name" required>
                    <label for="client" class="form-label mt-2">Client</label>
                    <input type="text" id="client" class="form-control" name="client" value="{{$data->client}}" required>
                    <label for="name_leader" class="form-label mt-2">Name Leader</label>
                    <input type="text" id="name_leader" class="form-control" name="name_leader" value="{{$data->name_leader}}" required>
                    <label for="email_leader" class="form-label mt-2">Email Leader</label>
                    <input type="email" id="email_leader" class="form-control" name="email_leader" value="{{$data->email_leader}}" required>
                    <label for="foto_leader" class="form-label mt-2">Foto Leader</label>
                    <input type="file" id="foto_leader" class="form-control" name="foto_leader">
                    <label for="start_date" class="form-label mt-2">Start Date</label>
                    <input type="date" id="start_date" class="form-control" name="start_date" value="{{$data->start_date}}" required>
                    <label for="end_date" class="form-label mt-2">End Date</label>
                    <input type="date" id="end_date" class="form-control" name="end_date" value="{{$data->end_date}}" required>
                    <label for="progress" class="form-label mt-2">Progress (%)</label>
                    <input type="number" max="100" min="0" id="progress" class="form-control" name="progress" value="{{$data->progress}}" required>

                    <input type="submit" class="btn btn-primary mt-3" value="Update Data">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>





</html>