<?php

namespace Drupal\drupalcamp_2018\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Musician plugins.
 */
interface MusicianInterface extends PluginInspectionInterface {

  /**
   * What instrument does this musician play?
   *
   * @return string
   */
  public function getInstrument();

  public function getName();

  public function play($song);

}
