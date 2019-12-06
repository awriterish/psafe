//Class Name, Class ID, Domain Abbr, Domain ID, Student num
var surveys = new Array();
function addNewSurvey(className, classID, domainName, domainID, students) {
	console.log('addNewSurvey('+className+', '+classID+', '+domainName+', '+domainID+', '+students+')');
	var newSurvey = [className, parseInt(classID), domainName, parseInt(domainID), parseInt(students)];
	surveys.push(newSurvey);
}
function finishSurveyFormatting() {
	console.log('finishSurveyFormatting()');
	surveys.sort();
	console.log(surveys);
}

//Domain ID, Question ID, Question Text
var questions = new Array();
function addNewQuestion(domainID, questionID, questionText) {
	console.log('addNewSurvey('+domainID+', '+questionID+', '+questionText+')');
	var newQuestion = [parseInt(domainID), parseInt(questionID), questionText];
	questions.push(newQuestion);
}

//Teacher ID (int)
var teacherID = -1;
function setTeacherID(id) {
	console.log("setTeacherID("+id+")");
	teacherID=id;
}


//ISAAC'S METHODS
/*
Returns the titles of all surveys in the following format:
["ClassName1/DomainAbbr1", "ClassName2/DomainAbbr2", "ClassName3/DomainAbbr3",...]	
*/
function getSurveyTitles() {
	return ["test1/LD1", "test2/LD2", "test3/LD3"];
}

/*
Returns all the questions of a survey at {index} in the following format:
[Question 1, Question 2, Question 3,...]	
*/
function getSurveyQuestions(index) {
	return [index+"question1", index+"question2", index+"question3"];
}

/* Uploads the submission in the following format:
[[class index],
[STR, SAT, NG, UNSAT, NA],
...,
[Grades, Papers?, Presentations?, Exams?, Other?(String)]
*/
function parseSubmission(submission) {
	console.log("parseSubmission("+submission+")");
}

//Returns the number of students in class at {classIndex}
function getStudentsIn(classIndex) {
	return 1;
}