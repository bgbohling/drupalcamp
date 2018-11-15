<?php

namespace Drupal\drupalcamp_2018\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A deriver allows us to create instances (derivatives) of a plugin based on
 * dynamic data.
 * In this case, we're going to loop through the musician config entities and
 * create derivatives for all the guitar players.
 * Derivatives can be used to add attributes to a plugin, as well as to override
 * attributes in the plugin annotation.
 *
 */
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
    $musicians = $this->entityTypeManager->getStorage('musician')->loadMultiple();

    foreach ($musicians as $musician) {
      if (!empty($musician->getInstrument()) && $musician->getInstrument() == 'guitar') {
        $this->derivatives[$musician->id()] = $base_plugin_definition;
        $this->derivatives[$musician->id()]['instrument'] = $musician->getInstrument();
        $this->derivatives[$musician->id()]['name'] = $musician->getName();
        $this->derivatives[$musician->id()]['axe'] = $musician->getAxe();
        $this->derivatives[$musician->id()]['style'] = $musician->getStyle();
      }
    }
    return $this->derivatives;
  }

}
