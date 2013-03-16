<div id="approve_reservation_div">
<h3>Approve Reservation</h3>
 <br />
 <form method="POST" action="<?php echo RConfig::ajax_url?>approve_reservation" onsubmit="return approve_reservation(this);" class="form">
 	<input type="number" name="id" max="11" min="1" placeholder="ID" required="required"/>
 	<input type="text" name="username" max="64" min="8" placeholder="Username" required="required"/>
 	<input type="submit" value="Approve" class="btn btn-primary"/>
 </form>
</div>