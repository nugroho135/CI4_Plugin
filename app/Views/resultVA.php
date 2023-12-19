<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Riko Adi Setiawan">
    <title>Your order is being process...</title>

	<!-- CSS -->
	<link rel='stylesheet' href='http://localhost/ci_nicepay_v2/css/index.css' type='text/css'/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

	<!-- Images -->
	<link rel="shortcut icon" href="<?php echo site_url();?>image/favicon.ico" type="image/x-icon" />
    <link rel="icon" href="<?php echo site_url();?>image/favicon.ico" type="image/x-icon" />
</head>
<body>

	<div id="payMethod-form" class="form-style-8">
		<form action="<?php echo site_url();?>CheckPayment" method="post">
			<h2><img class="img-valign" style="width: 60px; height:auto" src="<?php echo site_url();?>image/nicepay_logo.jpg" alt="">Thank You and Have a nice pay</h2>
			<div class="group">
				<input type="text" name="" value="<?php echo $_REQUEST['tXid']; ?>" />
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Transaction ID</label>
			</div>

			<div class="group">
				<input type="text" style="text-transform: none;" name="" value="<?php echo $_REQUEST['referenceNo']; ?>" />
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Reference Number</label>
			</div>

			<div class="group">
                <input type="text" name="" value="<?= $_GET['vacctNo'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Virtual Account Number</label>
            </div>

			<div class="group">
                <input type="text" name="" value="<?= $_GET['amt'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Amount</label>
            </div>

			<div class="group">
                <input type="text" name="" value="<?= $_GET['description'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Description</label>
            </div>

			<div class="group">
                <input type="text" name="" value="<?= $_GET['billingNm'] ?>">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Customer Name</label>
            </div>

			<input type="hidden" name="tXid" value="<?= $_GET['tXid'] ?>">
            <input type="hidden" name="amt" value="<?= $_GET['amt'] ?>">
            <input type="hidden" name="referenceNo" value="<?= $_GET['referenceNo'] ?>">
			
			<input type="submit" value="Check Payment"/>
			<br>
			<a href="https://template.nicepay.co.id/VA_EN/"><input type="button" value="How to Pay" /></a>
			<br>
			<a href="<?php echo site_url().'Home/virtualAccount';?>"><input type="button" value="Back to Checkout" /></a>
		</form>
	</div>

</body>
</html>