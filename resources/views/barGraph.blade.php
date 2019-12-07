@extends("adminLayout")

@section("title", "Graph of Data")

@section("contentTitle","Bar Graph Representation of Data")

@section("content")
  <div class="container">
    <h4>Please select a learning domain.</h4>
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          @foreach($active as $currentDomain)
            <li><a href="#" onclick="loadDomain({{$currentDomain->Domain_ID}})}">{{$currentDomain->Name}}</a></li>
          @endforeach

        </ul>
    </div>
  </div>
@endsection
