@extends('generalLayout')

@section('navbarPermission')
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Options</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="settings"></span>
              </a>
            </h6>
            <ul id= "navbar" class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="/editQuestions">
                  <span data-feather="pen-tool"></span>
                  Edit Questions
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/editDomains">
                  <span data-feather="pen-tool"></span>
                  Edit Domains
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  ETC
                </a>
              </li>

            </ul>
<!--This part could be populated with the years of reports

  same idea as teacherLayout

  loop(given list of years for completed surveys)
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file-text"></span>
      INSERT YEAR HERE
    </a>
  </li>
  end loop
-->
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="search"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              @yield('completedReports')
              <li class="nav-item">
                <a class="nav-link" href="/viewReport">
                  <span data-feather="file-text"></span>
                  View All Reports
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield('contentTitle','CONTENTTITLE GOES HERE c:')</h1>
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
    </div>
@endsection
