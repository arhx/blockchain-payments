<?php

namespace Arhx\BlockchainPayments;

use Illuminate\Support\ServiceProvider;

class BlockchainPaymentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
	    $this->publishes([
		    __DIR__.'/config/blockchain.php' => config_path('blockchain.php'),
	    ], 'config');

	    $this->commands( [
		    BlockchainPaymentsMakeCommand::class
	    ] );
    }
}
