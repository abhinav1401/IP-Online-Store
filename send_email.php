<html>
<head>
    <title>Thank you</title>
</head>

<!-- https://www.w3schools.com/php/func_mail_mail.asp -->
<!-- https://www.w3schools.com/css/ -->


<body style="background-color:#f7f1ee">

<?php
session_start();
$count = 0 ;

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: My Grocery Store <13313162@student.uts.edu.au>' . "\r\n";

$to = $_POST['email'];
$sub = "Online Shopping Details (Abhinav Chaudhary - 13313162)";


$msg = "<html>

<head>
<title>Order details</title>
</head>

<body> <p> Your contact details are: </P>

<table cellspacing=\"4\" cellpadding=\"4\" border=\"1\">

<tr>
<td>Name:</td>
<td>" . $_POST['fname'] . "</td>
</tr>

<tr>
<td>Address:</td>
<td>" . $_POST['address'] . "</td>
</tr>

<tr>
<td>Suburb:</td>
<td>" . $_POST['suburb'] . "</td>
</tr>

<tr>
<td>State:</td>
<td>" . $_POST['state'] . "</td>
</tr>

<tr>
<td> Country:</td>
<td>" . $_POST['country'] . "</td>
</tr>

<tr>
<td>Post code:</td>
<td>" . $_POST['zip'] . "</td>
</tr>

<tr>
<td>Email:</td>
<td>" . $_POST['email'] . "</td>
</tr>
</table>
<br/>


<p> Your order details are: </p>

<table cellspacing=\"4\" cellpadding=\"4\" border=\"1\">

<tr>
<td>Product name</td>
<td>Unit price</td>
<td>Unit quantity</td>
<td>Required quantity</td>
<td>Total</td>
</tr> ";


    if (!empty($_SESSION['g']))
    {
        while ( $count < $_SESSION['g'] )
            {
                if (empty($_SESSION['product_name'][$count]))
                    {
                        $count++;
                        continue;
                    }

                else
                    {
                        $msg .="<tr>
                        <td>" . $_SESSION['product_name'][$count] ."</td>
                        <td>" . $_SESSION['unit_price'][$count] ." $</td>
                        <td>" . $_SESSION['unit_quantity'][$count] ."</td>
                        <td>" . $_SESSION['quantity'][$count] ."</td>
                        <td>" . $_SESSION['total'][$count] ." $</td>
                        </tr>";

                        $count = $count + 1 ;
                    }
            }
    }
$msg .= "

 <tr>
 <td>Number of products</td>
 <td>" . $_SESSION['count'] ."</td>
 </tr>

 <tr>
 <td>Shopping cart total</td>
 <td>" . $_SESSION['cart_total'] ." $</td>
 </tr>
 </table>
 </body>
 </html>";

if (mail($to, $sub, $msg, $headers))
{
echo("<p><b><span style=\"color:#471d31\">Thank You For Shopping With Us. <br> Invoice With the Detail of Your Order Has Been Emailed to You. </span><b></br></p>");
}
else
{
echo("<p>Message Delivery Failed</p>");
}
?> </body> </html>
