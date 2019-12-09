@extends('generalLayout')

@section('navbarPermission')
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul id= "navbar" class="nav flex-column">
<!--              @yield('navbar','NAVBAR GOES HERE')  -->

            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Current Surveys</span>
              <a class="d-flex align-items-center text-muted" href="/teacherHelp">
                <span data-feather="help-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2" id="teacherNav">
              <!-- SURVEY NAMES GO HERE !! :D -->
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield('contentTitle')</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>
          @yield('content','CONTENT GOES HERE c:')
        </main>
      </div>

      <style>
      #teacherNav{ cursor: pointer;}
      </style>
    </div>

    <script>
      $(document).ready(function(){
        //TODO This should return them to the "select a survey" page, right now it is hardcoded to a specific teacher as an example
        $("#icon").attr("href", "/survey/85");
      });
    </script>
@endsection
