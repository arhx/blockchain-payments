<?php

namespace Arhx\BlockchainPayments;

use Illuminate\Console\Command;

class BlockchainPaymentsPublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blockchain-payments:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Integrate BlockchainPayments to laravel project';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$path = app_path('Http/Controllers/BlockchainPaymentController.php');
	    file_put_contents(
		    $path,
		    $this->compileControllerStub()
	    );
	    $this->line("Created Controller: $path");

	    $path = base_path('routes/api.php');
	    file_put_contents(
		    $path,
		    $this->compileApiRouteStub(),
		    FILE_APPEND
	    );
	    $this->line("Appended routes: $path");

	    $path = base_path('routes/web.php');
	    file_put_contents(
		    $path,
		    $this->compileWebRouteStub(),
		    FILE_APPEND
	    );
	    $this->line("Appended routes: $path");

	    $this->line("Publish other files:");
	    $this->call('vendor:publish', [
		    '--provider' => BlockchainPaymentsServiceProvider::class
	    ]);
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
			$this->laravel->getNamespace(),
			file_get_contents(__DIR__.'/stubs/controllers/BlockchainPaymentController.stub')
		);
	}

	/**
	 * Compiles the routes/api.php stub.
	 *
	 * @return string
	 */
	protected function compileApiRouteStub()
	{
		return str_replace(
			'{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/stubs/routes/api.stub')
		);
	}

	/**
	 * Compiles the routes/web.php stub.
	 *
	 * @return string
	 */
	protected function compileWebRouteStub()
	{
		return str_replace(
			'{{namespace}}',
            $this->laravel->getNamespace(),
            file_get_contents(__DIR__.'/stubs/routes/web.stub')
		);
	}
}
