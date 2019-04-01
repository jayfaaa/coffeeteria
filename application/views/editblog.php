<?php foreach ($blogpost as $blog):  ; ?>
<div style="width: 20%; margin: 30px;"><h1>Edit Article</h1>
  </div>
  <div style="width: 94%; height: 100%; padding-bottom: 20px; margin: 50px; background-color: rgb(49,49,49);">
<br>

<form style="margin: 15px; padding: 20px;" action="<?php echo base_url('blogs/');?><?php echo $blog['id']; ?>" method="POST">
	<h1 style="color: white;"> Title </h1>
 <input size="70px" type="text" name="title" placeholder="Article Title" value="<?php echo $blog['title']; ?>" style="height: 65px; font-size: 25px;  border-radius: 5px">
<br>
<h1 style="color: white"> Body </h1> 
<textarea name="body"  style="height:550px; max-width:1700px; width: 1700px; resize: none;  border-radius: 5px ">
	<?php echo $blog['body']; ?>
</textarea>
<center>
<input type="submit"  value="Publish" style="margin:10px;height: 50px; font-size: 25px;  border-radius: 5px"></form>
</center>
</form>
<?php endforeach; ?>
</div>