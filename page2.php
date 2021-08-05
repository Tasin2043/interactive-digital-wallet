<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Digital Wallet</title>
</head>
<body>

	<h1>Page 2 [Transaction History]</h1>
	<h3> Digital Wallet</h3>
    <p>1.<a href="page1.php">Home</a> 2.<a href="page2.php">Transaction History</a></p>

<?php
    require 'DbInsert.php';
    $page2 = getAllUsers();

    $category = empty($_GET['category']) ? "" : $_GET['category'];
    if (empty($_GET['search']) or empty($category)) {
    	$page2 = getAllUsers();
    }
    else{
    	$page2 = getUser($category);
    }

?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
		<input type="text" name="category" value="<?php echo $category; ?>">
		<input type="submit" name="search" value="Search">
<br><br><br><br>
		<label for="totalrecords">Total Records:</lable>
		<output type="number"id="totalrecords"> 

		<br><br>	

<?php
    echo "<table>";
    echo "<tr>";
    echo "<th>Category</th>";
    echo "<th>To</th>";
    echo "<th>Amount</th>";
    echo "</tr>";
    for($i = 0; $i < count($page2); $i++){
    	echo "<tr>";
    	echo "<td>" . $page2[$i]["category"] . "</td>";
    	echo "<td>" . $page2[$i]["amountto"] . "</td>";
    	echo "<td>" . $page2[$i]["amount"] . "</td>";
    	echo "</tr>";
    }
    echo"</table>";
?>
 

</form>
</body>
</html>