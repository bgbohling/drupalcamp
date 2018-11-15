<?php

namespace Drupal\drupalcamp_2018\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Musician entities.
 */
interface MusicianInterface extends ConfigEntityInterface {

  public function getName();

  public function getInstrument();

  public function getStyle();

  public function getAxe();

}
