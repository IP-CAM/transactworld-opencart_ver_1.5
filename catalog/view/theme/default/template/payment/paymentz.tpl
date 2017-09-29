
<form action="<?php echo $action; ?>" method="post" id="paymentz_standard_checkout" name="ecom">

    <input type="hidden" name="totype" id="totype" value="<?php echo $totype;?>" />
     <input type="hidden" name="partenerid" id="partenerid" value="<?php echo $partenerid;?>" />
    <input type="hidden" name="ipaddr" id="ipaddr" value="<?php echo $ipaddr;?>" />
    <input type="hidden" name="pctype" id="pctype" value="<?php echo '1_1|1_2';?>" />
    <input type="hidden" name="description" id="description" value="<?php echo $Order_Id; ?>" />
    <input type="hidden" name="orderdescription" id="orderdescription" value="<?php echo $orderdescription; ?>"  />
    <input type="hidden" name="fromtype" id="fromtype" value="icicicredit" />
    <input type="hidden" name="paymenttype" id="paymenttype" value="" />
    <input type="hidden" name="reservedField1" id="reservedField1" value="" />
    <input type="hidden" name="reservedField2" id="reservedField2" value="" />
    <input type="hidden" name="TMPL_telnocc" id="TMPL_telnocc" value="001" />
    <input type="hidden" name="cardtype" id="cardtype" value="" />
    <input type="hidden" name="TMPL_AMOUNT" id="TMPL_AMOUNT" value="<?php echo $Amount; ?>" />
    <input type="hidden" name="TMPL_CURRENCY" id="TMPL_CURRENCY" value="<?php echo $currency_code; ?>"  />
    <input type="hidden" name="currency" id="currency" value="<?php echo $currency_code; ?>"  />
    <input type="hidden" name="key" id="key" value="<?php echo $WorkingKey; ?>" />
    <input type="hidden" name="amount" id="amount" value="<?php echo $Amount; ?>" />
    <input type="hidden" name="toid" id="toid" value="<?php echo $Merchant_Id; ?>" />
    <input type="hidden" name="redirecturl" id="redirecturl" value="<?php echo $Redirect_Url; ?>" />
    <input type="hidden" name="checksum" id="checksum" value="<?php echo $Checksum; ?>" />
    <input type="hidden" name="TMPL_state" id="TMPL_state" value="<?php echo $billing_cust_state ?>" />
    <input type="hidden" name="TMPL_city" id="TMPL_city" value="<?php echo $billing_cust_city; ?>" />
    <input type="hidden" name="TMPL_street" id="TMPL_street" value="<?php echo $billing_cust_address; ?>" />
    <input type="hidden" name="TMPL_zip" id="TMPL_zip" value="<?php echo $billing_zip_code; ?>"  />
    <input type="hidden" name="TMPL_<?php echo $billing_country_iso_code_3; ?>" id="TMPL_<?php echo $billing_country_iso_code_3; ?>" value="selected" />
    <input type="hidden" name="TMPL_telno" id="TMPL_telno" value="<?php echo $billing_cust_tel; ?>" />
    <input type="hidden" name="TMPL_emailaddr" id="TMPL_emailaddr" value="<?php echo $billing_cust_email; ?>" />


    <div class="buttons">
        <div class="right">
            <a id="button-confirm" class="button" onclick="$('#paymentz_standard_checkout').submit();">
                <span><?php echo $button_confirm; ?></span>
            </a>
        </div>
    </div></form>