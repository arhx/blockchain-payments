<?php namespace Arhx\BlockchainPayments;

class BlockchainPayments{
	static function generatePaymentAddress($user_id){
		$callback_url = route('blockchain-callback',$user_id);
		$xpub = config( 'blockchain.xpub' );
		$api_key = config( 'blockchain.api_key' );
		$api = new BlockchainRemoteApi($xpub,$api_key);
		return $api->receive($callback_url);
	}
}