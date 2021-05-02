<?php namespace Arhx\BlockchainPayments;

use Illuminate\Support\Arr;

class BlockchainRemoteApi {
	protected $remote_api_base = 'https://api.blockchain.info/v2';
	protected $xpub;
	protected $api_key;

	public function __construct($xpub,$api_key) {
		$this->xpub     = $xpub;
		$this->api_key  = $api_key;
	}

	public function action( $endpoint, $data = [] ) {
		$data['xpub'] = $this->xpub;
		$data['key']  = $this->api_key;
		$data         = http_build_query( $data );
		$base         = implode( '/', [
			$this->remote_api_base,
			$endpoint
		] );
		$url          = $base . '?' . $data;
		//TODO: replace on curl
		$response     = @file_get_contents( $url );

		return json_decode( $response, true );
	}


	public function receive( $callback ) {
		$response = $this->action( 'receive', [
			'callback' => $callback
		] );

		return Arr::get( $response, 'address' );
	}
}