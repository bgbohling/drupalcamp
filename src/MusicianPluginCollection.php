<?php

namespace Drupal\drupalcamp_2018;

use Drupal\Core\Plugin\DefaultLazyPluginCollection;

/**
 * A collection of musician plugins.
 */
class NusicianPluginCollection extends DefaultLazyPluginCollection {

  /**
   * The key in the Musician config entity that contains the Musician plugin ID.
   *
   *
   * @var string
   */
  protected $pluginKey = 'id';

  /**
   * {@inheritdoc}
   *
   * @return \Drupal\tour\TipPluginInterface
   */
  public function &get($instance_id) {
    return parent::get($instance_id);
  }
}
