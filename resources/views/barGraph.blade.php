<style media="screen">
  #graphContainer{
    border-left: 1px solid grey;
    border-bottom: 1px solid grey;
    width: 100%;
    padding: 0;
    display: absolute;
  }

  .graphRow{
    height: 6rem;
    padding: 0;
    padding-top: 1rem;
    padding-bottom: 1rem;
    left: 0;
    width:100%;
  }

  .graphBar{
    display: inline-block;
    left: 0;
    height: 100%;
    margin-left: -0.5px;
    margin-right: -4px;
    padding: 0;
    transition: all 0.2s;
  }

  .quarter{
    border-left: 1px solid grey;
    display: inline-block;
    width: 25%;
    padding-left: 3px;
    margin-right: -4px;
  }

  .verticalLine{

  }

  .str{
    background-color:#00dFeF	;
  }

  .str:hover{
    background-color:#10cFfF;
  }

  .sat{
    background-color:#bdffa3;
  }

  .sat:hover{
    background-color:#adff93;
  }

  .ng{
    background-color:#feff97;
  }

  .ng:hover{
    background-color:#ffff77;
  }

  .unsat{
    background-color:#ffa5a5;
  }

  .unsat:hover{
    background-color:#ff9595;
  }

  .na{
    background-color:#aaaaaa;
  }

  .na:hover{
    background-color: #bbbbbb;
  }

  .square{
    display: inline-block;
    width: 1em;
    height: 1em;
  }
</style>
<br>
<div class="container" id="graphContainer">
  @foreach($outcomes as $questions)

    <div class="graphRow">
      <?php
        $total = $questions->STR + $questions->SAT + $questions->NG + $questions->UNSAT + $questions->NA;
        $str = round(($questions->STR/$total)*100,5);
        $sat = round(($questions->SAT/$total)*100,5);
        $ng = round(($questions->NG/$total)*100,5);
        $unsat = round(($questions->UNSAT/$total)*100,5);
        $na = round(($questions->NA/$total)*100,5);
      ?>
      <span>{{$questions->Text}}</span><br>
      <span class="str graphBar" style="width:{{$str}}%" title="{{$questions->STR}} total students ({{$str}}%)"></span>
      <span class="sat graphBar" style="width:{{$sat}}%" title="{{$questions->SAT}} total students ({{$sat}}%)"></span>
      <span class="ng graphBar" style="width:{{$ng}}%" title="{{$questions->NG}} total students ({{$ng}}%)"></span>
      <span class="unsat graphBar" style="width:{{$unsat}}%" title="{{$questions->UNSAT}} total students ({{$unsat}}%)"></span>
      <span class="na graphBar" style="width:{{$na}}%" title="{{$questions->NA}} total students ({{$na}}%)"></span>
    </div>
  @endforeach
  <br>
</div>
<span class="quarter">0%</span>
<span class="quarter">25%</span>
<span class="quarter">50%</span>
<span class="quarter">75%<span style="text-align: right; float: right;">100%</span></span>
<form class="" action="index.html" method="post">

</form>
<div class="row">
  <div class="col-sm-2">
    <span class="square str strh">
    </span>
    <p>Strong</p>
  </div>
  <div class="col-sm-2">
    <div class="square sat">
    </div>
    <p>Satisfactory</p>
  </div>
  <div class="col-sm-2">
    <div class="square ng">
    </div>
    <p>Needs Growth</p>
  </div>
  <div class="col-sm-2">
    <div class="square unsat">
    </div>
    <p>Unsatisfactory</p>
  </div>
  <div class="col-sm-2">
    <div class="square na">
    </div>
    <p>Not Applicable</p>
  </div>
</div>
