<?php

namespace Drupal\drupalcamp_2018\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Musician item annotation object.
 *
 * @see \Drupal\drupalcamp_2018\Plugin\MusicianManager
 * @see plugin_api
 *
 * @Annotation
 */
class Musician extends Plugin {

  public $id;

  public $name;

  public $instrument;

  public $style;

}
