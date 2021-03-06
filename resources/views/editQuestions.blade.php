@extends('adminLayout')

@section('contentTitle')
Edit Questions
@endsection

@section('content')
<div class="container">
    <h4>Please select a learning domain.</h4>
    <div class="btn-group">
      <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Active Domains
          </button>
          <div class="dropdown-menu">
              <div class="dropdown-header">Active Domains</div>
              @foreach($activeDomains as $currentDomain)
                <a class="dropdown-item" href="#" onclick="loadDomain({{$currentDomain->Domain_ID}})">{{$currentDomain->Name}}/{{$currentDomain->Abbr}}</a>
              @endforeach
          </div>
      </div>
      <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Inactive Domains
          </button>
          <div class="dropdown-menu">
              <div class="dropdown-header">Inctive Domains</div>
              @foreach($inactiveDomains as $currentDomain)
                <a class="dropdown-item" href="#" onclick="loadQuestions({{$currentDomain->Domain_ID}})">{{$currentDomain->Name}}/{{$currentDomain->Abbr}}</a>
              @endforeach
          </div>
      </div>
    </div>
</div>
@endsection
