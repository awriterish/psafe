<!--HOW TO SET UP WEBPAGE

first, choose what layout this will be extending:
'teacherLayout' for pages the survey-takers will see
or
'adminLayout' for pages Dr. Leonard and Dr. Pfau will see

-->
@extends('teacherLayout')

<!--
Next is the section title
This is the large text at the top
-->
@section('contentTitle')
example content title
@endsection


<!navbar is specific to teacherLayout, but also required>
<!--
insert javascript that retrieves a teacher's classes,
see teacherLayout.blade.php for specifics
-->
@section('navbar')

@endsection
<!--
Here's where all the important page-specific stuff goes
-->
@section('content')
example content
@endsection
