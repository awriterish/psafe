//Class Name, Class ID, Domain Abbr, Domain ID, Student num
var surveys = new Array();
function addNewSurvey(className, classID, domainName, domainID, students) {
	//console.log('addNewSurvey('+className+', '+classID+', '+domainName+', '+domainID+', '+students+')');
	var newSurvey = [className, parseInt(classID), domainName, parseInt(domainID), parseInt(students)];
	surveys.push(newSurvey);
}
function finishSurveyFormatting() {
	console.log('finishSurveyFormatting()');
	//console.log('surveys='+surveys);
}

//Domain ID, Question ID, Question Text
var questions = new Array();
function addNewQuestion(domainID, questionID, questionText) {
	//console.log('addNewQuestion('+domainID+', '+questionID+', '+questionText+')');
	var newQuestion = [parseInt(domainID), parseInt(questionID), questionText];
	questions.push(newQuestion);
}

//Teacher ID (int)
var teacherID = -1;
function setTeacherID(id) {
	console.log("setTeacherID("+id+")");
	teacherID=id;
}
function getTeacherID() {
	return teacherID;
}

function getClassAtIndex(index) {
	console.log("getClassAtIndex("+index+")")
	return surveys[index][1];
}

function getQuestionIDs(index) {
	console.log('getQuestionIDs('+index+')');
	var domainToRender=surveys[index][3];
	//console.log('domainToRender='+domainToRender);
	var questionIDs=[];
	for(i=0;i<questions.length;i++) {
		//console.log('questions['+i+'][0]='+questions[i][0]);
		if(questions[i][0]==domainToRender) {
			questionIDs.push(questions[i][1]);
		}
	}
	return questionIDs;
}

//ISAAC'S METHODS
/*
Returns the titles of all surveys in the following format:
["ClassName1/DomainAbbr1", "ClassName2/DomainAbbr2", "ClassName3/DomainAbbr3",...]	
*/
function getSurveyTitles() {
	var titlesOut=[];
	for (i = 0; i < surveys.length; i++) {
		var formattedTitle = surveys[i][0]+"/"+surveys[i][2];
		//console.log('formattedTitle='+formattedTitle);
		titlesOut.push(formattedTitle);
	}
	return titlesOut;
}

/*
Returns all the questions of a survey at {index} in the following format:
[Question 1, Question 2, Question 3,...]	
*/
function getSurveyQuestions(index) {
	console.log('getSurveyQuestions('+index+')');
	var domainToRender=surveys[index][3];
	//console.log('domainToRender='+domainToRender);
	var surveyQuestions=[];
	for(i=0;i<questions.length;i++) {
		//console.log('questions['+i+'][0]='+questions[i][0]);
		if(questions[i][0]==domainToRender) {
			surveyQuestions.push(questions[i][2]);
		}
	}
	return surveyQuestions;
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
	console.log("getStudentsIn("+classIndex+")");
	return surveys[classIndex][4];
}