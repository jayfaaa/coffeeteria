<?php if($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> 
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php } ?>
<div style="width: 100%;z-index: 1;">

<center>
<div style="width: 70%; margin-top: 10px; ">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/images/11.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/images/22.jpg" alt="Second slide">
    </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/images/3.jpg" alt="Third slide">
    </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url();?>assets/images/4.jpg" alt="Fourth slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

<ul class="carousel-indicators" >
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="margin-left: 1000px; margin-top: -200px;"><img src="<?php echo base_url();?>assets/images/s1.png"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active" style="margin-left: 160px; margin-top: -200px;"><img src="<?php echo base_url();?>assets/images/s2.png"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active" style="margin-left: 160px; margin-top: -200px;"><img src="<?php echo base_url();?>assets/images/s3.png"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3" class="active" style="margin-left: 160px; margin-top: -200px;"><img src="<?php echo base_url();?>assets/images/s4.png"></li>
 </ul>

</div>
</center>
</div>
<br>
<br>
<br>



