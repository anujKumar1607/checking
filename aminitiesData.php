<?php
require_once "connection.php";

if(isset($_POST["products"]))
{
	//echo "RESPONSE = ".$_POST["products"];
	$pid=$_POST["products"];
	$insert=mysqli_query($connect,"SELECT * from aminities where product_id='$pid'");
	$count=mysqli_num_rows($insert);
	?>
	<button type="button" class="btn btn-primary"><?php echo "Total Records Found ".$count; ?></button>

	<br><br>
	<?php
	
	if(mysqli_num_rows($insert)>0)
	{
		echo "<table class='table table-responsive' id='dataTable' style='font-size:16px; background-color:lightblue;'><tr><th>Aminities ID</th><th>Product Id</th><th>Features</th><th><a herf=''>Edit</a></th><th><a herf=''>Update</a></th></tr><tbody id='tableDataBody'>";
		while($dis=mysqli_fetch_assoc($insert))
		{
			?>

			<tr id="<?php echo $dis["aminities_id"];?>">
			<td id="aminitiesId<?php echo $dis["aminities_id"];?>"><?php echo $dis["aminities_id"];?></td>
			<td id="productId<?php echo $dis["aminities_id"];?>"><?php echo $dis["product_id"];?></td>
			<td id="featuresId<?php echo $dis["aminities_id"];?>"><?php echo $dis["features"];?></td>
			<td id="editButton<?php echo $dis["aminities_id"];?>"><button type="button" onClick="editRow(<?php echo $dis["aminities_id"];?>)"><i class="fa fa-edit"></i></button></td>
			<td id="deleteButton<?php echo $dis["aminities_id"];?>"><button type="button" onClick="deleteRow(<?php echo $dis["aminities_id"];?>)"><i class="fa fa-trash"></i></button></td>		
			</tr>
			<?php
		
		}
		echo "</tbody></table>";
	}
}

if(isset($_POST["features"]) and isset($_POST["id"]))
{
	$features=$_POST["features"];
	$id=$_POST["id"];
	$editRecord=mysqli_query($connect,"UPDATE aminities SET features='$features' where aminities_id='$id'");
	if($editRecord)
	{
		echo "done";
		exit();
	}

}
if(isset($_POST["productId"]) and isset($_POST["newFeature"]))
{
	$productId=$_POST["productId"];
	$feat=$_POST["newFeature"];
	$insertRecord=mysqli_query($connect,"INSERT INTO aminities(product_id, features) VALUES('$productId', '$feat')");
	if($insertRecord)
	{
		echo("inserSuccess");
		$lastId=mysqli_insert_id($connect);
		//echo($lastId);
		?>
			<tr id="<?php echo $lastId;?>">
			<td id="aminitiesId<?php echo $lastId;?>"><?php echo $lastId;?></td>
			<td id="productId<?php echo $lastId;?>"><?php echo $productId;?></td>
			<td id="featuresId<?php echo $lastId;?>"><?php echo $feat;?></td>
			<td id="editButton<?php echo $lastId;?>"><button type="button" onClick="editRow(<?php echo $lastId;?>)"><i class="fa fa-edit"></i></button></td>
			<td id="deleteButton<?php echo $lastId;?>"><button type="button" onClick="deleteRow(<?php echo $lastId;?>)"><i class="fa fa-trash"></i></button></td>

		<?php
	}
}

if(isset($_POST['aminities_id']))
{
	$id=$_POST["aminities_id"];
	$sql=mysqli_query($connect,"DELETE from aminities where aminities_id='$id'"); 
	if($sql)
	{
		echo "success";
		exit();
	}
}
?>