
var isTableComplete=false;
var areMethodsChosen=false;
function verifySubmission() {
  if((isTableComplete)&&(areMethodsChosen)){
    console.log("yay you did it :) redirecting...");
  }
  else{
    createToast();
    $('.toast').toast('show');
  }
}
function createToast(){
$('#errorMsg').html('custom error msg');
}
