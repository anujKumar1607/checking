<?php
include_once "admin-header.php";
include "connection.php";
?>
<div class="container">
	<div class="row">

		<div class="col-md-12 col-xl-12 col-lg-12 col-sm-12">
			<form name="form1" action="" id="form1" method="post" enctype="multipart/form-data" >
				<table class="table table-responsive" style="font-size:16px;">
					<tr>
						<td>select product Name</td>
						<td>
							<select name="products" class="form-control" id="products" style="border:1px solid black;">
							<option value="">Select</option>
							<?php
							$query=mysqli_query($connect,"select product_id, product_name from product_details");
							while($row=mysqli_fetch_array($query))
							{
							?>
							<option value="<?php echo $row["product_id"]."|".$row["product_name"]; ?>"><?php echo $row["product_name"]; ?></option>
							<?php	
							}
							?>
							</select>
						</td>
					</tr>

				</table>

				<div id="result" style="font-size:16px;" >

				</div>
				<div class="table table-borderless aminities" style="display:none;" style="font-size:16px;">
					
					<input type="text" id="newFeature" name="features" placeholder="Enter the Features" class="form-control" style="border:1px solid black;"/>
					<br>
					<input type="button" onClick="insertRecords()" class="btn btn-primary pull-right" value="Add Record"/><br>

				</div>
			</form>
		</div>
	</div>

	<div class="row" style="margin-top:10px;">
		<div class="col-md-12 col-xl-12 col-lg-12 col-sm-12">
			<button class="btn btn-primary add-aminities pull-right">Add Aminities</button>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/aminitiesajax.js"></script>
</body>
</html>