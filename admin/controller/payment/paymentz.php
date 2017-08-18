<?php
/*
*************************************************************************************
Please Do not edit or add any code in this file without permission of transactworld.com.
@Developed by paymentz.com

opencart version 1.5.5.1			Transactworld Version 1.0.0


Module Version. Transactworld-1.0.0   			Module release: March 16/2017
**************************************************************************************
 */

class ControllerPaymentPaymentz extends Controller {
	private $error = array();
	public function index() {
		$this->load->language('payment/paymentz');
        //$this->document->setTitle($this->data['paymentz_partner_name']);
		//$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('setting/setting');

if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
if ($_FILES["file_name"]["name"]!='') {

    $target_file = DIR_APPLICATION ."view/image/payment/". basename($_FILES["file_name"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file_name"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
            return false;
        }
    }
// Check if file already exists
//    if (file_exists($target_file)) {
//        echo "Sorry, Image already exists.";
//        $uploadOk = 0;
//        return false;
//    }
// Check file size
    if ($_FILES["file_name"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        return false;
    }
// Allow certain file formats

    if(isset($imageFileType) && $imageFileType!=''){
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        return false;
    }
   }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file)) {


            echo "The file ". basename( $_FILES["file_name"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}

			$this->model_setting_setting->editSetting('paymentz', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['entry_title'] = $this->language->get('entry_title');
        $this->data['entry_live_url'] = $this->language->get('entry_live_url');
        $this->data['entry_test_url'] = $this->language->get('entry_test_url');
        $this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_live'] = $this->language->get('text_live');
        $this->data['text_test'] = $this->language->get('text_test');
        $this->data['text_upload'] = $this->language->get('text_upload');
        $this->data['text_file'] = $this->language->get('text_file');

		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['entry_failed_status'] = $this->language->get('entry_failed_status');		
		$this->data['entry_pending_status'] = $this->language->get('entry_pending_status');				
		$this->data['entry_completed_status'] = $this->language->get('entry_completed_status');	
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
        $this->data['entry_partner_name'] = $this->language->get('entry_partner_name');
        $this->data['entry_mode'] = $this->language->get('entry_mode');
        $this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
		$this->data['entry_working_key'] = $this->language->get('entry_working_key');
		$this->data['entry_payment_confirmation_mail'] = $this->language->get('entry_payment_confirmation_mail');
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_total'] = $this->language->get('entry_total');



 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}				
		if (isset($this->error['partner_name'])) {
			$this->data['error_partner_name'] = $this->error['partner_name'];
		} else {
			$this->data['error_partner_name'] = '';
		}
        if (isset($this->error['merchant_id'])) {
            $this->data['error_merchant_id'] = $this->error['merchant_id'];
        } else {
            $this->data['error_merchant_id'] = '';
        }

        if (isset($this->error['working_key'])) {
		$this->data['error_working_key'] = $this->error['working_key'];					
		} else {					
		$this->data['error_working_key'] = '';					
		}		

		$this->data['action'] = $this->url->link('payment/paymentz', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');


        if (isset($this->request->post['paymentz_title']))
		{			
			$this->data['paymentz_title'] = $this->request->post['paymentz_title'];
		} 
		else
		{	
			$this->data['paymentz_title'] = $this->config->get('paymentz_title');
		}
        if (isset($this->request->post['paymentz_description']))
		{
			$this->data['paymentz_description'] = $this->request->post['paymentz_description'];
		}
		else
		{
			$this->data['paymentz_description'] = $this->config->get('paymentz_description');
		}
        if (isset($this->request->post['paymentz_status']))
		{
			$this->data['paymentz_status'] = $this->request->post['paymentz_status'];
		}
		else
		{
			$this->data['paymentz_status'] = $this->config->get('paymentz_status');
		}

        if (isset($this->request->post['paymentz_mode']))
        {
            $this->data['paymentz_mode'] = $this->request->post['paymentz_mode'];
        }
        else
        {
            $this->data['paymentz_mode'] = $this->config->get('paymentz_mode');
        }

        if (isset($this->request->post['paymentz_live_url']))
        {
            $this->data['paymentz_live_url'] = $this->request->post['paymentz_live_url'];
        }
        else
        {
            $this->data['paymentz_live_url'] = $this->config->get('paymentz_live_url');
        }
		
		
		
		if (isset($this->request->post['paymentz_test_url']))
        {
            $this->data['paymentz_test_url'] = $this->request->post['paymentz_test_url'];
        }
        else
        {
            $this->data['paymentz_test_url'] = $this->config->get('paymentz_test_url');
        }
		
		
		

        if (isset($this->request->post['paymentz_partner_name']))
        {
            $this->data['paymentz_partner_name'] = $this->request->post['paymentz_partner_name'];
        }
        else
        {
            $this->data['paymentz_partner_name'] = $this->config->get('paymentz_partner_name');
        }
        $this->document->setTitle($this->data['paymentz_partner_name']);
		if (isset($this->request->post['paymentz_merchant_id'])) 
		{					
			$this->data['paymentz_merchant_id'] = $this->request->post['paymentz_merchant_id'];	
		} 
		else 
		{
			$this->data['paymentz_merchant_id'] = $this->config->get('paymentz_merchant_id');
		}
		if (isset($this->request->post['paymentz_working_key'])) 
		{	
			$this->data['paymentz_working_key'] = $this->request->post['paymentz_working_key'];
		} 
		else
		{
			$this->data['paymentz_working_key'] = $this->config->get('paymentz_working_key');	
		}
		if (isset($this->request->post['paymentz_payment_confirmation_mail'])) 
		{					
			$this->data['paymentz_payment_confirmation_mail'] = $this->request->post['paymentz_payment_confirmation_mail'];
		} 
		else
		{
			$this->data['paymentz_payment_confirmation_mail'] = $this->config->get('paymentz_payment_confirmation_mail');					
		}	
		if (isset($this->request->post['paymentz_total'])) 
		{			
			$this->data['paymentz_total'] = $this->request->post['paymentz_total'];		
		} 
		else
		{	
			$this->data['paymentz_total'] = $this->config->get('paymentz_total'); 
		} 
		if (isset($this->request->post['paymentz_completed_status_id'])) {
			$this->data['paymentz_completed_status_id'] = $this->request->post['paymentz_completed_status_id'];
		} else {
			$this->data['paymentz_completed_status_id'] = $this->config->get('paymentz_completed_status_id');
		}			
		if (isset($this->request->post['pp_standard_failed_status_id'])) {
			$this->data['paymentz_failed_status_id'] = $this->request->post['paymentz_failed_status_id'];
		} else {
			$this->data['paymentz_failed_status_id'] = $this->config->get('paymentz_failed_status_id');
		}									
		if (isset($this->request->post['pp_standard_pending_status_id'])) {
			$this->data['paymentz_pending_status_id'] = $this->request->post['paymentz_pending_status_id'];
		} else {
			$this->data['paymentz_pending_status_id'] = $this->config->get('paymentz_pending_status_id');
		}
		$this->load->model('localisation/order_status');
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		if (isset($this->request->post['paymentz_geo_zone_id'])) {
			$this->data['paymentz_geo_zone_id'] = $this->request->post['paymentz_geo_zone_id'];
		} else {
			$this->data['paymentz_geo_zone_id'] = $this->config->get('paymentz_geo_zone_id');
		}
		$this->load->model('localisation/geo_zone');
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();		
		if (isset($this->request->post['paymentz_sort_order'])) {
			$this->data['paymentz_sort_order'] = $this->request->post['paymentz_sort_order'];
		} else {
			$this->data['paymentz_sort_order'] = $this->config->get('paymentz_sort_order');
		}
        if (isset($this->request->post['pp_standard_total'])) {
			$this->data['pp_standard_total'] = $this->request->post['pp_standard_total'];
		} else {
			$this->data['pp_standard_total'] = $this->config->get('pp_standard_total');
		}
        if (isset($this->request->post['userfile'])) {
            $this->data['userfile'] = $this->request->post['userfile'];
        } else {
            $this->data['userfile'] = $this->config->get('userfile');
        }
        if (isset($this->request->post['file_name'])) {
            $this->data['file_name'] = $this->request->post['file_name'];
        } else {
            $this->data['file_name'] = $this->config->get('file_name');
        }

        $this->data['path_logo'] ="view/image/payment/".$this->data['userfile'];
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );
        $this->data['breadcrumbs'][] = array(
            'text'      =>  sprintf($this->language->get('text_payment'), $this->data['path_logo']),
            'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['paymentz_partner_name'],
            'href'      => $this->url->link('payment/paymentz', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->template = 'payment/paymentz.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		$this->response->setOutput($this->render());		
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/paymentz')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!$this->request->post['paymentz_merchant_id']) {
			$this->error['merchant_id'] = $this->language->get('error_merchant_id');
		}
        if (!$this->request->post['paymentz_partner_name']) {
			$this->error['partner_name'] = $this->language->get('error_partner_name');
		}
		if (!$this->request->post['paymentz_working_key']) {	
			$this->error['working_key'] = $this->language->get('error_working_key');
		}
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}	
}
?>