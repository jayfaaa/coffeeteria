<div style="width: 20%; margin: 30px;"><h1>Create Article</h1>
  </div>
  <div style="width: 94%; height: 100%; padding-bottom: 20px; margin: 50px; background-color: rgb(49,49,49);">
<br><br>

<form style="margin: 15px; padding: 20px;" action="<?php echo base_url('add_blog');?>" method="POST">
 <input size="70px" type="text" name="title" placeholder="Article Title" style="height: 65px; font-size: 25px;  border-radius: 5px">

<input type="file"  name="image" value="Upload Image" style="background-color: rgb(240,240,240); margin:10px;  font-size: 25px;  border-radius: 5px">


<br><br>
<textarea name="body"  style="height:550px; max-width:1700px; width: 1700px; resize: none;  border-radius: 5px " placeholder="Write something..">
</textarea>

<center>
<input type="submit"  value="Publish" style="margin:10px;height: 50px; font-size: 25px;  border-radius: 5px"></form>
</center>
</form>



</div>