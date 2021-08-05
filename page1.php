<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Digital Wallet</title>
</head>
<body>
	<h1>Page 1 [Home]</h1>
	<h3> Digital Wallet</h3>

	<p>1.<a href="page1.php">Home</a> 2.<a href="page2.php">Transaction History</a></p>

	<h3> Fund Transfer: </h3>

	<?php
  require 'DbInsert.php';

  $categoryErr = $amounttoErr = $amountErr = "";
  $successfulMessage = $errorMessage = "";
if($_SERVER['REQUEST_METHOD'] ==="POST") {
    $category = $_POST['category'];
    $amountto = $_POST['amountto'];
    $amount = $_POST['amount'];
    $isValid = true;
    
   if(empty($category)) {
      $categoryErr = "Empty";
    $isValid= false;

  }
   if(empty($amountto)) {
    $amounttoErr = "Please fill it up!";
    $isValid = false;
  }

  if(empty($amount)) {
    $amountErr = "Amount should not be zero or empty!";
    $isValid = false;
  }

  if($isValid){
    $category = test_input($category);
    $to = test_input($amountto);
    $amount = test_input($amount);
    $response = transfer($category, $amountto, $amount);

    if($response){
    $successfulMessage = "Transfer Successful!!";

  }
  else{
    $errorMessage = "You have to fill the form properly!";
  }
 }
}
function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name = "digitalWallet" onsubmit= "return isValid()">

    <label for="category">Select Category <span style="color: red;"></span>: </label>
      <select type = "text" name="category" id="category">
      <option value=""></option>
      <option value="mobilerecharge">Mobile Recharge</option>
      <option value="sendmoney">Send Money </option>
      <option value="merchantpay">Merchant Pay</option>
      <span style="color:red" id="categoryErr"><?php echo $categoryErr; ?></span> </select> 
 
  <br><br> 
    
			<label for="amountto">To:</label>
			<input type="textarea" name="amountto" id="amountto">
			<span style="color:red" id= "amounttoErr"><?php echo $amounttoErr; ?></span>

			<br><br>

			<label for="amount">Amount:</label>
			<input type="textarea" name="amount" id="amount">
			<span style="color:red" id="amountErr"><?php echo $amountErr; ?></span>

			<br><br>

			<input type="submit" name="submit" value="Transfer">
</form>  
<br><br>


<p style ="color:green"><?php echo $successfulMessage; ?></p>
<p style ="color:red"><?php echo $errorMessage; ?></p>


<script>

    function isvalid() {
        var flag = true;
        var categoryErr = document.getElementById("categoryErr");
        var amounttoErr = document.getElementById("amounttoErr");
        var amountErr = document.getElementById("amountErr");
        var category = document.forms["digitalWallet"]["category"].value;
        var amountto = document.forms["digitalWallet"]["amountto"].value;
         var amount = document.forms["digitalWallet"]["amount"].value;
        
         categoryErr.innerHTML= "";
         amounttoErr.innerHTML = "";
         amountErr.innerHTML = "";
        
        if (category === "") {
            flag = false;
            categoryErr.innerHTML =" Empty";
        }

        if (amountto === "") {
            flag = false;
            toErr.innerHTML ="Please fill it up!";
        }

         if (amount === "") {
            flag = false;
            amoutErr.innerHTML ="Amount should not be zero or empty!";
        }

        

    return flag;
}

</script>
</body>
</html>
