<?php 
/*
*************************************************************************************
Please Do not edit or add any code in this file without permission of transactworld.com.
@Developed by paymentz.com

opencart version 1.5.5.1			Transactworld Version 1.0.0


Module Version. Transactworld-1.0.0   			Module release: August 16/2017
**************************************************************************************
 */

class ModelPaymentPaymentz extends Model {

  	public function getMethod($address, $total) {

		$this->load->language('payment/paymentz');		

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('paymentz_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

		if ($this->config->get('paymentz_total') > $total) {

			$status = false;

		} elseif (!$this->config->get('paymentz_geo_zone_id')) {

			$status = true;

		} elseif ($query->num_rows) {

			$status = true;

		} else {

			$status = false;

		}	
		$licensekey=$this->config->get('paymentz_license_key');
		
		$status = TRUE;

        $image_name =$this->config->get('userfile');
        $image_path = "admin/view/image/payment/$image_name";
		$method_data = array();

		if ($status) {
      		$method_data = array( 

        		'code'       => 'paymentz',
        		'title'      => "<div class= 'heading'><div class='paymentz'><span >".$this->config->get('paymentz_partner_name')."</span><span>"."<img  src=$image_path  style='max-width:9%; margin:0 20px;display: inline-block;'/>"."</span><span >".$this->config->get('paymentz_title')." [ ".$this->config->get('paymentz_description')." ] </span></div></div>",
				'sort_order' => $this->config->get('paymentz_sort_order'),

      		);
    	}
    	return $method_data;

  	}
	
}
?>