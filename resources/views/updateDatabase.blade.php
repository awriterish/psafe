@extends('adminLayout')

@section('contentTitle','Update Database')

@section('content')
<div class="section">
  <h4>Follow these instructions to update the database.</h4>
  <br>
  <br>
  <div class="container p-3 my-3 bg-dark text-white">
    <h5>Step 1: Locating the Data</h5>
    <p>Click the button below.  You will be redirected to another page off this site. Note: this site will take a while to fully load.</p>
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
      <form enctype="multipart/form-data" method="post" action="/UploadData">
        {{ csrf_field() }}
        <input name="file" type="file" class="btn btn-primary"/><br><br>
        <input type="button" value="Upload" class="btn btn-primary"/><br><br>
      </form>
      <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress" width="10%"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(':file').on('change', function () {
var file = this.files[0];



// Also see .name, .type
});

$(':button').on('click', function () {
  $('#progress').css("width","0%");
  $.ajax({
    // Your server script to process the upload
    url: '/uploadData',
    type: 'POST',

    // Form data
    data: new FormData($('form')[0]),

    // Tell jQuery not to process data or worry about content-type
    // You *must* include these options!
    cache: false,
    contentType: false,
    processData: false,

    // Custom XMLHttpRequest
    xhr: function () {
      var myXhr = $.ajaxSettings.xhr();
      if (myXhr.upload) {
        // For handling the progress of the upload
        myXhr.upload.addEventListener('progress', function (e) {
          if (e.lengthComputable) {
            $('#progress').css("width",((e.loaded/e.total)*100)+"%");
          }
        }, false);
      }
      return myXhr;
    },
    success: function(data){
      $("#uploadForm").html("File uploaded!<br>" + data);
    },
    error: function(xhr, error){
      $("#uploadForm").html("Error uploading file.  Please reload the page and try again");
    }
  });
});
</script>
@endsection
