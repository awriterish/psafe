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
                <button type="button" class="d-flex align-items-center text-muted btn btn-link" data-toggle="modal" data-target="#FAQ">
                  <span data-feather="help-circle"></span>
                </button>
            </h6>
            <ul class="nav flex-column mb-2" id="teacherNav">
              <!-- SURVEY NAMES GO HERE !! :D -->
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Completed Surveys</span>
              <button type="button" class="d-flex align-items-center text-muted btn btn-link" data-toggle="modal" data-target="#FAQ">
                <span data-feather="help-circle"></span>
              </button>
            </h6>
            <ul class="nav flex-column mb-2"id="teacherNavCompleted">
            <!-- COMPLETED SURVEY NAMES GO HERE !! :D -->
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield('contentTitle')</h1>

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

    <!--modal-->
    <div class="modal fade" id="FAQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">FAQ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Q: How do I make sure I have successfully submitted my surveys?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: What if I submitted incorrect/incomplete information?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: Why is it not letting me submit my class survey?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: What if I have multiple classes?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: What if my class has multiple professors?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: What if my class has multiple learning domains?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: What if I need to edit one of my surveys?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: Are there any helpful tools for professors?</h6>
        A: iunno
        <p><!--whitespace--></p>
        <h6>Q: What do I do if this help page does not solve my problem?</h6>
        A: iunno
        <p><!--whitespace--></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
