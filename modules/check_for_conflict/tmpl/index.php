<?php
	$result = API::execute('jom/view_pending',array());
	$conflict = API::execute('jom/check_for_conflict',array()); 
	$similar = API::execute('jom/find_similar', array());  
	
	
?>

<div id="check_for_conflict_div">
<h3>Check for Conflict</h3>
 <br />
 <form method="POST" class="form ">
 <table class="table table-bordered" id="check_for_conflict_table">
	<?php
		if(empty($result['items'])){
			echo "<tr><td> No requests. </td></tr>";
		}else{
			foreach($result['data'] as $p){?>
				<tr>
				<td><?php echo $p["id"]?></td>
				<td><?php echo $p["username"]?></td>
				<td><?php echo $p["packageName"]?></td>
				<td><?php echo $p["startDate"]?></td>
				<td><?php echo $p["endDate"]?></td>
				<td><?php echo $p["location"]?></td>
				<td><?php echo $p["additionalRequest"]?></td>
				<td><?php echo $p["status"]?></td>
				
				<?php
					foreach($conflict["data"] as $c){
						if($p["id"] == $c["id"]){
							echo "<td>CONFLICT!</td>";
						}
					}
					
					foreach($similar["data"] as $s){
						if($p["id"] == $s["id"]){
							echo "<td>CONFLICT! Similar dates.</td>";
						}
					}
				?>
				</tr>
	<?php }}
	?>
 </table>
 </form>
</div>