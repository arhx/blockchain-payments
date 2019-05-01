<?php

namespace Arhx\BlockchainPayments;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class BlockchainPaymentsMakeCommand extends Command
{

	use DetectsApplicationNamespace;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:blockchain-payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create BlockchainPayments controller and route';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	    file_put_contents(
		    app_path('Http/Controllers/BlockchainPaymentController.php'),
		    $this->compileControllerStub()
	    );

	    file_put_contents(
		    base_path('routes/api.php'),
		    file_get_contents(__DIR__.'/stubs/routes/api.stub'),
		    FILE_APPEND
	    );
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
