<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind(
      'PostService', // キー名
      'App\Services\PostService' // クラス名
    );
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
