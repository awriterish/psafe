@extends("adminLayout")

@section("title", "Get Data")

@section("content")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<br>
<div class="section">
  <button type="button" name="button" id="loader" class="btn btn-primary" onclick="loadData()">Load Data</button>
  <p>By clicking above you will update your database</p>
  <div id="output" class="section">

  </div>
</div>
<script src="/js/loadData.js"></script>
@endsection
