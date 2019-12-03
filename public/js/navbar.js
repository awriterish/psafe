//classes array will be imported to her based on which teacher accesses the page
//recieve current teacher id, call database for relevant class names
var classes = ["CSCI 340 (domain)", "CSCI 340 (domain)", "CSCI 410 (domain)", "CSCI 490 (domain)"];
var i;
var text;
for (i = 0; i < classes.length; i++) {
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file"></span>
      text = classes[i];
    </a>
  </li>
  document.getElementById("navbar").innerHTML += text;
}
