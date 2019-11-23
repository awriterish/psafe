<!DOCTYPE html>
<html>
    <head>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/82e12c1aac.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lato|Yantramanav:700&display=swap" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
      <title>@yield('title', 'Hendrix - Learning Domain Report')</title>
     </head>
    <body>
      <div class="header">
      <img src=" https://www.hendrix.edu/uploadedImages/News/Graphic_Identity/Images/HDX_COLLEGE_HZ_K%20w-control-01.png
        " width='150'class="css-class" alt="alt text">
        @yield('header')
        <button id="signOut" onClick=href="/testPage" style="vertical-align:middle">Sign Out</button>
      </div>
		@yield('content')

		<h2>LAYOUT CONTENT GOES HERE</h2>
    <p>
      return <a href="/">home<i class="fab fa-accessible-icon"></i></a>
    </p>
    </body>
</html>
