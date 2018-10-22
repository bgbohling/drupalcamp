<?php

namespace Drupal\drupalcamp_2018\Plugin;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for Musician plugins.
 */
abstract class MusicianBase extends PluginBase implements MusicianInterface {

  public function getInstrument() {
    return $this->pluginDefinition['instrument'];
  }

  public function getName() {
    return $this->pluginDefinition['label'];
  }

}
