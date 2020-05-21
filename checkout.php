<!DOCTYPE html>
<html>
<head>

  <!-- https://www.w3schools.com/css/css_table.asp -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

    h2{
        color:#001a00;
        font-size:28px;
        font-style: oblique;
        text-transform: capitalize;
    }

    .btn {
      background-color: #78244c;
      color: white;
      padding: 4px;
      margin: 10px 10;
      border: none;
      width: 100%;
      border-radius: 8px;
      cursor: pointer;
      font-size: 12px;
    }

input[type=text] {
  width: 100%;
  margin-bottom: 5px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 6px;
}

table.tablebill
{
  border: 1px solid #471d31;
  width: 110%;
  color: #471d31;
  font-family: Verdana;
  font-size: 16px;
  text-align: left;
}

table.tablebill th {
  background-color: #471d31;
  color: #ffffff;
  font-size: 16px;
}

table.tablebill tr:nth-child(even) {background-color: #f2f2f2}

</style>

<script type="text/javascript">

	function validate()
	{
		var error = true;
		document.form1.fname.style.background = "White";
        document.form1.email.style.background = "White";
        document.form1.address.style.background = "White";
		document.form1.suburb.style.background = "White";
        document.form1.state.style.background = "White";
		document.form1.country.style.background = "White";
        document.form1.zip.style.background = "White";


		if (document.form1.fname.value == "")
		{
         		error_type = 1;
			document.form1.fname.focus();
			document.form1.fname.style.background = "#ffff99";
         		error = false;
		}

		if (document.form1.address.value == "")
		{
         		error_type = 1;
			document.form1.address.focus();
			document.form1.address.style.background = "#ffff99";
         		error = false;
		}
		if (document.form1.suburb.value == "")
		{
         		error_type = 1;
			document.form1.suburb.focus();
			document.form1.suburb.style.background = "#ffff99";
         		error = false;
		}
		if (document.form1.state.value == "")
		{
         		error_type = 1;
			document.form1.state.focus();
			document.form1.state.style.background = "#ffff99";
         		error = false;
		}
		if (document.form1.country.value == "")
		{
         		error_type = 1;
			document.form1.country.focus();
			document.form1.country.style.background = "#ffff99";
         		error = false;
		}
		if (document.form1.zip.value == "")
		{
			error_type = 1;
			document.form1.zip.focus();
			document.form1.zip.style.background = "#ffff99";
         		error = false;
		}
		if (isNaN(document.form1.zip.value))
		{
			error_type = 2;
			document.form1.zip.focus();
			document.form1.zip.style.background = "#ffff99";
         		error = false;
		}


		if (document.form1.email.value == "")
		{
         		error_type = 1;
			document.form1.email.focus();
			document.form1.email.style.background = "#ffff99";
         		error = false;
		}
		var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i

		if ( document.form1.email.value != "" && emailfilter.test(document.form1.email.value) ==false)
		{
			error_type = 2;
			document.form1.email.focus();
			document.form1.email.style.background = "#ffff99";
         		error = false;
		}

/***********************************************
* Email Validation script-   Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/


		if ( error ==false)
		{
			switch (error_type)
			{
				case 1: alert("The required field has not been filled in");
				break;
				case 2: alert("please enter a valid value");
				break;
			}
         		return false;
		}
		else
		{
			return true;
		}

	}

	</script>
</head>


<body style="background-color:#f7f1ee">




<?php session_start();


echo "<span style=\"color:#471d31\"><h1> DELIVERY DETAILS </h1></span>"; ?>


     <form name="form1" action="send_email.php" method="POST" onsubmit="return validate()">
       <div style="float: left;margin-right:10px">
       <table class ="tableform" width="100%" border="0">

         <tr>
          <td><label for="fname"><i class="fa fa-user"></i> Full Name <span style="color:#F00">* </span></label></td>
          <td style="text-align: center; vertical-align: top;"><input type="text" id="fname" name="fname"  size="30" placeholder="Rick Sanchers" required></td>
         </tr>



         <tr>
          <td><label for="adr"><i class="fa fa-address-card"></i> Address <span style="color:#F00">* </span></label></td>
          <td><input type="text" id="address" name="address" placeholder="806 Bourke Street" required></td>
         </tr>

         <tr>
          <td><label for="city"><i class="fa fa-institution"></i> Suburb <span style="color:#F00">* </span></label></td>
          <td><input type="text" id="suburb" name="suburb" placeholder="Waterloo" required></td>
         </tr>

         <tr>
          <td><label for="state"><i class="fa fa-map-marker"></i> State <span style="color:#F00">* </span></label>
          <td><input type="text" id="state" name="state" placeholder="NSW" required></td>
         </tr>

         <tr>
          <td><label for="country"><i class="fa fa-map-marker"></i> Country <span style="color:#F00">* </span></label>
          <td><input type="text" id="country" name="country" placeholder="Australia" required></td>
         </tr>

         <tr>
          <td><label for="zip"><i class="fa fa-map-pin"></i> Zip <span style="color:#F00">* </span></label>
          <td><input type="text" id="zip" name="zip" placeholder="2018" required></td>
         </tr>

         <tr>
          <td><label for="email"><i class="fa fa-envelope"></i> Email <span style="color:#F00">* </span></label></td>
          <td><input type="text" id="email" name="email" placeholder="rick@example.com" required></td>
         </tr>

         <tr>
          <td><input type="submit" value="Purchase" class="btn"></td>
         </tr>
</table>
</div>
     </form>


     <?php


     $cart_total = 	$_SESSION['cart_total'];

     if (empty($_SESSION['g']))
     {
     $_SESSION['g'] = 0 ;
     }
     $cart_total = 0 ;
     $total = 0 ;
     $count = 0 ;
     $count1 = 0;


     echo"<div style=\"float:right; margin-top: -83px; margin-right: 100px\">";
     echo "<span style=\"color:#471d31\"><h1> CUSTOMER BILL </h1></span>";

     echo "<table class=\"tablebill\"><tr>";
     echo "<th><b>Item Name</b></th>";
     echo "<th><b>Quantity</b></th>";
     echo "<th><b>Total Cost</b></th>";
     echo "</tr>";


     if (! empty ($_SESSION['product_name']))
     	{
     		while ($count < $_SESSION['g'])
     			{
     				if (empty($_SESSION['product_name'][$count]))
     					{
     						$count++;
     						$count1++;
     						continue;
     					}//end if (empty($_SESSION['product_name'][$count]))


     				else
     					{
     						echo "<tr>";
     						echo "<td>".$_SESSION['product_name'][$count]."</td>\n";
     						echo "<td>".$_SESSION['quantity'][$count]."</td>\n";
     						echo "<td>".$_SESSION['total'][$count]." $</td>\n";
     						echo "</tr>";
     						$cart_total= $cart_total + $_SESSION['total'][$count];
     						$count = $count + 1 ;
     					} // end else
     			} //

        }

        echo"<tr>";
        echo"<td> <b>Total Bill Amount : </b></td> ";
        echo"<td>  <b>$cart_total </b></td>";
        echo"</tr>";
        echo "</table>";
        echo"</div>";
     ?>



</body>
</html>
