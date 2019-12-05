@extends('teacherLayout')

@section('contentTitle')
(GET CLASS NAME) Learning Domain Assessment
@endsection

@section('navbar')

@endsection

@section('content')
<!--
these will be displayed as text to show the survey taker that they're on the right survey
sections with (GET) will be retrieved from the json
-->
<h5>
<ul>Course Subtitle:(GET)</ul>
<ul>Semester/Date:(GET)</ul>
<ul>Number of Students in Class:(GET)</ul>
<ul>Instructors:(GET)</ul>
</h5>

<div>

  <p>Is this all correct?</p>
  <a href="/actualSurvey">
    <button class="btn btn-sm btn-outline-secondary" >Yes</button>
  </a>
  <button class="btn btn-sm btn-outline-secondary">No</button>
</div>

@endsection
