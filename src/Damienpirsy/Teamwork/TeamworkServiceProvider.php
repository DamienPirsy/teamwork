<?php 
namespace Damienpirsy\Teamwork;

use GuzzleHttp\Client as Guzzle;
use Illuminate\Support\ServiceProvider;

class TeamworkServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['damienpirsy.teamwork'] = $this->app->share(function($app)
        {
            $client = new \Damienpirsy\Teamwork\Client(new Guzzle,
                $app['config']->get('services.teamwork.key'),
                $app['config']->get('services.teamwork.url')
            );

            return new \Damienpirsy\Teamwork\Factory($client);
        });

        $this->app->bind('Damienpirsy\Teamwork\Factory', 'damienpirsy.teamwork');
    }

}