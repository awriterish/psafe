var surveyBase = 'TEST, IF YOU SEE THIS SOMETHING WENT WRONG';

function setSurveyBase(newBase) {
	console.log('setSurveyBase('+newBase+')');
	surveyBase=newBase;
	
}

function renderSurveyFrame() {
	console.log("renderSurveyFrame()");
	var surveyForm='<p id="rubric">\
						<h6>Rubrics:</h6>\
						Type in each box the number of students in the class whose\
						performance relative to the listed Learner Outcome is described by\
						the label at the top of the column.\
						<ul>\
							Strong (STR) = outstanding performance in course; exceeds expectations of course performance\
						</ul>\
						<ul>\
							Satisfactory (SAT) = performance that meets the expected level for the course\
						</ul>\
						<ul>\
							Needs Growth (NG) = some need for improvement, although overall performance meets expected level for the course\
						</ul>\
						<ul>\
							Unsatisfactory (UNSAT) = overall performance not acceptable for the course\
						</ul>\
						<ul>\
							Not applicable (NA)= this learning goal is not applicable to the course\
						</ul>\
					</p>\
					<div class="table-responsive">\
						<table class="table table-striped table-sm">\
							<thead>\
								<tr>\
									<th>Learner Outcomes</th>\
									<th>STR</th>\
									<th>SAT</th>\
									<th>NG</th>\
									<th>UNSAT</th>\
									<th>NA</th>\
									<th>Sum</th>\
								</tr>\
							</thead>\
							<tbody id="survey">\
							</tbody>\
						</table>\
					</div>\
					<p>\
						<h6>Descriptive Evidence of Performance:</h6>\
						Please check all data used to complete this form. Feel free to add to the list. Multiple measures must be used.\
					</p>\
					<div class="custom-control custom-checkbox mb-3">\
						<input type="checkbox" class="custom-control-input" id="usedGrades">\
						<label class="custom-control-label" for="usedGrades">Grades</label>\
					</div>\
					<div class="custom-control custom-checkbox mb-3">\
						<input type="checkbox" class="custom-control-input" id="usedPapers">\
						<label class="custom-control-label" for="usedPapers">Papers</label>\
					</div>\
					<div class="custom-control custom-checkbox mb-3">\
						<input type="checkbox" class="custom-control-input" id="usedPresentations">\
						<label class="custom-control-label" for="usedPresentations">Presentations</label>\
					</div>\
					<div class="custom-control custom-checkbox mb-3">\
						<input type="checkbox" class="custom-control-input" id="usedExams">\
						<label class="custom-control-label" for="usedExams">Exams</label>\
					</div>\
					<div class="form-control-sm row ">\
						<label for="formGroupExampleInput">Other(please list:)</label>\
						<input type="text" class="form-control form-control-sm col-md-2" id="formGroupExampleInput" placeholder="Example input">\
					</div>';
	$('#surveyHelp').remove();
	$('#surveyForm').html(surveyBase+surveyForm);
}

function renderSurvey(index){
	renderSurveyFrame();
	renderSubmitButton();
	console.log('renderSurvey('+index+')');

	var survey ="";
	var surveyQuestions = getSurveyQuestions(index);

	totalOutcomes=surveyQuestions.length;
	console.log("totalOutcomes="+totalOutcomes);
	totalStudents=getStudentsIn(index);
	console.log("totalStudents="+totalStudents);
	for(var i=1; i<=surveyQuestions.length;i++) {
		var question=surveyQuestions[i-1];
		var surveyThing= '<tr>\
						<td id ="domainQ'+i+'">'+i+". "+question+'</td>\
						<td><input class="form-control surveyIn" type="number" id="q'+i+'STRreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
						<td><input class="form-control surveyIn" type="number" id="q'+i+'SATreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
						<td><input class="form-control surveyIn" type="number" id="q'+i+'NGreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
						<td><input class="form-control surveyIn" type="number" id="q'+i+'UNSATreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
						<td><input class="form-control surveyIn" type="number" id="q'+i+'NAreplyNumber" min="0" data-bind="value:replyNumber" placeholder="0"/></td>\
						<td><input class="form-control surveyOut" type="text"   id="q'+i+'SUM" placeholder="0/'+totalStudents+'" readonly></td>\
						</tr>';

		survey	+=surveyThing;
	}
	//console.log('survey='+survey);
	$('#survey').html(survey);
	makeHandlers();
	var surveyTitles = getSurveyTitles();
	var className=surveyTitles[index];
	formattedTitle="Survey for " +className	;
	refreshAll();
}

function renderSubmitButton() {
	var submitButton=	'<div id="submitDiv" class="float-right">\
							<a>\
							<button class="btn btn-lg btn-outline-secondary mt-auto" style="margin-bottom: 10px;" method="post" action="/submitResponse">Submit</button>\
							</a>\
						</div>';
	$('#surveyForm').append(submitButton);
}
