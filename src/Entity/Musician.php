<?php

namespace Drupal\drupalcamp_2018\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Musician entity.
 *
 * Entity attributes correspond to Musician plugin keys.
 *
 * A really cool thing happens when you associate a config entity with a plugin.
 * When you derive a plugin from said config entity, the plugin picks up the
 * attributes of the config entity.
 *
 * @ConfigEntityType(
 *   id = "musician",
 *   label = @Translation("Musician"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\drupalcamp_2018\MusicianListBuilder",
 *     "form" = {
 *       "add" = "Drupal\drupalcamp_2018\Form\MusicianForm",
 *       "edit" = "Drupal\drupalcamp_2018\Form\MusicianForm",
 *       "delete" = "Drupal\drupalcamp_2018\Form\MusicianDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\drupalcamp_2018\MusicianHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "musician",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/musician/{musician}",
 *     "add-form" = "/admin/structure/musician/add",
 *     "edit-form" = "/admin/structure/musician/{musician}/edit",
 *     "delete-form" = "/admin/structure/musician/{musician}/delete",
 *     "collection" = "/admin/structure/musician"
 *   }
 * )
 */
class Musician extends ConfigEntityBase implements MusicianInterface {

  /**
   * The Musician ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Musician label.
   *
   * @var string
   */
  protected $label;

  protected $name;

  protected $instrument;

  protected $style;

  protected $axe;

  public function getName() {
    return $this->name;
  }

  public function getInstrument() {
    return $this->instrument;
  }

  public function getStyle() {
    return $this->style;
  }

  public function getAxe() {
    return $this->axe;
  }

}
