@extends('layout')

@section('content')	
	<div class="container" id="dropdown-container">
		<div class="row" id="dropdown-row">
		</div>
	</div>
	<div class="container" id='survey-container' onLoad='helloWorld()'>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
	<script src= '/js/surveyScript.js'></script>
	<script>
		function testMethod() {
			console.log("testMethod()");
		}
		
		$(document).ready(setUpForID({{$id}}));
	</script>
@endsection
