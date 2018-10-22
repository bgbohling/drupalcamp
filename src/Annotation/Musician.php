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


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $name;

  /**
   * The musician's instrument
   *
   * @var string
   */
  public $instrument;

  /**
   * Possible additional attributes
   * $ear;  // Awareness of what's going on around one.
   * $pitch;  // Knowing the right note
   * $tempo;  // Keeping a steady beat
   * $literacy;  // Read notation?  Tabs/charts?  All by ear?
   */

}
