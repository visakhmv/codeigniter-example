<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />

  </head>

  <body class="container-fluid">
    <form class="col-sm-4 card" method="post" >
        <div class="card-body">
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </div>
    </form>
  </body>
    <style>
        form{
            margin:50px auto;
            text-align:center;
        }
    </style>
</html>
