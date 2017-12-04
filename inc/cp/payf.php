<?php
$paypal_url="https://www.paypal.com/cgi-bin/webscr"; // Test Paypal API URL
$paypal_id=$app['update']['email']; // Business email ID
$row['name'] = "Mo3tasmScript" ;
$row['id'] = $_SERVER['HTTP_HOST'];
$row['price']= 1;
?>
    	<form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">

        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">

        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" value="1" name="quantity">
         <input type="hidden" value="Return to The Store" name="cbt">

        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?=$St->url?>/admin/paypal'>
        <input type='hidden' name='return' value='<?=$St->url?>/admin/paypal'>
        <input type="hidden" value="https://www.yoursite.com/storescripts/my_ipn.php" name="notify_url">
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>