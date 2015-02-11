<!--
Created by Colleen Kimball
October, 2013
Ithaca, NY

This program sets up an HTML form that allows a user to choose preferences for the site. The preferences are saved in a cookie
so that they remain on the page even if the user leaves and returns
 -->


<?php 
	if ($_POST['font']!=""){
		$value = $_POST['font'];
		$expiration = time()+3600*24*60;
		$domain = "jimi.ithaca.edu";
		// send a simple cookie
		setcookie("font_cookie",$value, $expiration,$domain);
		}
	if ($_POST['color']!=""){
		$value = $_POST['color'];
		$expiration = time()+3600*24*60;
		$domain = "jimi.ithaca.edu";
		// send a simple cookie
		setcookie("colorCookie",$value, $expiration,$domain);
		}
	if ($_POST['text']!=""){
		$value = $_POST['text'];
		$expiration = time()+3600*24*60;
		$domain = "jimi.ithaca.edu";
		// send a simple cookie
		setcookie("text_cookie",$value, $expiration,$domain);
		}
?>
<html>
	<head>
		<title>Cookie Lab</title>
	</head>
		<style>
			body {<?php echo($_COOKIE["colorCookie"]);?>;<?php echo($_POST['color']);?>;}
			div {<?php echo($_COOKIE["font_cookie"]);?>;<?php echo($_POST['font']);?>;
				<?php echo($_COOKIE["text_cookie"]);?>;<?php echo($_POST['text']);?>;}
		</style>
		<body>
		<div>
	
		<form method="post" action="cookie.php">
		<h1>Set User-Preferences</h1>
		
		Font Size: <br>
		<ul>
		<li><input type="radio" name="font" value="font-size:12px">Small</li>
		<li><input type="radio" name="font" value="font-size:17px">Medium</li>
		<li><input type="radio" name="font" value="font-size:22px">Large</li>
		</ul>
		Font Decoration:<br>
		<ul>
		<li><input type="radio" name="text" value="text-shadow:2px 2px gray">Drop Shadow</li>
		<li><input type="radio" name="text" value="text-decoration:underline">Underline</li>
		<li><input type="radio" name="text" value="text-decoration:none">No decoration</li>
		</ul>
		Background Color: <br>
		<ul>
		<li><input type="radio" name="color" value="background-color:#E57EE5">Purple</li>
		<li><input type="radio" name="color" value="background-color:#A3FF75">Green</li>
		<li><input type="radio" name="color" value="background-color:#FFFF5C">Yellow</li>
		</ul>
		<input type="submit" name="submit" value="Submit">
		</form>
		<?php
			if (isset($_POST['submit'])){
				
				header('Location: '.$_SERVER['REQUEST_URI']);
			}
		?>
		</div>
	</body>
</html>
