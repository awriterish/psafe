@extends('teacherLayout')

@section('contentTitle')
<p id="title"></p>
@endsection

@section('navbar')

@endsection


@section('content')

<form>
<p>
  <h6>Rubrics:</h6> Type in each box the number of students in the class whose
  performance relative to the listed Learner Outcome is described by
   the label at the top of the column.

  <ul>
    Strong (STR) = outstanding performance in course; exceeds expectations of course performance
  </ul>
  <ul>
    Satisfactory (SAT) = performance that meets the expected level for the course
  </ul>
  <ul>
  Needs Growth (NG) = some need for improvement, although overall performance meets expected level for the course
  </ul>
  <ul>
  Unsatisfactory (UNSAT) = overall performance not acceptable for the course
  </ul>
  <ul>
    Not applicable (NA)= this learning goal is not applicable to the course
  </ul>
</p>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Learner Outcomes</th>
        <th>STR</th>
        <th>SAT</th>
        <th>NG</th>
        <th>UNSAT</th>
        <th>NA</th>
        <th>Sum</th>
      </tr>
    </thead>
    <tbody id="survey">




    </tbody>
  </table>
</div>
<p>
<h6>Descriptive Evidence of Performance:</h6>
 Please check all data used to complete this form. Feel free to add to the list. Multiple measures must be used.
</p>
<div class="custom-control custom-checkbox mb-3">
  <input type="checkbox" class="custom-control-input" id="usedGrades">
  <label class="custom-control-label" for="usedGrades">Grades</label>
</div>
  <div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" class="custom-control-input" id="usedPapers">
    <label class="custom-control-label" for="usedPapers">Papers</label>
  </div>
  <div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" class="custom-control-input" id="usedPresentations">
    <label class="custom-control-label" for="usedPresentations">Presentations</label>
  </div>
  <div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" class="custom-control-input" id="usedExams">
    <label class="custom-control-label" for="usedExams">Exams</label>
  </div>
  <div class="form-control-sm row ">
    <label for="formGroupExampleInput">Other(please list:)</label>
    <input type="text" class="form-control form-control-sm col-md-2" id="formGroupExampleInput" placeholder="Example input">
  </div>
</form>
  <div class="float-right">
    <a href="/testPage">
      <button class="btn btn-sm btn-outline-secondary" >Submit</button>
    </a>
  </div>


	@include('parserSetup')
		
	<script>
	function renderTeacherNav() {
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

	function renderSurvey(index){
		console.log('renderSurvey('+index+')');
		var survey ="";
		var surveyQuestions = getSurveyQuestions(index);
		console.log(surveyQuestions);
		for(var i=1; i<=surveyQuestions.length;i++) {
			var question=surveyQuestions[i-1];
			var surveyThing= '<tr>\
							<td id ="domainQ1">'+i+". "+question+'</td>\
							<td><input class="form-control" type="number" id="q'+i+'STRreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
							<td><input class="form-control" type="number" id="q'+i+'SATreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
							<td><input class="form-control" type="number" id="q'+i+'NGreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
							<td><input class="form-control" type="number" id="q'+i+'UNSATreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
							<td><input class="form-control" type="number" id="q'+i+'NAreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
							<td><input class="form-control" type="text" placeholder="0/24" readonly></td>\
							</tr>';

			survey	+=surveyThing;
		}
		console.log('survey='+survey);
		$('#survey').html(survey);
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

	
    $(document).ready(renderTeacherNav());
  </script>
@endsection
