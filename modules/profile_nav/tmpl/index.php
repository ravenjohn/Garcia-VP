<?php
	$res = API::execute("raven/count_reservations",array());
	$res = $res['data'][0]['reservationCount'];
?>
<div id="profile_nav_div" class="module span9">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Hi <span class="bold"><?php echo $_SESSION['username']?>!</span></a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li>
							<a>
								Reservations <span class="badge badge-important"><?php echo $res; ?></span>
							</a>
						</li>
					</ul>
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-cog"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Edit Profile</a></li>
								<li class="divider"></li>
								<li><a href="#home" onclick="logout();">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>