<?php
include_once '../config/db.php';
$query = "SELECT * FROM tbl_forum ORDER BY forum_id DESC";
$run = $db->query($query);
while($row = $run->fetch_array()) :

?>


<div class="chat_data">
<span style="color:green;"><?php echo $row['name'];?></span> :
<span style="color:brown;"><?php echo $row['msg'];?></span>
<span style="float:right;"><?php echo formatDate($row['date']);?></span>
</div>
<?php  endwhile;?>
