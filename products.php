<html>
	<style>
		table{
			margin-left:25%;
			width:50%;
			}
	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		width:20%;
			}

	tr:nth-child(even) {
		background-color: #dddddd;
			}
			
	.product_table_img{
		width:40%;
		}
</style>
	
<?php
include "header.php";
?>
<table>
<tr>
<th>Name</th>
<th>Price</th>
<th>Unit</th>
<th>Quantity</th>
<th>Image</th>
<th>Action</th>
</tr>

<?php
$product_query="select * from productDetails";
$prod_obj=mysqli_query($conn,$product_query);
while ($data= mysqli_fetch_assoc($prod_obj)){
?>
<tr>
<td><?=$data['name']?></td>
<td><?=$data['price']?></td>
<td><?=$data['unit']?></td>
<td><?=$data['quantity']?></td>
<td><img class="product_table_img" src="<?=BASEURL?>product_images/<?=$data['image']?>"</td>
<td>Edit|Delete</td>
</tr>
<?php
}
?>
</table>


</html>
