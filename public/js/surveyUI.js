
//Class Name, Class ID, Domain Abbr, Domain ID, Students
var surveys = [];


function addNewSurvey(className, classID, domainName, domainID, students) {
	console.log('addNewSurvey('+className+', '+classID+', '+domainName+', '+domainID+', '+students+')');
	var newSurvey = [className, parseInt(classID), domainName, parseInt(domainID), parseInt(students)];
}

function printSurveyInput(surveyJSON) {
	console.log('pringSurveyInput('+surveyJSON+'');
}