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

<body style="background-color: #86E5FF;">
    <div class=" float-end me-3">
        <a href="/logout" class="btn btn-danger">Logout <i class="fas fa-arrow-right"></i></a>
    </div>

    <div class="ms-2 me-2 mt-5">
        <h2 class="text-center">Project Monitoring</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card border-0 mt-4">
            <div class="card-header"><a href="/createIndex" class="btn btn-primary"><i class="fas fa-plus"> Create Data</i></a>
                <div class="text-end">
                    <form action="/search" method="get">
                        <label for="search" class="form-label">search by project name :</label>
                        <input type="text" class="" id="search" name="search">
                        <span><button class="btn btn-sm"><i class="fas fa-search"></i></button></span>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-start">
                            <th>PROJECT NAME</th>
                            <th>CLIENT</th>
                            <th>PROJECT LEADER</th>
                            <th>START DATE</th>
                            <th>END DATE</th>
                            <th>PROGRESS</th>
                            <th>ACTION</th>

                        </thead>
                        <tbody class="text-start">

                            @foreach ($data as $dt)


                            <tr>
                                <td>{{$dt->project_name}}</td>
                                <td>{{$dt->client}}</td>
                                <td>

                                    <div class="row ">
                                        <div class="col ">
                                            <img class="rounded-circle" width="40px" height="40px" src="{{$dt->foto_leader}}" alt="">
                                        </div>

                                        <div class="col text-start" style="margin-left: -70px;">
                                            <div class="col">{{$dt->name_leader}}</div>
                                            <div class="col">{{$dt->email_leader}}</div>

                                        </div>

                                    </div>



                                </td>
                                <td>{{$dt->start_date}}</td>
                                <td>{{$dt->end_date}}</td>
                                <td>




                                    <div class="progress mt-1">
                                        <div class="progress-bar" style="width: {{ $dt->progress}}%;" role="progressbar" aria-valuenow="{{$dt->progress}}" aria-valuemin="0" aria-valuemax="100">


                                        </div>
                                    </div>
                                    <p class="fw-bold"> {{$dt->progress}}%</p>




                                </td>
                                <td>
                                    <a href="/editIndex/{{$dt->id}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="/delete/{{$dt->id}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row-1 text-end me-3 mt-2">
            <div class="col">
                Created by :
            </div>

            <div class="col">
                Nur Alimul Haq
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>





</html>