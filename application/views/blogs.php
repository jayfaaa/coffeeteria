<?php if($this->session->flashdata('success_add_blog')) { ?>
    <div class="alert alert-success">
        <strong>Success!</strong> <?php echo $this->session->flashdata('success_add_blog'); ?>
    </div>
  <?php } ?>
  <?php if($this->session->flashdata('error_add_blog')) { ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> 
        <?php echo $this->session->flashdata('error_add_blog'); ?>
    </div>
<?php } ?>
<?php if($this->session->flashdata('success_edit_blog')) { ?>
    <div class="alert alert-success">
        <strong>Success!</strong> <?php echo $this->session->flashdata('success_edit_blog'); ?>
    </div>
  <?php } ?>
  <?php if($this->session->flashdata('error_edit_blog')) { ?>
    <div class="alert alert-danger">
        <strong>Error!</strong> 
        <?php echo $this->session->flashdata('error_edit_blog'); ?>
    </div>
<?php } ?>
<div style="float: right; right: 0; position: sticky; margin-right: -20%; margin-top: -5%; "><h4>
  <a style="text-decoration: none; color: black;" href="#">JANUARY<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">FEBRUARY<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">MARCH<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">APRIL<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">MAY<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">JUNE<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">JULY<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">AUGUST<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">SEPTEMBER<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">OCTOBER<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">NOVEMBER<br><br></a>
  <a style="text-decoration: none; color: black;" href="#">DECEMBER<br><br></a>
</h4>
  </div>
<?php foreach($posts as $post): ;?>
<br>
<div style="width: 100%; float: left; margin-bottom: 5%;">
<img width="20%" src="<?php echo base_url('assets/images/'); ?><?php echo $post['image'] ?>" />

<div style="width: 80% ;float: right;padding-left:1%">
<h4><?php echo $post['title']; ?></h4><br><?php echo substr($post['body'],0,20); ?>
<div style="width: 30% ;float: none; margin-top: 11%; padding-left: 1%;">
    <label> Posted on: <?php echo $post['date']; ?> </label>
   <a href="<?php echo base_url('blogs/');?><?php echo $post['id']."/comments"; ?>" class="btn btn-secondary"> Read More </a>
   <?php if (isset($_SESSION['admin'])) { ?>
   <a class="btn btn-secondary" href="<?php echo base_url('blogs/');?><?php echo $post['id']?>"> Edit </a>

   <a class="btn btn-secondary" href="<?php echo base_url('blogs/'); ?><?php echo $post['id']."/dp/";?>"> Delete </a>

<?php } ?>

    </div>
</div>
</div>

<?php endforeach; ?>
