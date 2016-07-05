<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="vorlesungsUebersicht.php">
				<img alt="Brand" src="pictures/LiveLecture.001.jpeg">
			</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="dozentProfil_form.php"><span class="glyphicon glyphicon-user"></span><span
							class="nav-text"><?php echo $dozent->vorname . " " . $dozent->nachname; ?></span></a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span><span
							class="nav-text">Logout</span></a></li>
			</ul>
		</div>
	</div>
</nav>
