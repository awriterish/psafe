@extends('adminLayout')

@section('contentTitle')
Edit Domains
@endsection

@section('content')
<form action="updateDomains/" method="get">
  <table class="table table-striped table-hover">
    <tr>
      <th>Domain Name</th>
      <th>Domain Abbreviation</th>
      <th>Active</th>
    </tr>
    @foreach($domains as $domain)
    <tr>
      <td>{{$domain->Name}}</td>
      <td>{{$domain->Abbr}}</td>
      <td>
        <label class="switch">
          <input type="checkbox" name="{{$domain->Abbr}}" {{$domain->Active==1?"checked":""}}>
          <span class="slider round"></span>
        </label>
        </td>
    </tr>
    @endforeach
  </table>
  <input type="submit" class="btn btn-primary" value="Update domains">
</form>
<br>
@endsection
