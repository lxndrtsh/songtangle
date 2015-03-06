<?php namespace App\Providers;

use App\Interfaces\MusicGenreRepositoryInterface;
use App\Interfaces\MusicInstrumentRepositoryInterface;
use App\Interfaces\UserMusicRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\UserSettingsGetterRepositoryInterface;
use App\Interfaces\UserSettingsRepositoryInterface;
use App\Repository\Getters\UserSettingsGetterRepository;
use App\Repository\MusicGenreRepository;
use App\Repository\MusicInstrumentRepository;
use App\Repository\UserMusicRepository;
use App\Repository\UserRepository;
use App\Repository\UserSettingsRepository;
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
	}


	public function register()
	{
		$this->app->bind(UserRepositoryInterface::class, UserRepository::class);
		$this->app->bind(MusicInstrumentRepositoryInterface::class, MusicInstrumentRepository::class);
		$this->app->bind(MusicGenreRepositoryInterface::class, MusicGenreRepository::class);
        $this->app->bind(UserMusicRepositoryInterface::class, UserMusicRepository::class);
        $this->app->bind(UserSettingsRepositoryInterface::class, UserSettingsRepository::class);
        $this->app->bind(UserSettingsGetterRepositoryInterface::class, UserSettingsGetterRepository::class);
	}
}