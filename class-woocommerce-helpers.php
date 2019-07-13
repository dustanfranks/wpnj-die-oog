<?php

/**
 *
 * Custom class to handle custom WooCommerce functionality 
 *
 */

class DieOogWoocommerce extends DieOog {

	public function __construct() {

		$this->register_callbacks();

	}

	/**
	 *
	 * Manage Hooks + Filters
	 *
	 */
	
	function register_callbacks() {	

		// Remove unwanted checkout fields
		add_filter( 'woocommerce_checkout_fields', [$this, 'unset_checkout_fields'] );

	}

	/**
	 *
	 * Remove unnecessary fields at checkout
	 *
	 */
	
	public function unset_checkout_fields($fields) {

		// Billing Details
		unset($fields['billing']['billing_company']);
		unset($fields['billing']['billing_address_1']);
		unset($fields['billing']['billing_address_2']);
		unset($fields['billing']['billing_city']);
		unset($fields['billing']['billing_postcode']);	
		unset($fields['billing']['billing_country']);	
		unset($fields['billing']['billing_state']);	
		unset($fields['billing']['billing_phone']);	

     	return $fields;

	}

}

/**
 *
 * Create the DieOogWoocommerce Object
 *
 */

new DieOogWoocommerce();