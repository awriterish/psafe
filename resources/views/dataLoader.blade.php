@extends("layout")

@section("title", "Get Data")

@section("content")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="section">
  <button type="button" name="button" id="loader" class="btn btn-primary" onclick="loadData()">Load Data</button>
  <p>By clicking above you will update your database</p>
  <h4><span id="completed">0</span>/<span id="total">-</span> classes completed</h4>
</div>
<script src="/js/loadData.js"></script>
@endsection
