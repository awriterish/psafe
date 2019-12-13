<script src= '/js/surveyParser.js'></script>
<script>
			
	@foreach ($ClassesToSurvey as $class)
		addNewSurvey('{{$class['Class_Name']}}','{{$class['Class_ID']}}','{{$class['Domain_Name']}}','{{$class['Domain_ID']}}','{{$class['Num_Students']}}');
	@endforeach
		
	@foreach ($questions as $question)
		addNewQuestion('{{$question['Domain_ID']}}', '{{$question['Question_ID']}}', '{{$question['Text']}}');
	@endforeach
			
	setTeacherID('{{$id}}');
	finishSurveyFormatting();
	//$(document).ready(setUpForID({{$id}}));
</script>