@extends('teacherLayout')

@section('contentTitle')
(GET CLASS NAME) Learning Domain Assessment
@endsection

@section('navbar')

@endsection

@section('content')
<p>
  Rubrics: Type in each box the number of students in the class whose
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
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1.Begin to understand human and social behavior through the use of appropriate disciplinary techniques.</td>
        <td><input type="number" id="q1STRreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q1SATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q1NGreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q1UNSATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q1NAreplyNumber" min="0" data-bind="value:replyNumber" /></td>
      </tr>
      <tr>
        <td>2.Use their understanding of human behavior and relationships to discuss policy and/or other interventions.</td>
        <td><input type="number" id="q2STRreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q2SATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q2NGreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q2UNSATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q2NAreplyNumber" min="0" data-bind="value:replyNumber" /></td>
      </tr>
      <tr>
        <td>3.Grasp how human experience is shaped by the social and institutional landscape.</td>
        <td><input type="number" id="q3STRreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q3SATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q3NGreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q3UNSATreplyNumber" min="0" data-bind="value:replyNumber" /></td>
        <td><input type="number" id="q3NAreplyNumber" min="0" data-bind="value:replyNumber" /></td>
      </tr>
    </tbody>
  </table>
</div>
<a href="/testPage">
  <button class="btn btn-sm btn-outline-secondary" >Submit</button>
</a>
@endsection
