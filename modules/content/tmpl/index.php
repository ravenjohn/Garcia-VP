<div id="footer_div">
 Hi! Imma footer :)
 <br />
 <table border="1">
<?php $result = API::execute('info/get_users',array());
	foreach($result['data'] as $user){?>
		<tr>
		<td>
	<?php
		echo $user['username']." | ".$user['password'];?>
		</td>
		</tr>
	<?php }
?>
 </table>
</div>