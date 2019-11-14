//TEMP VARIABLES (REPLACE W/ SQL WHEN POSSIBLE)
const totalStudents=11;
const tempOutcomesArray = [
['CSCI 340', 'This is test outcome 1!', 'This is another outcome! (it\'s the second one)', '3rd outcome is the charm!', 'Ok, maybe we add another outcome here at the end of CSCI 340.'],
['TART 140', 'This is an alternate outcome for TART 140', 'This is another alternate! (it\'s the second one)', 'Let\'s stop this one at 3!'],
['CSCI 380', 'This is another alternate outcome, this time for CSCI 380.', 'This is the last of outcome of the demo!']];
//COLOR SCHEME STUFF
var goodColor="#98FB98";
var badColor="#F08080";
//LOCAL VARIABLES
var selectedClass;
var validToSubmit=false;
var totalOutcomes=0;

//ON RUNTIME
makeDropdownList();
makeSurvey();
makeClassOutcomes(1,tempOutcomesArray)

//REACTION FUNCTIONS
$('.number-box').keyup(function () { 
	refreshAll();
});	
$('.number-box').on("change", function () { 
	refreshAll();
});

//MAIN FUNCTIONS
function makeDropdownList() {
	console.log("makeDropdownList()");
	var newOutcome = $("<div class=\'dropdown-section\'>");
	newOutcome.html("\
		<select id=\"dropdown-menu\">\
		</select>");
	$("#dropdown-container").append(newOutcome);
	var classArray=[];
	for (i =0; i < tempOutcomesArray.length; i++) {
		console.log("i="+i);
		console.log("tempOutcomesArray[i][0]="+tempOutcomesArray[i][0]);
		classArray.push(tempOutcomesArray[i][0]);
	}
	populateDropdownList(classArray);
}

function populateDropdownList(classArray) {
	console.log("populateDropdownList("+classArray+")");
	var dropdownOptions ="";
	for (i = 0; i < classArray.length; i++) {
		console.log("i="+i);
		console.log("classArray[i]="+classArray[i]);
		dropdownOptions= dropdownOptions + "<option value='"+i+"'>"+classArray[i]+"</option>";
		console.log("dropdownOptions="+dropdownOptions);
	}
	console.log("dropdownOptions="+dropdownOptions);
	$("#dropdown-menu").html(dropdownOptions);
}

function makeSurvey() {
	console.log("makeSurvey()");
	var newOutcome = $("<div id=\'survey\'>");
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
				<button type='button' id='submit-button'>Submit</button>\
			</div>");
	$("#survey-container").append(newOutcome);
}

function makeClassOutcomes(surveyIndex, outcomeArray) {
	console.log("makeClassOutcomes("+surveyIndex+")");
	var questionsArray=[];
	for (i = 1; i < outcomeArray[surveyIndex].length; i++) {
		console.log("i="+i);
		console.log("outcomeArray[surveyIndex]["+i+"]="+outcomeArray[surveyIndex][i]);
		questionsArray.push(outcomeArray[surveyIndex][i]);
	}
	setUpSurvey(questionsArray);
}
function setUpSurvey(outcomeArray) {
	console.log("setUpPage("+outcomeArray+")");
	addOutcomesFromArray(outcomeArray);
	refreshAll();
}

function addOutcomesFromArray(outcomeArray) {
	console.log("addOutcomesFromArray("+outcomeArray+")");
	var i;
	for (i = 0; i < outcomeArray.length; i++) {
		console.log("i="+i);
		addNewOutcome(outcomeArray[i]);
	}
	refreshAll();
}
function refreshAll() {
	console.log("refreshAll()");
	var i;
	for (i = 0; i < totalOutcomes; i++) {
		console.log("i="+i);
		refresh(i);
	}
	refreshValidToSubmit();
	refreshSubmitButton(allSumsMatched());
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
		<td class=\'outcome-input\'><input type=\'number\' min=\"0\" class=\'number-box\' id=\'str"+num+"\'/></td>\
		<td class=\'outcome-input\'><input type=\'number\' min=\"0\" class=\'number-box\' id=\'sat"+num+"\'/></td>\
		<td class=\'outcome-input\'><input type=\'number\' min=\"0\" class=\'number-box\' id=\'ng"+num+"\'/></td>\
		<td class=\'outcome-input\'><input type=\'number\' min=\"0\" class=\'number-box\' id=\'unsat"+num+"\'/></td>\
		<td class=\'outcome-input\'><input type=\'number\' min=\"0\" class=\'number-box\' id=\'na"+num+"\'/></td>\
		<td class=\'outcome-input\'><input type=\'text\' min=\"0\" class=\'number-box sum-box\' id=\'sum"+num+"\' disabled /></td>");
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
		console.log("i="+i);
		var ithSumMatched=getSumOf(i)==totalStudents;
		console.log("ithSumMatched="+ithSumMatched);
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