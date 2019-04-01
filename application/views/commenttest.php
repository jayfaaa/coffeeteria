
<div class="container">

    <div id="carouselContent" class="carousel slide" data-ride="carousel">
  
        <div class="carousel-inner" role="listbox">
                <div class="zoom">
            <div class="carousel-item active text-center p-4">
                 <a href="#">2005</a>
                 <a href="#">2006</a>
                 <a href="#">2007</a>
                 <a href="#">2008</a>
                 <a href="#">2009</a>
            </div>
            <div class="carousel-item text-center p-4">
                
               <a href="#">2010</a>
               <a href="#">2011</a>
               <a href="#">2012</a>
               <a href="#">2013</a>
               <a href="#">2014</a>

            </div>
            <div class="carousel-item text-center p-4">
                 <a href="#">2015</a>
                 <a href="#">2016</a>
                 <a href="#">2017</a>
                 <a href="#">2018</a>
                 <a href="#">2019</a>

            </div>
            <div class="carousel-item text-center p-4">
                 <a href="#">2020</a>
                 <a href="#">2021</a>
                 <a href="#">2022</a>
               </div>
               
</div>

        </div>

       <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"><img src="<?php echo base_url(); ?>assets/images/left.png" width="20px" height="20px"/></span>
            <span class="sr-only">Previous</span>
          
        </a>
        <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
            <span class="carousel-control-next-icon"><img src="<?php echo base_url(); ?>assets/images/RIGHT.png" width="20px" height="20px"/></span>
            <span class="sr-only">Next</span>
        </a>

</div>


<?php foreach ($blogpost as $post): ; 
?>

<div style="width: 100%; float: left; margin-bottom: 5%; border: 1px solid black">
<center><img width="50%" src="<?php echo base_url('assets/images/');?><?php echo $post['image']?>">
</center></div>
<div style="width: 100%; border: 1px solid red;">
<center><h4><?php echo $post['title']; ?><h4></center>
</div>
<br>
<div class="form-group purple-border">

  <div style="background-color: transparent; border: 2px solid; word-wrap: break-word;"><p><?php echo $post['body']; ?></p></div>
</div>

 <br>



  <div style="background-color: transparent; border: 1px solid black">
<img width="50px" height="50px" src="<?php echo base_url('assets/images/');?><?php echo $post['image']?>" style="float: left;">
 &nbsp;&nbsp; <a href="#" style="text-decoration: none; color: #686868">@JulesBekshop</a>
<br><p>&nbsp;&nbsp; Cegurado ba gyud ka nga wa kay laeng lakaw laeng lakaw
cegurado ba gyud ka nga way mo palag mo ayaw mo palag
ky we be up all night, all night long
girl nobody had it turned you on
ky we be up all night, all night long
girl nobody had it make you moan.</p>

  </div>
  <br><br>


  <div style="background-color: transparent; border: 1px solid black">
<img width="50px" height="50px" src="<?php echo base_url('assets/images/');?><?php echo $post['image']?>" style="float: left;">
 &nbsp;&nbsp; <a href="#" style="text-decoration: none; color: #686868">@jaayceeV1</a>
<br><p>&nbsp;&nbsp; Miss pretty pretty please
Pwede ba mo-kawat bisan usa ka kiss?
And baby together lets savor this moment
Realness we roll it
Paradise we on it
Coz' that body is a wonderland
Pisting lawasa ga halang
Coz' that body is a wonderland
Pisting lawasa ga halang

 </p>

  </div>

<br>
  <div style="background-color: transparent; border: 1px solid black">
<img width="50px" height="50px" src="<?php echo base_url('assets/images/');?><?php echo $post['image']?>" style="float: left;">
 &nbsp;&nbsp; <a href="#" style="text-decoration: none; color: #686868">@jaayceeV1</a>
<br> &nbsp;&nbsp;<textarea style="resize: none;" rows="3" cols="90"onkeyup="textCounter(this,'counter',250);" id="message">
What do you think?</textarea>


<input disabled  maxlength="250" size="3" value="250" id="counter">

<a href="#" class="btn btn-primary"> Submit </a>
  </div>

<br><br><br>

</div>
</div>
</div>
<?php endforeach; ?>

<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>














