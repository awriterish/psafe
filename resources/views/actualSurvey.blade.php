@extends('teacherLayout')

@section('contentTitle')
<p id='surveyTitle'></p>
@endsection

@section('teacherName')
<p id='teacherName' style="display:inline"></p>

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
<form id='surveyForm' method="post" action="/survey">
	{{csrf_field()}}
</form>

<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
	<div class="toast-header">
		<strong class="mr-auto">Warning</strong>
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="toast-body" id="errorMsg">
		Please select at least two measures of performace.
	</div>
</div>

	@include('parserSetup')
	<script src= '/js/surveyRenderer.js'></script>
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
		//console.log(surveyTitles);
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
		//console.log('renderNav='+renderNav);
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

  function displayTeacherName() {
	console.log("displayTeacherName()"+'{{$teacherName}}');
    $('#teacherName').html('{{$teacherName}}');
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
		//console.log("returning matched="+matched);
		return matched;
	}

	function refreshAll() {
		console.log("refreshAll()");
		setTitle(formattedTitle);
		displayTeacherName();
		for(i=1;i<=totalOutcomes;i++)
			refreshRow(i);
	}

	function refreshRow(num) {
		//console.log("refreshRow("+num+")");
		var sum=getSumOf(num);
		$("#q"+num+"SUM").val(sum+"/"+totalStudents);
	}

	function getSumOf(num) {
	//	console.log("getSumOf("+num+")");
		var str=Number($("input[name='q"+i+"STR']").val());
	//	console.log("str"+num+"="+str);
		var sat=Number($("input[name='q"+i+"SAT']").val());
	//	console.log("sat"+num+"="+sat);
		var ng=Number($("input[name='q"+i+"NG']").val());
	//	console.log("ng"+num+"="+ng);
		var unsat=Number($("input[name='q"+i+"UNSAT']").val());
	//	console.log("unsat"+num+"="+unsat);
		var na=Number($("input[name='q"+i+"NA']").val());
	//	console.log("na"+num+"="+na);
		var sum=Number(str+sat+ng+unsat+na);
		return sum;
	}


    $(document).ready(readyPage());



  </script>
@endsection
