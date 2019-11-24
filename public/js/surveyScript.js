//TEMP VARIABLES (REPLACE W/ SQL WHEN POSSIBLE)
//id, name, abbreviation
const domains =		[[0,'Expressive Arts','EA'],
					 [1,'Historical Perspectives','HP'],
					 [2,'Literary Studies','LS'],
					 [3,'Natural Science Inquiry','NS'],
					 [4,'Social and Behavioral Analysis','SB'],
					 [5,'Values, Beliefs and Ethics','VA']];
//id, name
const teachers =	[[0,'Mark Goadrich'],
					 [1,'Gabriel Ferrer'],
					 [2,'Brent Yorgey']];
//id, name,  size, teacher1, teacher2, domain1, domain2
const classes =		[[2,'CSCI 110 1',12, 1, 2,0,-1],
					 [6,'CSCI 110 2',15, 0,-1,0,-1],
					 [3,'CSCI 380',  20, 0, 2,1, 2],
					 [4,'CSCI 340',   4, 2, ,3, 4],
					 [5,'ENGF 250',  30, 1,-1,5,-1],
					 [0,'TART 500',  14, 0, 1,2,1],
					 [1,'SOCI 300',  19, 0,-1,3,-1]];
//id, active, text, domain
const questions =	[[1, true,'Test question for Domain 0',0],
					 [16,true,'Expressed the arts',0],
					 [4, false,'Expressed the Arts but wrong',0],
					 [9, true,'Observed expression of art',0],
					 [0, true,'Test question for Domain 1',1],
					 [13,true,'Get a perspective of a historical type',1],
					 [2, true,'Test question for Domain 2',2],
					 [16,true,'Studied literature',2],
					 [10,true,'Studied literature but different',2],
					 [8, true,'Test question for Domain 3',3],
					 [3, true,'Performed an inquiry of natural science',3],
					 [17,true,'Inquired about natural sciences',3],
					 [6, true,'Test question for Domain 4', 4],
					 [7, true,'Was social and analyzed behaviour',4],
					 [14,true,'Behaved socially and analytically',4],
					 [12,true,'Test question for Domain 5',5],
					 [5, true,'Valued Beliefs and Ethics',5],
					 [15,true,'Believed in Values and Ethics',5],
					 [11,true,'Give a historical perspective',1]
					 ];
//id, STR, SAT, NG, UNSAT, NA, submission, question
var responses =		[
					];
//id, teacher, class
var submissions =	[
					];
					
//COLOR SCHEME STUFF
var goodColor="#98FB98";
var badColor="#F08080";
//LOCAL VARIABLES
var selectedTeacher=2;

var selectedClass;
var validToSubmit;
var totalOutcomes;
var totalStudents;

//ON RUNTIME
function setUpForID(id) {
	console.log("setUpForID("+id+")");
	selectedTeacher=id;
	setUpBackend();
	makePageForTeacher();
}

function makeErrorBox(errorString) {
	alert(errorString);
}
//MAIN FUNCTIONS
function setUpBackend() {
	console.log("setUpBackend()");
	validToSubmit=false;
	totalOutcomes=0;
}
function makePageForTeacher() {
	console.log("makePageForTeacher("+selectedTeacher+")");
	makeDropdownShell();
	var taughtClasses=getTaughtBy(selectedTeacher);
	populateDropdownList(taughtClasses);
}
function makeDropdownShell() {
	console.log("makeDropdownShell()");
	var newOutcome = $("<div id='class-select'>");
	newOutcome.html("\
			<select id='dropdown-menu'>\
			</select>\
			<button type='button' id='class-button' onclick='parseClassSubmit()'>\
				TAKE SURVEY\
			</button>");
	$("#dropdown-row").append(newOutcome);
}

function populateDropdownList(classArray) {
	console.log("populateDropdownList("+classArray+")");
	var dropdownOptions ="";
	for (i = 0; i < classArray.length; i++) {
		var toParse=classArray[i];
		console.log("toParse="+toParse);
		dropdownOptions= dropdownOptions + "<option value='"+toParse[0]+"'>"+toParse[1]+"</option>";
		console.log("dropdownOptions="+dropdownOptions);
	}
	console.log("dropdownOptions="+dropdownOptions);
	$("#dropdown-menu").html(dropdownOptions);
}

function parseClassSubmit() {
	console.log("parseClassSubmit()");
	var classID = document.getElementById('dropdown-menu').value;
	console.log("classID=" + classID);
	var foundClasses=findAllWithIdAtIndex(classID,0,classes);
	console.log("foundClasses="+foundClasses);
	if(foundClasses.length==1) {
		console.log("No Errors Found!!");
		selectedClass=foundClasses[0];
		console.log("selectedClass="+selectedClass);
	} else {
		makeErrorBox("error in parseClassSubmit()");
	}
	makeSurvey();
	populateSurvey();
	document.getElementById("class-button").setAttribute("disabled", "disabled");
	makeSurveyHeader();
}

function makeSurveyHeader() {
	var surveyDomain=findAllWithIdAtIndex(selectedClass[5], 0, domains)[0][2]
	$("#dropdown-container").html("<h2 id='survey-title'> Survey for "+ selectedClass[1]+" ("+surveyDomain+")");
}

function makeSurvey() {
	console.log("makeSurvey()");
	var newOutcome = $("<div id='survey'>");
	newOutcome.html("\
		<table class='table outcome-table'>\
				<thead>\
					<tr class = 'names-row'>\
						<th scope='col' class='top-col'>Outcome</th>\
						<th scope='col' class='top-col'>STR</th>\
						<th scope='col' class='top-col'>SAT</th>\
						<th scope='col' class='top-col'>NG</th>\
						<th scope='col' class='top-col'>UNSAT</th>\
						<th scope='col' class='top-col'>NA</th>\
						<th scope='col' class='top-col'>SUM</th>\
					</tr>\
				</thead>\
				<tbody id='outcomes'>\
				</tbody>\
			</table>\
			<div class='button-row'>\
				<button type='button' id='submit-button' onclick='submitSurvey()'>Submit</button>\
			</div>");
	$("#survey-container").append(newOutcome);
}

function populateSurvey() {
	console.log("populateSurvey()");
	totalStudents=selectedClass[2];
	console.log("totalStudents="+totalStudents);
	var surveyOutcomes=findAllWithIdAtIndex(selectedClass[5], 3, questions);
	var i=0;
	for (i=0; i < surveyOutcomes.length;i++) {
		if(surveyOutcomes[i][1]) {
			console.log("surveyOutcomes[i] approved,= " + surveyOutcomes[i]);
			addNewOutcome(surveyOutcomes[i][2]);
		}
	}
	refreshAll();
}

function submitSurvey() {
	//TODO: THIS
	console.log("submitSurvey()");
	makeErrorBox("Thank you!");
	document.location.reload();
}

function refreshAll() {
	console.log("refreshAll()");
	var i;
	for (i = 0; i < totalOutcomes; i++) {
		//console.log("i="+i);
		refresh(i);
	}
	refreshValidToSubmit();
	refreshSubmitButton(allSumsMatched());
	refreshHandlers();
}

function refreshHandlers() {
	console.log("refreshHandlers	()");
	$('.number-box').off();
	$('.number-box').keyup(function () {
	refreshAll();
	});
	$('.number-box').on("change", function () {
		refreshAll();
	});
}

//TABLE PARSING FUNCTIONS
function getTaughtBy(teacherId){
	console.log("getTaughtBy("+teacherId+")");
	var taughtClasses=new Array();
	var i;
	for(i=0;i<classes.length;i++) {
		console.log("i="+i);
		var classToCheck=classes[i];
		console.log("classToCheck="+classToCheck);
		if (classToCheck[3]==teacherId||classToCheck[4]==teacherId) {
			console.log("classToCheck has teacherID "+teacherId+"!");
			taughtClasses.push(classes[i]);
		}
	}
	console.log(taughtClasses);
	return taughtClasses;
}
function getClassIDsFromTeacher(teacherId){
	console.log("getClassIDsFromTeacher("+teacherId+")");
	var taughtClasses=new Array();
	var i;
	for(i=0;i<classes.length;i++) {
		console.log("i="+i);
		var classToCheck=classes[i];
		console.log("classToCheck="+classToCheck);
		if (classToCheck[3]==teacherId||classToCheck[4]==teacherId) {
			console.log("classToCheck has teacherID "+teacherId+"!");
			taughtClasses.push(classes[i][0]);
		}
	}
	console.log(taughtClasses);
	return taughtClasses;
}
function findById(id, table) {
	console.log("findById("+id+")");
	if(Number.isInteger(id)) {
		var i=0;
		for(i=0; i<table.length; i++) {
			var row=table[i];
			//console.log("Checking row "+i+",="+row);
			if(row[0]==id)
			{
				//console.log("Match for id="+id+" found! Returning row at i="+i+":"+row);
				return row;
			}
		}			
	} else {
		makeErrorBox("id="+id+", which isn't a number!");
	}
}
function findAllWithIdAtIndex(id, index, table) {
	console.log("findAllWithIdAtIndex("+id+","+index+")");
	var out=new Array();
	var i=0;
	for(i=0; i<table.length; i++) {
		var row=table[i];
		console.log("table["+i+"]="+row);
		if(row[index]==id)
		{
			console.log("row "+i+" has id "+id+"!");
			out.push(row);
		}
	}
	console.log("out="+out);	
	return out;
}

//HELPER FUNCTIONS
function addNewOutcome(outcomeText) {
	console.log("addNewOutcome()");
	addOutcome(totalOutcomes, outcomeText);
	totalOutcomes++;
	console.log("totalOutcomes="+totalOutcomes);
}
function refresh(num) {
	console.log("refresh("+num+")");
	var sum=getSumOf(num);
	$("#sum"+num).val(sum+"/"+totalStudents);
	setSumColor(num, sum==totalStudents);
}
function addOutcome(num, outcomeText) {
	console.log("addOutcome("+num+")");
	var newOutcome = $("<tr class=\"outcome-row\" id=\"outcome"+num+"\">");
	newOutcome.html("\
		<th scope=\"row\" class=\"outcome-text\" id=\"question"+num+"\">"+outcomeText+"</th>\
		<td class='outcome-input'><input type='number' min=\"0\" value=0 class=\'number-box\' id=\'str"+num+"\'/></td>\
		<td class='outcome-input'><input type='number' min=\"0\" value=0 class=\'number-box\' id=\'sat"+num+"\'/></td>\
		<td class='outcome-input'><input type='number' min=\"0\" value=0 class=\'number-box\' id=\'ng"+num+"\'/></td>\
		<td class='outcome-input'><input type='number' min=\"0\" value=0 class=\'number-box\' id=\'unsat"+num+"\'/></td>\
		<td class='outcome-input'><input type='number' min=\"0\" value=0 class=\'number-box\' id=\'na"+num+"\'/></td>\
		<td class='outcome-input'><input type='text' min=\"0\" class=\'number-box sum-box\' id=\'sum"+num+"\' disabled /></td>");
	$("#outcomes").append(newOutcome);
}
function setSumColor(num, valid) {
	console.log("setSumColor("+num+","+valid+")");
	var boxColor;
	if(valid) {
		boxColor=goodColor;
	} else {
		boxColor=badColor;
	}
	$("#sum"+num).css({"background-color": boxColor});
}
function refreshSubmitButton(sumsMatched) {
	console.log("refreshButton("+sumsMatched+")");
	if(sumsMatched) {
		document.getElementById("submit-button").removeAttribute("disabled");
		$("#submit-button").css({"background-color": goodColor});
	} else {
		document.getElementById("submit-button").setAttribute("disabled", "disabled");
		$("#submit-button").css({"background-color": badColor});
	}
}
function refreshValidToSubmit() {
	console.log("refreshValidToSubmit()");
	validToSubmit=allSumsMatched();
}
function allSumsMatched() {
	console.log("allSumsMatched()");
	var i;
	var matched=true;
	for (i = 0; i < totalOutcomes; i++) {
		//console.log("i="+i);
		var ithSumMatched=getSumOf(i)==totalStudents;
		//console.log("ithSumMatched="+ithSumMatched);
		matched=matched&&ithSumMatched;
	}
	console.log("returning matched="+matched);
	return matched;
}
function getSumOf(num) {
//	console.log("getSumOf("+num+")");
	var str=Number($("#str"+num).val());
//	console.log("str"+num+"="+str);
	var sat=Number($("#sat"+num).val());
//	console.log("sat"+num+"="+sat);
	var ng=Number($("#ng"+num).val());
//	console.log("ng"+num+"="+ng);
	var unsat=Number($("#unsat"+num).val());
//	console.log("unsat"+num+"="+unsat);
	var na=Number($("#na"+num).val());
//	console.log("na"+num+"="+na);
	var sum=Number(str+sat+ng+unsat+na);
	return sum;
}
