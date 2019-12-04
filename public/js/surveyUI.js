
//Class Name, Class ID, Domain Abbr, Domain ID, Students
var surveys = [];


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