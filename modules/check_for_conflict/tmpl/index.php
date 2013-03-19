<?php
	$pending = API::execute('jom/get_all_pending',array());
	$approve = API::execute('jom/get_all_approve',array());
?>
<div id='conflict_div' class='module'>
	<?php 
		foreach($pending['data'] as $p){
			foreach($approve['data'] as $a){
				if(
					($a['endDate']>=$p['startDate']&&$a['startDate']<=$p['endDate'])||
					($p['endDate']>=$a['startDate']&&$p['startDate']<=$a['endDate'])||
					($a['endDate']>=$p['endDate']&&$a['startDate']<=$p['startDate'])||
					($p['endDate']>=$a['endDate']&&$p['startDate']<=$a['startDate'])
				){
					echo $p['title'].' conflict with '.$a['title'];?></br><?php
				}
			}
			
		}
	?>
</div>
