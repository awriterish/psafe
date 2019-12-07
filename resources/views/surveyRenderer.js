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
						<td id ="domainQ1">'+i+". "+question+'</td>\
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