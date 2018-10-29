<?php

namespace Drupal\drupalcamp_2018\Plugin;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Provides the Musician plugin manager.
 */
class MusicianManager extends DefaultPluginManager {

  /**
   * Constructs a new MusicianManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/Musician', $namespaces, $module_handler, 'Drupal\drupalcamp_2018\Plugin\MusicianInterface', 'Drupal\drupalcamp_2018\Annotation\Musician');
    $this->alterInfo('drupalcamp_2018_musician_info');
    $this->setCacheBackend($cache_backend, 'drupalcamp_2018_musician_plugins');
  }

}
