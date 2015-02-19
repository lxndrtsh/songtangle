<?php namespace App\Providers;

use App\Interfaces\UserRepositoryInterface;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class SongtangleServiceProvider
 * @package App\Providers
 */
class SongtangleServiceProvider extends ServiceProvider
{
	/**
	 * @var TransformerFactory
	 */
	private $transformerFactory;

	public function __construct($app)
	{
		parent::__construct($app);

		$this->transformerFactory = \App::make(TransformerFactory::class);
	}


	public function register()
	{
		$this->app->bind(UserRepositoryInterface::class, UserRepository::class);
	}
}