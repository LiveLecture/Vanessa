<?php
	require_once("Mapper/Data.php");
	require_once("Mapper/Dozent.php");
?>

<footer class="footer">
	<div class="container col-sm-12 inhalt-vertical-mittig">
		<div class="col-sm-offset-9 col-sm-1">
			<a href="impressum.php" <?php if(isset($active) && $active == 'impressum') echo "class=\"active\"" ?>>Impressum</a>
		</div>
		<div class="col-sm-1">
			<a href="datenschutz.php" <?php if(isset($active) && $active == 'datenschutz') echo "class=\"active\"" ?>>Datenschutz</a>
		</div>
		<div class="col-sm-1">
			<a href="about.php" <?php if(isset($active) && $active == 'about') echo "class=\"active\"" ?>>About</a>
		</div>
	</div>
</footer>



