<table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
						<th>Unit</th>
                        <th>Product Name</th>
						<th>Price</th>
						<th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		include('../dist/includes/dbcon.php');
		$query=mysqli_query($con,"select * from temp_trans natural join product")or die(mysqli_error());
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				$id=$row['temp_trans_id'];
				$total= $row['qty']*$row['price'];
				$grand=$grand+$total;
		
?>
                      <tr >
						<td class="show"><?php echo $row['qty'];?></td>
						<td><?php echo $row['prod_unit'];?></td>
                        <td class="record"><?php echo $row['prod_name'];?></td>
						<td><?php echo $row['price'];?></td>
						<td style="text-align:right"><?php echo number_format($total,2);?></td>
                        <td>
							
							<a href="transaction_del.php?id=<?php echo $row['temp_trans_id'];?>"><i class="glyphicon glyphicon-trash text-red"></i></a>
						</td>
                      </tr>
					

<?php }?>					  
                    </tbody>
                    
                  </table>
				  
				  <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "transaction_del.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});
</script>