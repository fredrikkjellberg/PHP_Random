
<!-- Three different types of variable assignment -->
<?php
$mycounter = 1;
$mystring = "Hello";
$myarray = array("One", "Two", "Three"); ?>


<!-- simple PHP program -->
<?php 
$username = "Fred Smith"; echo $username;
echo "<br />"; $current_user = $username; echo $current_user;
?>

<!-- array -->
<?php
$oxo = array(array('x', '', 'o'),
			 array('o', 'o', 'x'), 
			 array('x', 'o', '' ));￼￼￼￼￼
?>

<!-- Alternative multiline echo statement 
$author = "Alfred E Newman";
echo <<<_END
		This is a Headline
		This is the first line. This is the second.
		- Written by $author. 
		_END;
-->

<!--Automatically converting a string to a number-->
<?php
$pi = "3.1415927";
$radius = 5;
echo $pi * ($radius * $radius); 


// define root for server 
define("ROOT_LOCATION", "/usr/local/www/");

//The question mark is simply a way of interrogating whether variable $b is TRUE or FALSE. 
// Whichever command is on the left of the following colon is executed if $b is TRUE, 
// whereas the command to the right is executed if $b is FALSE.
$b ? print "TRUE" : print "FALSE";



?>

<?php
//simple php function
function longdate($timestamp)
{
return date("l F jS Y", $timestamp);
} 

// will output the function
echo longdate(time());
?>

<?php
	// gobal variable as a local variable
	$temp = "The date is ";
	echo $temp . longdate(time());
	function longdate($timestamp) {
	return date("l F jS Y", $timestamp); }
?>

<?php
//Example 3-15 moves the reference to $temp out of the function. The reference appears
//in the same scope where the variable was defined.
//Example 3-16. An alternative solution: passing $temp as an argument
$temp = "The date is ";
echo longdate($temp, time());
function longdate($text, $timestamp) {
return $text . date("l F jS Y", $timestamp); }
?>

<?php
// static is the same as private in c++ and pyhthon
function test()
{
static $count = 0; 
echo $count; 
$count++;
}

static $int = 0; // Allowed
static $int = 1+2; // Disallowed (will produce a Parse error) 
static $int = sqrt(144); // Disallowed

//
// y = 3(abs(2x) + 4)
// which in PHP would be written as:
$y = 3 * (abs(2*$x) + 4);



 ?>

 <?php
 // php switch statment 
	switch ($page) 
		{
		case "Home": 
			echo "You";
			break; 
		case "About": 
			echo "You";
			break; 
		case "News":
			echo "You";
		 }
?>


<?php
// print hello in spesific color
printf("<font color='#%X%X%X'>Hello</font>", 65, 127, 245);

//The result is $10.29
printf("The result is: $%.2f", 123.42 / 12);


echo "<pre>"; // Enables viewing of the spaces
// Pad to 15 spaces
printf("The result is $%15f\n", 123.42 / 12);
// Pad to 15 spaces, fill with zeros
printf("The result is $%015f\n", 123.42 / 12);
// Pad to 15 spaces, 2 decimal places precision printf("The result is $%15.2f\n", 123.42 / 12);
// Pad to 15 spaces, 2 decimal places precision, fill with zeros printf("The result is $%015.2f\n", 123.42 / 12);
// Pad to 15 spaces, 2 decimal places precision, fill with # symbol
printf("The result is $%'#15.2f\n", 123.42 / 12); 

?>


<?php

// Reading a file with fgets

$fh = fopen("testfile.txt", 'r') or
die("File does not exist or you lack permission to open it"); $line = fgets($fh);
fclose($fh);
echo $line;

// Reading a file with fread

$fh = fopen("testfile.txt", 'r') or
die("File does not exist or you lack permission to open it"); $text = fread($fh, 3);
fclose($fh);
echo $text;
?>

<?php 
// update.php updates the text file
$fh = fopen("testfile.txt", 'r+') or die("Failed to open file"); $text = fgets($fh);
fseek($fh, 0, SEEK_END);
fwrite($fh, "$text") or die("Could not write to file"); fclose($fh);
echo "File 'testfile.txt' successfully updated";
?>

<?php
// Updating a file with file locking
$fh = fopen("testfile.txt", 'r+') or die("Failed to open file"); $text = fgets($fh);
if (flock($fh, LOCK_EX)) {
fseek($fh, 0, SEEK_END);
fwrite($fh, "$text") or die("Could not write to file"); flock($fh, LOCK_UN);
}
fclose($fh);
echo "File 'testfile.txt' successfully updated"; ?>




