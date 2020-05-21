<!DOCTYPE html>
<html>
<head>
<!-- https://www.w3schools.com/css/css_table.asp -->

<style type="text/css">

table
{
border: 2px solid #471d31;
width: 100%;
color: #471d31;
font-family: Verdana;
font-size: 16px;
text-align: center;
}

th {
background-color: #471d31;
color: #ffffff;
font-size: 16px;
}

td {
border: 1px solid #471d31;
}


tr{background-color: #EEE2DC;}

input[type=text] {
  width: 20%;
  padding: 4px;
  border: 1px solid #ccc;
  border-radius: 8px;
}

.btn {
  background-color: #78244c;
  color: white;
  padding: 4px;
  margin: 10px 0;
  border: none;
  width: 60%;
  border-radius: 8px;
  cursor: pointer;
  font-size: 12px;
}

</style>

<script type="text/javascript">

		function check_quantity(quantity)
		{
			qua_num=document.quantityform.quantity.value;

			if(qua_num == "" || qua_num == 0)
			{
				window.alert("Please Enter a Required Quantity !");
				return false;
			}
			if(qua_num > quantity)
			{
				window.alert("The Entered Quantity is Unavailable !");
				return false;
			}
      if(qua_num > 30)
			{
				window.alert("Limit of 30 Per Customer !");
				return false;
			}
			if(isNaN(qua_num))
			{
				window.alert("Please Enter a Valid Quantity !");
				return false;
			}

			return true;
		}


	</script>

</head>



<body style="background-color:#f7f1ee">

<table>
    <tr>
        <th colspan="6" height="40"> <b>PRODUCT DETAILS</b</th>
    </tr>
	<tr>
		<th>PRODUCT ID</th>
		<th>PRODUCT NAME</th>
		<th>UNIT PRICE</th>
		<th>UNIT QUANTITY</th>
		<th>IN STOCK</th>
		<th>QUANTITY</th>
	</tr>

<?php session_start();

	$product_id=$_GET[product_id];

	$connection = mysqli_connect( "rerun.it.uts.edu.au","potiro","pcXZb(kL", "poti");

	if (!$connection)
	{
		die("Couldn't connect to MYSQL");
	}


	$query = "select * from products where product_id=$product_id";

	$result = mysqli_query($connection,$query);
	$num_rows=mysqli_num_rows($result);

if($num_rows>0)
{
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row["product_id"]."</td>";
		echo "<td>".$row["product_name"]."</td>";
		echo "<td>".$row["unit_price"]." $</td>";
		echo "<td>".$row["unit_quantity"]."</td>";
		echo "<td>".$row["in_stock"]."</td>";
		$_SESSION['product_id'] = $row["product_id"];

		echo "<td align=\"center\">";

		echo "<form action=\"add_to_cart.php\" method=\"post\" name=\"quantityform\" target=\"bottom_right\" onsubmit=\"return check_quantity(".$row["in_stock"].")\">";
		echo "<input name=\"quantity\" type=\"text\" size=\"3\"required >";
    echo "&nbsp;&nbsp;";
		echo "<input type=\"submit\" name=\"add\" value=\"Add To Cart\" class=\"btn\">";
		echo "</form>";
		echo "</td>\n";
		echo "</tr>";
	}
		echo "</table>";
}

mysqli_close($connection);
?>

</table>
</body>
</html>
