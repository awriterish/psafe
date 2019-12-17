<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>@yield('title', 'Hendrix - Learning Domain Report')</title>

    <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="/stylesheets/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
<a id="icon">
  <img src="https://www.hendrix.edu/uploadedImages/News/Graphic_Identity/Images/HDX_COLLEGE_HZ_W%20158%20shield%20w-control-01.png" width='150'>
</a>

<ul class="navbar-nav px-3 ml-auto mr-3 float-right">
  <li class="nav-item text-nowrap">

    <a class="nav-link" id="showTeacherName">Welcome, @yield('teacherName')</a>
  </li>
</ul>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <!--TODO this will remove cookies-->
          <a class="nav-link" href="/" id="signOut">Sign out</a>
        </li>
      </ul>
    </nav>
@yield('navbarPermission')

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>
