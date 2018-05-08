<?php 
$host = "localhost";
$user = "root";
$password = "Rocky123";
$database = "assignment5";
$port = 3306;
// create connection
$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_errno) {
    exit ("Failed to connect: (" . $conn->connect_errno . ") " . $conn->connect_error );
}
// read the items for sale
$sql = "select id, name, price from items order by id";
$res = $conn->query($sql);
if (!$res) 	{
	exit ("Select failed: (" . $conn->errno . ") " . $conn->error . " sql=" . $sql);
}
?>

<!DOCTYPE html>
<html>
<body>
<h1>Welcome to my store!</h1>
<p>Items for sale.</p>
// fetch each row and display using HTML table
<table>

<?php
while ( $row = $res->fetch_assoc() ) {
    echo "<tr> <td> ".$row['id']."</td> <td>".$row['name']."</td> <td>" . $row['price']. "</td> </tr>";
}
// commit transation and close connection
$conn->commit();
$conn->close();
?>

</table>
<hr>
<form method="post" action="purchase.php">
Enter the item you wish to purchase, the quantity and your name.
<br>
<table>
<tr><td>Item number</td><td>
<input type="number" name="id"/></td></tr>
<tr><td>Quantity</td><td>
<input type="number" name="quantity"/></td></tr>
<tr><td>Name</td><td>
<input type="text" name="name"/></td></tr>
<tr><td>CODE</td><td>
<input type="text" name="code"/></td></tr>
</table>
<input type="submit" value="Place Order"/>
</table>
</form>
</body>
</html
