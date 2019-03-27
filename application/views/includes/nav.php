<nav class="navbar navbar-expand-lg" style="background-color: rgb(49,49,49);">
  <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/images/coffeeteria.png');?>" style="width:  30%;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: -12%;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('blogs');?>" style="color: rgb(235,235,235); font-size: 100%; margin-left: 50%">BROWSE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('blogs');?>" style="color: rgb(235,235,235); font-size: 100%; margin-left: 50%">UPDATES</a>
      </li>
    </ul>
  <?php if (!(isset($_SESSION['logged_in']))) { ?>
    <li class="nav-item" style="">
        <div class="dropdown" style="float:right; z-index: 10;">
              <button onclick="myFunction()" class="dropbtn" style=" background-color: transparent; border: 1px solid #fff; border-radius: 10px; color: rgb(235,235,235); font-size: 80%; margin-top:20%;">LOG IN </button>
              <div class="dropdown-content" style="border-radius:10px; padding: 25px;" id="myDropdown">
                <center>
                <form action="<?php echo base_url('login_user');?>" method="POST">
                  <p style="text-align:center "> Log in </p>
                  <input style="border-radius:10px; margin-bottom: 10px;" type="text" name="email" placeholder="Email"><br>
                  <input style="border-radius:10px; margin-bottom: 10px;" type="password" name="password" placeholder="Password"><br>
                  <input type="submit" class="btn btn-secondary" class="btn btn-secondary" value="Login">
                  </form>
                  <a href="<?php echo base_url('users');?>">Register</a>
                </center>
            </div>
        </div>
      </li>
    <?php } else {?>
      <li class="nav-item" style="">
                <center>
                <p style="color: white;"><?php echo $_SESSION['email']; ?></p>
                </center>
      </li>
    <?php } ?>
      <li class="nav-item">
        <div class="dropdown2" style="float:left;">
              <button  class="dropbtn2" style="background-color: transparent; background-image: url(<?php echo base_url();?>assets/images/menu.png); background-repeat: no-repeat; background-size: 50px  50px; height: 50px; width: 50px; margin-top: 10px; margin-left: 20px"></button>

              <div class="dropdown-content2" style="border-radius:10px; margin-left: -5%;" >
                <a href="#" >Report</a>
                <a href="<?php echo base_url('contact');?>" >Contact us</a>
                <a href="<?php echo base_url('about');?>" >About us</a>
                <?php if (isset($_SESSION['logged_in'])) { ?>
                <a href="<?php echo base_url('logout');?>" >Logout</a>
              <?php } ?>
            </div>
        </div>
      </li>

  </div>
  </div>
</nav>
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/j/test.js'); ?>" ></script>
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
