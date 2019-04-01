

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























