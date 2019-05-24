<?php

namespace Arhx\BlockchainPayments;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class BlockchainPaymentsFlushCommand extends Command
{

	use DetectsApplicationNamespace;
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'blockchain-payments:flush';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Обнулить всем пользователям btc_replenishment_address';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$userModel = config('blockchain.user_model');
		$userModel->update([
			'btc_replenishment_address' => null
		]);
		$this->line("All replenishment addresses was flushed");
	}

	/**
	 * Compiles the HomeController stub.
	 *
	 * @return string
	 */
	protected function compileControllerStub()
	{
		return str_replace(
			'{{namespace}}',
			$this->getAppNamespace(),
			file_get_contents(__DIR__.'/stubs/controllers/BlockchainPaymentController.stub')
		);
	}
}
