@extends('layout')

@section('content')
	<script src="{{ URL::asset('js/surveyScript.js') }}"></script>		
	<div class="container" id="dropdown-container">
			<div class="row" id="dropdown-row">
		</div>
	</div>
	<div class="container" id='survey-container' onLoad="helloWorld({{$id}})">
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
	
@endsection
