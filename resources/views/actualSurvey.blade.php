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
    <tbody>
      <tr>
        <td>1.Begin to understand human and social behavior through the use of appropriate disciplinary techniques.</td>
        <td><input class="form-control" type="number" id="q1STRreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q1SATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q1NGreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q1UNSATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q1NAreplyNumber" min="0" data-bind="value:replyNumber" /></td>
              <td><input class="form-control" type="text" placeholder="0/24" readonly></td>
      </tr>
      <tr>
        <td>2.Use their understanding of human behavior and relationships to discuss policy and/or other interventions.</td>
        <td><input class="form-control" type="number" id="q2STRreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q2SATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q2NGreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q2UNSATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q2NAreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="text" placeholder="0/24" readonly></td>
      </tr>
      <tr>
        <td>3.Grasp how human experience is shaped by the social and institutional landscape.</td>
        <td><input class="form-control" type="number" id="q3STRreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q3SATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q3NGreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q3UNSATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="number" id="q3NAreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input class="form-control" type="text" placeholder="0/24" readonly></td>
      </tr>
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
    
  }
    $(document).ready(renderTeacherNav());
  </script>
@endsection
