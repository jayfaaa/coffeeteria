<nav class="navbar navbar-expand-lg" style="background-color: rgb(49,49,49);">
  <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/coffeeteria.png" style="width:  30%;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: -12%;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('blogs');?>" style="color: rgb(235,235,235); font-size: 100%; margin-left: 10%">UPDATES</a>
      </li>
    </ul>
    <li class="nav-item" style="">
        <div class="dropdown" style="float:right;">
              <button onclick="myFunction()" class="dropbtn" style=" background-color: transparent; border: 1px solid #fff; border-radius: 10px; color: rgb(235,235,235); font-size: 80%; margin-top:20%;">LOGIN </button>
              <div class="dropdown-content" style="border-radius:10px; padding: 25px;" id="myDropdown">
                <center>
                <form action="/action_page.php">
                  <p style="text-align:center "> Log in </p>
                  <input style="border-radius:10px; margin-bottom: 10px;" type="text" name="Email" value="Email"><br>
                  <input style="border-radius:10px; margin-bottom: 10px;" type="text" name="Password" value="Password"><br>
                  <a class="btn btn-secondary" href="<?php echo base_url('blogs');?>"> Login </a>
                  </form>
                  <a href="<?php echo base_url();?>registration">Register</a>
                </center>
            </div>
        </div>
      </li>
      <li class="nav-item">
        <div class="dropdown2" style="float:left;">
              <button  class="dropbtn2" style="background-color: transparent; background-image: url(<?php echo base_url();?>assets/images/menu.png); background-repeat: no-repeat; background-size: 50px  50px; height: 50px; width: 50px; margin-top: 10px; margin-left: 20px"></button>

              <div class="dropdown-content2" style="border-radius:10px; margin-left: -5%;" >
                <a href="#" >Report</a>
                <a href="<?php echo base_url('about');?>" >Contact us</a>
                <a href="<?php echo base_url('about');?>" >About us</a>
            </div>
        </div>
      </li>

  </div>
  </div>
</nav>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");

}


// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>
