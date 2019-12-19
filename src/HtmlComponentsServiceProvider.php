<?php
namespace Stephane888\LaravelHtmlComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class HtmlComponentsServiceProvider extends ServiceProvider {

  private $_packageTag = 'HtmlComponents';

  /**
   */
  public function boot()
  {
    if (config('HtmlComponents.Load')) {
      $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
      // alias component
      // Blade::component('HtmlComponents::HtmlComponents.Bootstrap4.Navbar', 'HtmlComponents::navbar');
    }
  }

  /**
   *
   * {@inheritdoc}
   * @see \Illuminate\Support\ServiceProvider::register()
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'HtmlComponents');

    if (config('HtmlComponents.Load')) {

      $this->loadViewsFrom(__DIR__ . '/resources/views/', $this->_packageTag);
    }
  }
}