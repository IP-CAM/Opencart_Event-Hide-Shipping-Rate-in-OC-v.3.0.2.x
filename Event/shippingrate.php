<?php
  /*
   * Goal   : Disable flat rate as soon as the minimum order limit has been reached in the cart
   * Code   : shipping_disablerate
   * Trigger: catalog/controller/checkout/shipping_method/after
   * Action : event/shippingrate/disablerate
   *
   * SQL: INSERT INTO `oc_event` (`code`, `trigger`, `action`, `status`, `sort_order`) VALUES
          ('shipping_disablerate', 'catalog/controller/checkout/shipping_method/after', 'event/shippingrate/disablerate', 1, 0);
   */
  class Controllereventshippingrate extends Controller {
    //Function to remove flat rate from current session shipping method array
    public function disablerate(&$route, &$data, &$output){
      //Verify if the cart total is larger than the minimum value to enable free shipping
      if($this->cart->getTotal() > $this->config->get('shipping_free_total')){
        //Verify that shipping methods has been set
        if (isset($this->session->data['shipping_methods'])) {
          //Remove the flat rate from the current seesion shipping method array
          unset($this->session->data['shipping_methods']['flat']);

          //Reset data for template
          if (empty($this->session->data['shipping_methods'])) {
      			$data['error_warning'] = sprintf($this->language->get('error_no_shipping'), $this->url->link('information/contact'));
      		} else {
      			$data['error_warning'] = '';
      		}

      		if (isset($this->session->data['shipping_methods'])) {
      			$data['shipping_methods'] = $this->session->data['shipping_methods'];
      		} else {
      			$data['shipping_methods'] = array();
      		}

      		if (isset($this->session->data['shipping_method']['code'])) {
      			$data['code'] = $this->session->data['shipping_method']['code'];
      		} else {
      			$data['code'] = '';
      		}

      		if (isset($this->session->data['comment'])) {
      			$data['comment'] = $this->session->data['comment'];
      		} else {
      			$data['comment'] = '';
      		}

          $this->response->setOutput($this->load->view('checkout/shipping_method', $data));
        }
      }
    }
  }
