<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Import web fonts using the link tag instead of CSS @import -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

    <!-- Icons from http://fontawesome.io/ -->
    <link href="//use.fontawesome.com/releases/v5.0.10/css/all.css" rel="stylesheet"/>

    <style>
        body {
            padding-top: 60px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 text-center">
            <h1>Admin Panel - Login</h1>
            <form id="form-login" action="/auth/login" method="post">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><i class="fa fa-paper-plane"></i> Login</button>
                </div>
            </form>
        </div>
    </div>

</div><!-- /.container -->

<?php require_once 'partials/footer.php' ?>
