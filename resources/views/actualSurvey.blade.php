@extends('teacherLayout')

@section('contentTitle')
<p id='surveyTitle'></p>
@endsection

@section('navbar')

@endsection


@section('content')
<div id="surveyHelp">
	<p>
		Welcome, please select a class survey on the left.
	</p>
		Have questions? <a href="/teacherHelp">Click here.</a>
</div>
<form id='surveyForm'>
	{{csrf_field()}}
</form>
<div id="submitDiv" class="float-right">
</div>


	@include('parserSetup')
	<script src= js/surveyRenderer.js'></script>
	<script>
	var totalOutcomes=-1;
	var totalStudents=-1;
	var formattedTitle = "";

	function readyPage() {
		console.log("readyPage()");
		setSurveyBase($('#surveyForm').html());
		formattedTitle = "Hello " + '{{$teacherName}}' +", please Select a Class";
		renderTeacherNav();
		refreshAll();
	}


	function renderTeacherNav() {
		console.log("renderTeacherNav()");
		var renderNav ="";
		var surveyTitles = getSurveyTitles();
		console.log(surveyTitles);
		for(var i=0; i<surveyTitles.length;i++) {
			var className=surveyTitles[i];
			var teacherThing= '<li class="nav-item">\
								<a class="nav-link" onClick="renderSurvey('+i+')">\
								<span data-feather="clipboard"></span>\
								'+className+' <span class="sr-only"></span>\
								</a>\
								</li>';

			renderNav+=teacherThing;
		}
		console.log('renderNav='+renderNav);
		$('#teacherNav').html(renderNav);

	}

	function makeHandlers() {
		console.log("refreshHandlers()");
		$('.surveyOut').off();
		$('.surveyIn').keyup(function () {
		refreshAll();
		});
		$('.surveyIn').on("change", function () {
			refreshAll();
		});
	}

	function setTitle(title) {
		console.log("setTitle("+title+")");
		$('#surveyTitle').html(title);
	}

	function allSumsMatched() {
		console.log("allSumsMatched()");
		var i;
		var matched=true;
		for (i = 0; i < totalOutcomes; i++) {
			//console.log("i="+i);
			var ithSumMatched=getSumOf(i)==totalStudents;
			//console.log("ithSumMatched="+ithSumMatched);
			matched=matched&&ithSumMatched;
		}
		console.log("returning matched="+matched);
		return matched;
	}

	function refreshAll() {
		console.log("refreshAll()");
		setTitle(formattedTitle);
		for(i=0;i<totalOutcomes;i++)
			refreshRow(i);
	}

	function refreshRow(num) {
		console.log("refreshRow("+num+")");
		var sum=getSumOf(num);
		$("#q"+num+"SUM").val(sum+"/"+totalStudents);
	}

	function getSumOf(num) {
	//	console.log("getSumOf("+num+")");
		var str=Number($("#q"+i+"STRreplyNumber").val());
	//	console.log("str"+num+"="+str);
		var sat=Number($("#q"+i+"SATreplyNumber").val());
	//	console.log("sat"+num+"="+sat);
		var ng=Number($("#q"+i+"NGreplyNumber").val());
	//	console.log("ng"+num+"="+ng);
		var unsat=Number($("#q"+i+"UNSATreplyNumber").val());
	//	console.log("unsat"+num+"="+unsat);
		var na=Number($("#q"+i+"NAreplyNumber").val());
	//	console.log("na"+num+"="+na);
		var sum=Number(str+sat+ng+unsat+na);
		return sum;
	}


    $(document).ready(readyPage());



  </script>
@endsection
