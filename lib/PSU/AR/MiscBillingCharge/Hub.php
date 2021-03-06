<?php

class PSU_AR_MiscBillingCharge_Hub extends PSU_AR_MiscBillingCharge {
	public static $default_detail_code = 'IYHE';

	public $fields = array(
		'description',
	);

	public function __construct( $row ) {
		$row['id'] = $row['id'] ?: -1;
		$row['data_source'] = $row['data_source'] ?: 'hub';
		$row['entry_date'] = $row['entry_date'] ?: date('Y-m-d H:i:s');
		$row['detail_code'] = $row['detail_code'] ?: static::$default_detail_code;
		$row['username'] = PSU::nvl( $row['username'], $_SESSION['username'], 'script' );

		parent::__construct( $row );

		if( ! $this->meta('description') ) {
			$this->set_meta('description', \PSU_AR::detail_code( $row['detail_code'] )->desc );
		}//end if
	}//end constructor

	public static function detail_codes() {
		return array(
			'IYHE' => \PSU_AR::detail_code( 'IYHE' ),
			'IYHD' => \PSU_AR::detail_code( 'IYHD' ),
		);
	}//end detail_codes
}//end class PSU_AR_MiscBillingCharge_Hub
