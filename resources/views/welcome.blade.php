<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  
</head>

<body>
    <div class="container" style="margin-top:100px;">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card shadow bg-white round p-5">
            <p>Welcome To Laravel 8 Admin Starter Template.</p>
            <a href="{{route('admin.login')}}" class="btn btn-primary">Login As Admin</a>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
