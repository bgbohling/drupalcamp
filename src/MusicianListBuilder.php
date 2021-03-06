<?php

namespace Drupal\drupalcamp_2018;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

use Drupal\drupalcamp_2018\MusicianPluginCollection;

/**
 * Provides a listing of Musician entities.
 */
class MusicianListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $collection = new MusicianPluginCollection();
    dpm($collection);

    $header['label'] = $this->t('Musician');
    $header['id'] = $this->t('Machine name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    // You probably want a few more properties here...
    return $row + parent::buildRow($entity);
  }

}
