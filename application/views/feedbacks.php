<div>
<div style="width: 20%; margin: 30px;"><h1>Reports/Feedbacks</h1>
  </div>
  <div style="width: 94%; height: 100%; margin: 50px; background-color: rgb(49,49,49);">
<br><br>
<?php foreach ($reports as $report): ; ?>
<div style="width: 95%; height: 20%; background-color: #ffffff; margin:30px;  border-radius: 5px">
	<div style="margin: 10px;"><h2><?php echo $report['title']; ?> </h2></div>
		<label>&nbsp;&nbsp;By: <?php echo $report['email']."  ".$report['date']; ?></label>
			<div style="margin-left: 20px; word-wrap: break-word; margin-right: 2%;"><?php echo $report['body']; ?></div>
</div>
<?php endforeach; ?>
</div>
</div>