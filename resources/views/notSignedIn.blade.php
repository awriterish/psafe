@extends('generalLayout')
@section('navbarPermission')
<body class="text-center">
    <img class="mb-4" src="https://www.hendrix.edu/uploadedImages/News/Graphic_Identity/Images/HENDRIX_COLLEGE_RGB%20w-control-01.png" alt="" height="172">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <p>You will be redirected to the Microsoft Outlook login page, please sign in with your Hendrix email and password.</p>
    <a href="/placeholderLogin  ">
    <button class="btn btn-lg btn-primary " width='150' href="/placeholderLogin">Sign in</button>
  </a>
  <a href="/survey">
  <button class="btn btn-lg btn-primary " width='150' href="/survey">Survey</button>
</a>
    <footer>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </footer>
</body>
<script>
$(document).ready(function(){
  $("#showTeacherName").css("visibility", "hidden");
  $("#signOut").css("visibility", "hidden");
});
</script>
@endsection
