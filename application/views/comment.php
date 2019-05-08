
<?php foreach ($blogpost as $post): ; 
?>

<div style="width: 100%; float: left; margin-bottom: 10%;background-color: rgb(49,49,49);">
<center><img width="50%" src="<?php echo base_url('assets/images/');?><?php echo $post['image']?>">
</center>
 

<div style="width: 100%;  background-color: rgb(49,49,49); color: #ffffff;padding-left: 2%; padding-right: 2%;">

<center><h1><?php echo $post['title']; ?></h1></center>

<br>

<div class="form-group purple-border">

  <div style="background-color: transparent;word-wrap: break-word;"><p><?php echo $post['body']; ?></p></div>
</div>
</div></div>
 <br>
 <h2>Comments</h2>

 <?php if($this->session->flashdata('success_add_comment')) { ?>
    <div class="alert alert-success">
        <strong>Success!</strong> <?php echo $this->session->flashdata('success_add_comment'); ?>
    </div>
  <?php } ?>

<?php if($this->session->flashdata('error_add_comment')) { ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> 
        <?php echo $this->session->flashdata('error_add_comment'); ?>
    </div>
<?php } ?>
<?php foreach ($comments as $comment): ;?>
  <div style="background-color: #707172">
<img width="96px"  src="<?php echo base_url('assets/images/avatar/');?><?php echo strtoupper(substr($comment['email'],0,1)).".PNG";?>" style="float: left;">
 &nbsp;&nbsp; <a href="#" style="text-decoration: none; color: #ffffff"><?php if ($comment['email'] == $_SESSION['email']) {
  echo "YOU" ; } else {
  echo $comment['email']; } ?></a>
<br><p>&nbsp;&nbsp;<?php echo $comment['comment'] ?></p>
<label>&nbsp;&nbsp;Posted on: <?php echo $comment['date'] ?></label>
<?php if (isset($_SESSION['admin'])) { ?>
   <a class="btn btn-danger" type="submit" href="<?php echo base_url('blogs/'); ?><?php echo $post['id']."/dc/".$comment['id'];?>"> Delete </a> 
<?php } else if ($comment['email'] == $_SESSION['email']) { ?>
   <a class="btn btn-danger" type="submit" href="<?php echo base_url('blogs/'); ?><?php echo $post['id']."/dc/".$comment['id'];?>"> Delete </a> 
<?php } ?>
  </div>
  <br><br>
<?php endforeach; ?>

<?php endforeach; ?>

<br>
  <div style="background-color: #8f9091;">
<img width="50px" height="50px" src="<?php echo base_url('assets/images/avatar/');?><?php echo strtoupper(substr($_SESSION['email'],0,1)).".PNG";?>" style="float: left;">
 &nbsp;&nbsp; <a href="#" style="text-decoration: none; color: #ffffff"><?php echo $_SESSION['email']?></a>
 <form method="POST" action="<?php echo base_url('blogs/');?><?php echo $post['id']."/comments"?>">
<br> &nbsp;&nbsp;
<textarea style="resize: none;" rows="3" cols="90"onkeyup="textCounter(this,'counter',250);" name="comment" placeholder="What do you think?">
</textarea>


<input disabled  maxlength="250" size="3" value="250" id="counter">

<input type="submit" class="btn btn-primary">
  </div>

<br><br><br>

</div>
</div>
</div>


</div>

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














