<?php

namespace Arhx\BlockchainPayments;

use Illuminate\Console\Command;

class BlockchainPaymentsFlushCommand extends Command
{
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
		$userModel::query()->update([
			'btc_replenishment_address' => null
		]);
		$this->line("All replenishment addresses was flushed");
	}
}
