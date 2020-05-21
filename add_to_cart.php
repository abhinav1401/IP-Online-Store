<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- https://www.w3schools.com/css/css_table.asp -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping cart</title>

<script language="javascript">

	function checkout_1(ToCheckIt)
	{
		if (ToCheckIt == 0 || !(ToChecklt))
		{
			window.alert("Your shopping cart is empty, please select something!");
			return false;
		}
		else
		{

			return true;

		}
	}

</script>

<style type="text/css">

table
{
border: 1px solid #471d31;
width: 100%;
color: #471d31;
font-family: Verdana;
font-size: 16px;
text-align: left;
}

table a, table, tbody, tfoot, tr, th, td {
	font-family: Verdana, axial, helvetica, sans-serif;
}

th {
background-color: #471d31;
color: #ffffff;
font-size: 16px;
}



tr:nth-child(odd) {background-color: #ffffff}

.btn {
  background-color: #78244c;
  color: white;
  padding: 4px;
  margin: 10px 10;
  border: none;
  width: 40%;
  border-radius: 8px;
  cursor: pointer;
  font-size: 12px;
}

</style>
</head>

<body style="background-color:#f7f1ee">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" target="bottom_right" >

<?php session_start();

if(isset($_POST['clear']))
{
	//unset($_SESSION['product_id']);
	unset($_SESSION['product_name']);
	unset($_SESSION['unit_price']);
	unset($_SESSION['unit_quantity']);
	unset($_SESSION['quantity']);
	unset($_SESSION['total']);
	unset($_SESSION['g']);
	unset($_SESSION['cart_total']);
	$_SESSION['count'] = 0;
}


if(! empty($_POST['delete_cart']) )
{
foreach( $_POST['delete'] as $valval )
	{

		unset($_SESSION['product_name'][$valval]);
		unset($_SESSION['unit_price'][$valval]);
		unset($_SESSION['unit_quantity'][$valval]);
		unset($_SESSION['quantity'][$valval]);
		unset($_SESSION['total'][$valval]);
		unset($_SESSION['cart_total']);

		$_SESSION['count']--;
	}
}


if ( isset( $_POST['checkout'] ) )
{
	mysqli_close($db);
}


if (empty($_SESSION['g']))
{
$_SESSION['g'] = 0 ;
}
$cart_total = 0 ;
$total = 0 ;
$count = 0 ;
$count1 = 0;

print "<table width=100%>";

print"<tr>";
print"<th align=\"center\" colspan=\"6\" height=\"40\"> <b>CART DETAILS</b</th>";
print" </tr>";

print"<tr>";
print "<th><b>Del</b></th>";
print "<th><b>Product Name</b></th>";
print "<th><b>Unit Price</b></th>";
print "<th><b>Unit Quantity</b></th>";
print "<th><b>Required Quantity</b></th>";
print "<th><b>Total Cost</b></th>";
print "</tr>";


if(empty($_POST['delete_cart']) )
{

$db = mysqli_connect( "rerun.it.uts.edu.au","potiro","pcXZb(kL", "poti");

if (!$db)
	{
		die("Couldn't connect to MYSQL");
	}

$product_id = $_SESSION['product_id'];
$query = "select * from products where product_id=$product_id";
$result = mysqli_query($db,$query);

}

$judge = 0;

if ($result && $_POST['quantity'])
	{
		while ($row = mysqli_fetch_array($result))
			{
				for ($i=0; $i<$_SESSION['g']; $i++)
					{
						if (($row["product_name"]==$_SESSION['product_name'][$i]) && ($row['unit_quantity']==$_SESSION['unit_quantity'][$i]))
							{
								if ($_SESSION['quantity'][$i]+ $_POST['quantity'] > 30)
									{
										$judge = 1;
										print "<script language=\"javascript\"> window.alert(\"Limit of 30 Per Customer !\"); </script>";
										break;
									}
								else
									{
										$_SESSION['quantity'][$i] += $_POST['quantity'];
										$_SESSION['total'][$i] = $_SESSION['unit_price'][$i]*$_SESSION['quantity'][$i];
										$judge = 1;
										break;
									}
							}
					}


				if ($judge != 1)
					{
						$_SESSION['product_name'][]= $row["product_name"];
						$_SESSION['unit_price'][]= $row["unit_price"];
						$_SESSION['unit_quantity'][]= $row['unit_quantity'];
						$_SESSION['quantity'][]= $_POST['quantity'];
						$total = $row['unit_price'] * $_POST['quantity'];
						$_SESSION['total'][]=$total;
						$_SESSION['g'] = $_SESSION['g'] + 1 ;
					}
			}//end while
	}//end if

if (! empty ($_SESSION['product_name']))
	{
		while ($count < $_SESSION['g'])
			{
				if (empty($_SESSION['product_name'][$count]))
					{
						$count++;
						$count1++;
						continue;
					}//end if

				else
					{
						print "<tr>";
						print "<td><input type=\"checkbox\" name=\"delete[]\" value='".$count."'></td>\n";
						print "<td>".$_SESSION['product_name'][$count]."</td>\n";
						print "<td>".$_SESSION['unit_price'][$count]." $</td>\n";
						print "<td>".$_SESSION['unit_quantity'][$count]."</td>\n";
						print "<td>".$_SESSION['quantity'][$count]."</td>\n";
						print "<td>".$_SESSION['total'][$count]." $</td>\n";
						print "</tr>";
						$cart_total= $cart_total + $_SESSION['total'][$count];
						$count = $count + 1 ;
					} // end else
			} // end while

 		$_SESSION['cart_total'] = $cart_total ;
 		$_SESSION['count'] = $count - $count1 ;

		print "<tr>";
		print "<td colspan = \"3\"><b>Number of Products</b></td>";
		print "<td align = \"left\" colspan = \"2\"><b>".$_SESSION['count'] ."</b></td>";
		print "</tr>";

		print "<tr>";
		print "<td colspan = \"3\"><b>Shopping Cart Total</b></td>";
		print "<td align = \"left\" colspan = \"2\"><b>".$cart_total." $</b></td>";
		print "</tr>";
	}// end if


print "</table width =\"25%\">";

print "<table style=\"background-color: transparent; border-spacing: 0; padding: 0; \" border=\"0\">";

print "<tr><td>";
print "<input type=\"submit\" name=\"clear\" value=\"Clear\" class=\"btn\" onClick=\"{if(confirm('Do you want to clear your shopping cart?')) {return true;} return false;}\">";
print "</td>";

print "<td>";
print "<input type=\"submit\"  name =\"delete_cart\" value=\"Delete\" class=\"btn\" onClick=\"{if(confirm('Do you want to clear the selected items?')) {return true;} return false;}\">";
print "</td>";

print "</form>";

print "<td>";
print "<form action=\"checkout.php\" method=\"post\"   target=\"top_right\">";
print "<input type=\"submit\" name=\"checkout\" value=\"Checkout\" class=\"btn\" onClick=\"return checkout_1(".$_SESSION['count'].")\">";

print "</form>";
print "</td></tr>";


if(isset($db)) { mysqli_close($db); }

?>



</table>

</body>
</html>
