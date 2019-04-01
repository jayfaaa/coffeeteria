
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


<?php foreach ($comments as $comment): ;?>
  <div style="background-color: transparent; border: 1px solid black">
<img width="96px"  src="<?php echo base_url('assets/images/avatar/');?><?php echo strtoupper(substr($comment['email'],0,1)).".PNG";?>" style="float: left;">
 &nbsp;&nbsp; <a href="#" style="text-decoration: none; color: #686868"><?php if ($comment['email'] == $_SESSION['email']) {
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
  <div style="background-color: transparent; border: 1px solid black">
<img width="50px" height="50px" src="<?php echo base_url('assets/images/avatar/');?><?php echo strtoupper(substr($_SESSION['email'],0,1)).".PNG";?>" style="float: left;">
 &nbsp;&nbsp; <a href="#" style="text-decoration: none; color: #686868"><?php echo $_SESSION['email']?></a>
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














