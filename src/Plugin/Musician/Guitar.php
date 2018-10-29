<?php

namespace Drupal\drupalcamp_2018\Plugin\Musician;

use Drupal\drupalcamp_2018\Plugin\MusicianBase;

/**
 * Provides a guitarist
 *
 * The attributes listed here can all be provided by derivatives. :)
 *
 * @Musician (
 *   id = "guitarist",
 *   name = "Guitar",
 *   instrument = "guitar",
 *   deriver = "Drupal\drupalcamp_2018\Plugin\Derivative\GuitarDeriver",
 * )
 */
class Guitar extends MusicianBase {

}
