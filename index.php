<?php include('header-index.php');?>

  <?php
$sql= "SELECT * FROM addbook";
$stmt = $db_con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="page_div m-b-5perc">
	<div class="container p-abs">
		<div class="row">


<div class="container">
<div class="row">
<?php
                                                foreach($result as $row)
                                            {
                                            ?>
<div class="col-xs-12 col-md-2 col-sm-2 col-lg-2 m-t-b-2perc">

       				<a href="book1.php?id=<?=$row['id'];?>">  
       				<div class="book">
					<img src='./admin/<?php echo $row['bookimage']; ?>' class="mag-img img-responsive m-auto" />
					</div>
      				</a>
					<a href="./admin/<?php echo $row['bookpdf']; ?>" target="_blank">	<button class="download_">
							DOWNLOAD</button></a>
					
</div>
<?php }?>
</div>
</div>

		</div>
	</div>
</div>

<?php include('footer.php');?>
