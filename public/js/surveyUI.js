
//Class Name, Class ID, Domain Abbr, Domain ID, Students
var surveys = [];

//Domain ID, Question ID, Question Text
var questions = [];

var teacherID = -1;

//HELPER METHODS
function getSurveyTitles() {
	return ["test1", "test2", "test3"];
}

function getSurveyQuestions(index) {
	return [index+"question1", index+"question2", index+"question3"];
}


/*
[[class index],
[STR, SAT, NG, UNSAT, NA],
...,
[Grades?, Papers?, Presentations?, Exams?, Other?(String)]
*/
function parseSubmission(submission) {
	console.log("parseSubmission("+submission+")");
}


function addNewSurvey(className, classID, domainName, domainID, students) {
	console.log('addNewSurvey('+className+', '+classID+', '+domainName+', '+domainID+', '+students+')');
	var newSurvey = [className, parseInt(classID), domainName, parseInt(domainID), parseInt(students)];
	surveys.push(newSurvey);
}

function finishSurveyFormatting() {
	surveys.sort();
	console.log(surveys);
}

function printSurveyInput(surveyJSON) {
	console.log('pringSurveyInput('+surveyJSON+'');
}