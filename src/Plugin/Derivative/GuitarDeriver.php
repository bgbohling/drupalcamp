<?php

namespace Drupal\drupalcamp_2018\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManager;

class GuitarDeriver extends DeriverBase implements ContainerDeriverInterface {

  public function __construct(EntityTypeManager $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static('entity_type.manager');
  }

  public function getDerivativeDefinitions($base_plugin_definition) {
    $nodes = $this->entityTypeManager()->getStorage(‘node’)->loadMultiple();
    $players = $nodes->getQuery()
      ->condition(‘type’, ‘musician’)
      ->execute();
    $this->derivatives = [];
    if (!empty($players)) {
      foreach ($players as $player) {
        if ($player-getInstrument() == 'guitar') {
          $this->derivatives[$player->id()] = $base_plugin_definition;
          $this->derivatives[$player->id()][‘name’] = $player->getName();
          $this->derivatives[$player->id()][‘instrument’] = $player->getInstrument();
        }
      }
    }
    return $this->derivatives;
  }
}
