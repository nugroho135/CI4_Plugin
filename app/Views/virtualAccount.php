<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Nicepay">
    <meta http-equiv="refresh" content="900">
    <title>Nicepay - Secure Checkout</title>

	 <!-- CSS -->
     <link rel='stylesheet' href='index.css' type='text/css'/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Images -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <style>
    input[type="text"],
    input[type="number"],select {
        font-size:16px;
        padding:10px 10px 10px 5px;
        display:block;
        width:100%;
        border:none;
        border-bottom:1px solid #34CACA;
        text-transform: none;
    }
    .label{
        width: 100%;position: relative;top: 0px;display: block;user-select: none;
    }
    </style>
</head>

<body>
    <div class="form-style-8">
        <h2>
            <img class="img-valign" style="width: 60px; height:auto" src="nicepay_logo.jpg" alt="">Virtual Account
        </h2>
        <form action="<?php echo site_url();?>CreateVA" method="post">
        <div class="group">
            <label class="label">tXid VA</label>
            <input readonly type="text" name="tXidVA" id="tXidVA" value="<?php echo $tXidVA; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Trx Id</label>
            <input readonly type="text" name="trxId" id="trxId" value="<?php echo $trxId; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Virtual Account Name</label>
            <input readonly type="text" name="virtualAccountName" id="virtualAccountName" value="<?php echo $virtualAccountName; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Virtual Account No</label>
            <input readonly type="text" name="virtualAccountNo" id="virtualAccountNo" value="<?php echo $virtualAccountNo; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Response Message</label>
            <input readonly type="text" name="responseMessage" id="responseMessage" value="<?php echo $responseMessage; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <?php if($customerNo == '' || $customerNo == null) { ?>
            <div class="group" style="display: none;">
                <label class="label">Customer No</label>
                <input readonly type="text" name="customerNo" id="customerNo" value=""/>
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
        <?php } else { ?>
            <div class="group">
                <label class="label">Customer No</label>
                <input readonly type="text" name="customerNo" id="customerNo" value="<?php echo $customerNo; ?>"/>
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
        <?php } ?>
        <div class="group">
            <label class="label">Total Amount</label>
            <input readonly type="text" name="totalAmount" id="totalAmount" value="<?php echo $totalAmount; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Bank Code</label>
            <input readonly type="text" name="bankCd" id="bankCd" value="<?php echo $bankCd; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">Goods Nm</label>
            <input readonly type="text" name="goodsNm" id="goodsNm" value="<?php echo $goodsNm; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">vacct Valid Dt</label>
            <input readonly type="text" name="vacctValidDt" id="vacctValidDt" value="<?php echo $vacctValidDt; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <div class="group">
            <label class="label">vacct Valid Tm</label>
            <input readonly type="text" name="vacctValidTm" id="vacctValidTm" value="<?php echo $vacctValidTm; ?>"/>
            <span class="highlight"></span>
            <span class="bar"></span>
        </div>
        <a href="<?php echo site_url().'';?>"><input type="button" value="back" /></a>
    </div>
</body>
</html>


