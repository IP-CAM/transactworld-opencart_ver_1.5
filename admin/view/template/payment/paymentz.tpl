<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box" >
    <div class="heading"><a onclick="window.open('https://www.paymentz.com\ ');">
      <!-- <h1><img src="<?php echo $path_logo; ?>" alt="Paymentz" style="max-width: 60px;"/><?php echo $heading_title; ?></h1></a> -->
      <h1><!-- <img src="<?php echo $path_logo; ?>" alt="Paymentz" style="max-width: 60px;"/> --><?php echo $heading_title; ?></h1></a> 
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
    <div class="content">

      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
            <tr>
                <td>
                    <?php echo $entry_title; ?>
                </td>
                <td>
                    <input type="text" name="paymentz_title" value="<?php echo $paymentz_title; ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $entry_description; ?>
                </td>
                <td>
                    <input type="text" name="paymentz_description" value="<?php echo $paymentz_description; ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <span class="required">*</span> <?php echo $entry_partner_name; ?>
                </td>
                <td>
                    <input type="text" name="paymentz_partner_name" value="<?php echo $paymentz_partner_name; ?>" />
                    <?php if ($error_partner_name) { ?>
                    <span class="error"><?php echo $error_partner_name; ?></span><?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="required">*</span> <?php echo $entry_merchant_id; ?>
                </td>
                <td>
                    <input type="text" name="paymentz_merchant_id" value="<?php echo $paymentz_merchant_id; ?>" />
                    <?php if ($error_merchant_id) { ?>
                    <span class="error"><?php echo $error_merchant_id; ?></span><?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="required">*</span> <?php echo $entry_working_key; ?>
                </td>
                <td>
                    <input type="text" name="paymentz_working_key" value="<?php echo $paymentz_working_key; ?>" />
                    <?php if ($error_working_key) { ?>
                    <span class="error"><?php echo $error_working_key; ?></span><?php } ?>
                </td>
            </tr>
          <!-- <tr>
               <td>
                   <?php echo $text_upload; ?>
               </td>

               <td>
                   <input type="text" name="userfile" id="userfile" value="<?php echo $userfile; ?>">
                   <input type="file" name="file_name" id="file_name" onchange="document.getElementById('userfile').value = this.value">

               </td>


           </tr> -->

            <tr>
                <td><?php echo $entry_mode; ?></td>
               <td>
                    <select name="paymentz_mode"><?php if ($paymentz_mode) { ?>
                        <option value="1" selected="selected"><?php echo $text_live; ?></option>
                        <option value="0"><?php echo $text_test;?></option>
                        <?php } else { ?>
                        <option value="1"><?php echo $text_live; ?></option>
                        <option value="0" selected="selected"><?php echo $text_test; ?></option><?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <?php echo $entry_live_url; ?>
                </td>
                <td>

                    <input type="text" name="paymentz_live_url" value="<?php echo $paymentz_live_url; ?>" />
                </td>
            </tr>
			
			
			 <tr>
                <td>
                    <?php echo $entry_test_url; ?>
                </td>
                <td>

                    <input type="text" name="paymentz_test_url" value="<?php echo $paymentz_test_url; ?>" />
                </td>
            </tr>
			
            <tr>
		  <td><?php echo $entry_status; ?></td>
          <td>
			  <select name="paymentz_status"><?php if ($paymentz_status) { ?>
				  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
				  <option value="0"><?php echo $text_disabled;?></option>
				  <?php } else { ?>
				  <option value="1"><?php echo $text_enabled; ?></option>
				  <option value="0" selected="selected"><?php echo $text_disabled; ?></option><?php } ?>
			  </select>
		  </td>
		  </tr>

		  <tr>          
			  <td>
				<?php echo $entry_payment_confirmation_mail; ?>
			  </td>          
			  <td >
				  <?php if ($paymentz_payment_confirmation_mail) { ?>
				  <input type="radio" name="paymentz_payment_confirmation_mail" value="1" checked="checked" />
				  <?php echo $text_yes; ?>            
				  <input type="radio" name="paymentz_payment_confirmation_mail" value="0" />
				  <?php echo $text_no; ?>            
				  <?php } else { ?>            
				  <input type="radio" name="paymentz_payment_confirmation_mail" value="1" />
				  <?php echo $text_yes; ?>            
				  <input type="radio" name="paymentz_payment_confirmation_mail" value="0" checked="checked" />
				  <?php echo $text_no; ?><?php } ?>
			  </td>        
		  </tr>
		  <tr> 
			  <td><?php echo $entry_geo_zone; ?>
			  </td>          
			  <td>
				  <select name="paymentz_geo_zone_id">
					  <option value="0"><?php echo $text_all_zones; ?></option> 
						  <?php foreach ($geo_zones as $geo_zone) { ?>              
						  <?php if ($geo_zone['geo_zone_id'] == $paymentz_geo_zone_id) { ?>
						  <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?>
					  </option>              
					  <?php } else { ?>              
					  <option value="<?php echo $geo_zone['geo_zone_id']; ?>">
					  <?php echo $geo_zone['name']; ?></option> 
					  <?php } ?><?php } ?> 
				  </select>
			  </td>        
		</tr>              
		<tr>          
			<td><?php echo $entry_sort_order; ?></td>          
			<td><input type="text" name="paymentz_sort_order" value="<?php echo $paymentz_sort_order; ?>" size="1" /></td>        
		</tr>	
		<!-- <tr>            
		<td><?php echo $entry_total; ?></td>
		<td><input type="text" name="pp_standard_total" value="<?php echo $pp_standard_total; ?>" /></td>
		</tr> -->
         <tr>
            <td><?php echo $entry_completed_status; ?></td>
            <td><select name="paymentz_completed_status_id">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $paymentz_completed_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_failed_status; ?></td>
            <td><select name="paymentz_failed_status_id">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $paymentz_failed_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_pending_status; ?></td>
            <td><select name="paymentz_pending_status_id">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $paymentz_pending_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?> 