<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		if ( empty($_POST["Name"]) || empty($_POST["ID"]) || !isset($_POST["Course"])
	|| !isset($_POST["Grade"]) || empty($_POST["CreditCard"]) || !isset($_POST["cardtype"]) || !isset($_POST["Name"])
	 || !isset($_POST["ID"]) || !isset($_POST["CreditCard"]) ){
		?>

			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="./gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		// (\s|\-|[a-zA-Z])*
	} elseif ( !preg_match("/^[a-zA-Z]+((\s|\-)?[a-zA-Z]+)*$/",$_POST["Name"]) ) {
		?>

			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href="./gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
	} elseif ( (!preg_match("/^4\d{15}$/",$_POST["CreditCard"]) && $_POST["cardtype"]=="Visa") || (!preg_match("/^5\d{15}$/",$_POST["CreditCard"]) && $_POST["cardtype"]=="MasterCard") ) {
		?>

			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. <a href="./gradestore.html">Try again?</a></p>

		<?php
		# if all the validation and check are passed
		 } else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<li>Name: <?=$_POST["Name"]?> </li>
			<li>ID: <?=$_POST["ID"]?> </li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<?php $checked = processCheckbox($_POST["Course"]); ?>
			<li>Course: <?=$checked?> </li>
			<li>Grade: <?=$_POST["Grade"]?> </li>
			<li>Credit: <?=$_POST["CreditCard"]?> (<?=$_POST["cardtype"]?>) </li>
		</ul>

		<!-- Ex 3 : -->
			<p>Here are all the loosers who have submitted here:</p>
		<?php
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
			 $filename = "loosers.txt";
			 $info = $_POST["Name"].";".$_POST["ID"].";".$_POST["CreditCard"].";".$_POST["cardtype"]."\n";
			 file_put_contents($filename, $info , FILE_APPEND);
		?>

		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
			 <?php $getfile = file_get_contents($filename); ?>

			 <pre><?=$getfile?></pre>

		<?php
		 }
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				return implode(", ",$names);
			}
		?>

	</body>
</html>
