<?php

namespace Arhx\BlockchainPayments;

use Illuminate\Support\ServiceProvider;

class BlockchainPaymentsServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
	    $today = date('Y_m_d');
	    $this->publishes([
		    __DIR__.'/publish/config/blockchain.php' => config_path('blockchain.php'),
			__DIR__.'/publish/resources/views/payments/replenishment_blockchain.blade.php' => resource_path('views/payments/replenishment_blockchain.blade.php'),
			__DIR__.'/publish/database/migrations/2019_05_01_162149_add_btc_replenishment_address_to_users_table.php' => database_path("migrations/{$today}_000000_add_btc_replenishment_address_to_users_table.php"),
			__DIR__.'/publish/database/migrations/2019_05_01_152731_create_blockchain_transactions_table.php' => database_path("migrations/{$today}_000000_create_blockchain_transactions_table.php"),
			__DIR__.'/publish/app/Models/BlockchainTransaction.php' => app_path('Models/BlockchainTransaction.php'),
	    ]);

	    $this->commands( [
		    BlockchainPaymentsPublishCommand::class,
		    BlockchainPaymentsFlushCommand::class,
	    ] );
    }
}
