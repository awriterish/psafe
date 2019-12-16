@extends('adminLayout')

@section('contentTitle','Update Database')

@section('content')
<div class="section">
  <h4>Follow these instructions to update the database.</h4>
  <br>
  <br>
  <div class="container p-3 my-3 bg-dark text-white">
    <h5>Step 1: Locating the Data</h5>
    <p>Click the button below.  You will be redirected to another page off this site.</p>
    <a href="https://hoike.hendrix.edu/api/CourseModel?$filter=YearCode%20eq%2020{{date('y')}}&$orderby=CourseCode&$skip=0&$count=true" target="_blank"><button type="button" class="btn btn-primary" name="button">Open Data</button></a>
  </div>
  <div class="container p-3 my-3 bg-dark text-white">
    <h5>Step 2: Download the data</h5>
    <p>On this webpage, use the key stroke <kbd>CTRL + S</kbd> on Windows or <kbd>⌘ COMMAND + S</kbd> on Mac to save the document.  Make sure to save it to a place you can access.</p>
  </div>
  <div class="container p-3 my-3 bg-dark text-white">
    <h5>Step 3: Upload the data</h5>
    <p>Click the button below to upload ths file.</p>
    <div id="uploadForm">
      <form id="fileUpload" action="/uploadData" enctype="multipart/form-data">
        <input name="file" type="file" class="btn btn-primary">
        <input type="submit" value="Upload" class="btn btn-primary" />
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">

</script>
@endsection
