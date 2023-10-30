
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


$adno=$_POST["aadharno"];
$sql = "SELECT fname, lname, loan,isdt,aadharno,email,ad,ph,ip,ir,pc FROM MyGuest  WHERE aadharno=$adno";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {        		 
echo '
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css"> 
<script>
function printPage() {
  window.print();
}
</script>

<style>
html{
  background-image:url("white.jpg");
}
table, th, td {
    border: 5px solid black;
    border-collapse: collapse;
	
}
th, td,tr {
    padding: 5px;
    text-align: center;
}
table{
    width: 100%;    
}
tbody tr:hover {
  background: #862d59;
}
</style>
</head>
<body>
<p><font size="25" color =#ffff80>Confirm your details</font></p>
<p id="demo"></p>

<script>
document.getElementById("demo").innerHTML = Date();
</script>
<table style="width:60%">
  <tr>
    <th>Firstname</th>
    <th>'.$row["fname"].'</th>  
  </tr>
  
  <tr>
    <td>Last Name</td>
    <td>'.$row["lname"].'</td>
  </tr>
  <tr>
    <td>Aadhar Number</td>
    <td>'.$row["aadharno"].'</td>
  </tr>
  <tr>
    <td>Loan Amount:</td>
    <td>Rs.'.$row["loan"].'</td>  
  </tr>
  <tr>
    <td>Issue Date</td>
    <td>'.$row["isdt"].'</td>  
  </tr>
  <tr>
    <td>Loan Period(in terms of months)</td>
    <td>'.$row["ip"].'</td>  
  </tr>
  <tr>
    <td>Interest Rate(per anum)</td>
    <td>'.$row["ir"].'%</td>  
  </tr>  
   <tr>
    <td>Email Id</td>
    <td>'.$row["email"].'</td>  
  </tr>
  
   <tr>
    <td>Contact Number</td>
    <td>'.$row["ph"].'</td>  
  </tr>
  
   <tr>
    <td>Address ....</td>
    <td>'.$row["ad"].'</td>  
  </tr>
  
   
  
   <tr>
    <td>Pin Code</td>
    <td>'.$row["pc"].'</td>  
  </tr>

</table>
<br>
<input type="button" value="Print this page"  onclick="printPage()"/>
</body>
</html>';

    }
} else {
    echo '<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>OOPs</title>	
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/stylegood.css">
<p><font size="25" color =#ffff80>Sorry,the Aadhar number <font color=red> '.$adno.'</font> not found on the database!</font></p>
</head>
<a class="button" href="index.html">HOME</a>
</body>
</html>';
}

mysqli_close($conn);
?>
