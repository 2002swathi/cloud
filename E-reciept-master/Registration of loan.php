<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['save']))
{

		 $fname=$_POST['fname']; 
		 $lname=$_POST['lname'];
		 $aadharno=$_POST['aadharno'];
		 $isdt=$_POST['isdt'];
            $loan=$_POST['loan'];
		 $ip=$_POST['ip'];
		 $ir=$_POST['ir'];
		 $email=$_POST['email'];
		 $ph=$_POST['ph'];
		 $ad=$_POST['ad'];
		 $pc=$_POST['pc'];
$sql = "INSERT INTO myguest (fname, lname,aadharno, isdt, loan, ip,ir,email, ph,ad,pc)
VALUES ('$fname',
		'$lname',
		'$aadharno',
		'$isdt',
		'$loan',
		'$ip',
		'$ir',
		'$email',
		'$ph', 
		'$ad',
		'$pc');";

if (mysqli_query($conn, $sql)) {
    echo "New Details inserted";
}
else
{
 echo "Error";
}
mysqli_close($conn);
}
?>