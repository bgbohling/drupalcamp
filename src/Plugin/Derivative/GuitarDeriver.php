<?php

namespace Drupal\drupalcamp_2018\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class GuitarDeriver extends DeriverBase implements ContainerDeriverInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new GuitarDeriver instance.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $this->derivatives = [];

    $node_storage = $this->entityTypeManager->getStorage('node');
    $node_ids = $node_storage->getQuery()
      ->condition('type', 'musician')
      ->condition('field_instrument', 'guitar')
      ->execute();

    if (!empty($node_ids)) {
      $nodes = $node_storage->loadMultiple($node_ids);
      foreach ($nodes as $node) {
        $this->derivatives[$node->id()] = $base_plugin_definition;
        $this->derivatives[$node->id()][‘name’] = $node->field_name->getValue();
        $this->derivatives[$node->id()][‘instrument’] = $node->field_axe->getValue();
      }
    }

    return $this->derivatives;
  }

}
