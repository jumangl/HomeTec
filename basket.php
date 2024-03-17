<?php
session_start();
include("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if (isset($_POST['remove_prodid'])){
    $delprodid = $_POST['remove_prodid'];
    unset($_SESSION['basket'][$delprodid]);
    echo "<p>1 item removed";
}
echo "<body>";

if (isset($_POST["h_prodid"]) && isset($_POST["p_quantity"])){
    $newprodid = $_POST["h_prodid"];

    $reququantity = $_POST["p_quantity"];
    
    $_SESSION['basket'][$newprodid] = $reququantity;

    echo "<p>1 item is added";
} else{
    echo "<p>Basket Unchanged";
    
}

$total = 0;
echo "<form action='basket.php' method='post'>";
echo "<table><tr>";
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>Subtotal</th>";
echo "<th>Remove Product</th>";
echo "</tr>";

if (isset($_SESSION['basket'])){
    foreach($_SESSION['basket'] as $index => $value){
        $SQL = "select prodId, prodName, prodPrice from Product where prodId=".$index;
        $exeSQL = mysqli_query($conn, $SQL) or die(mysqli_error($conn));
        $arrayp = mysqli_fetch_array($exeSQL);
        echo "<tr>";
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>£".number_format($arrayp['prodPrice'], 2)."</td>";
        echo "<td style='text-align:center;'>".$value."</td>";
        $subtotal = $arrayp['prodPrice'] * $value;
        echo "<td>£".number_format($subtotal, 2)."</td>";
        echo "<td>
        <input type='hidden' name='remove_prodid' value='".$index."'>
        <button type='submit' name='remove_item'>REMOVE</button>
        </td>";


        echo "</tr>";
        $total = $total + $subtotal;



    }
}
else{
    echo "<p>Empty Basket";
}

echo "<tr>";
echo "<td colspan=3>TOTAL</td>";
echo "<td>£ ".number_format($total,2)."</td>";

echo "</tr>";
echo "</table>";
echo "</form>";


echo "<br><p><a href = 'clearbasket.php'>CLEAR BASKET</a></p>";
echo "<br><p>New hometeq customers: <a href = 'signup.php'>Sign Up</a></p>";
echo "<br><p>Returning hometeq customers: <a href='login.php'>Log In</a></p>";

// echo "<p> 1 item added";
include("footfile.html"); //include head layout
echo "</body>";
?>