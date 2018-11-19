<?php

namespace Drupal\drupalcamp_2018;

use Drupal\Core\Plugin\DefaultSingleLazyPluginCollection;

/**
 * A collection of musician plugins.
 */
class MusicianPluginCollection extends DefaultSingleLazyPluginCollection {

  /**
   * The key in the Musician config entity that contains the Musician plugin ID.
   *
   *
   * @var string
   */
  protected $pluginKey = 'instrument';

  protected $configuration = [];

  /**
   * {@inheritdoc}
   *
   * @return \Drupal\tour\TipPluginInterface
   */
  public function &get($instance_id) {
    return parent::get($instance_id);
  }

  public function getAll($instrument) {
    //print($instrument);
    // Retrieve all available filter plugin definitions.
    //if (!$this->definitions) {
      $this->definitions = $this->manager->getDefinitions($instrument);
    //}

    // Ensure that there is an instance of all available filters.
    // Note that getDefinitions() are keyed by $plugin_id. $instance_id is the
    // $plugin_id for filters, since a single filter plugin can only exist once
    // in a format.
    foreach ($this->definitions as $plugin_id => $definition) {
      if (!isset($this->pluginInstances[$plugin_id])) {
        $configuration = $this->manager->getDefinition($plugin_id);
        var_dump($configuration);
        $this->configurations[$plugin_id] = $configuration;
        $this->initializePlugin($plugin_id);
      }
    }
    return $this->pluginInstances;
  }

  /**
   * {@inheritdoc}
   */
  protected function initializePlugin($instance_id) {
    $configuration = isset($this->configurations[$instance_id]) ? $this->configurations[$instance_id] : [];
    //if (!isset($configuration[$this->pluginKey])) {
    //  throw new PluginNotFoundException($instance_id);
   //}
    $this->set($instance_id, $this->manager->createInstance($configuration[$this->pluginKey], $configuration));
  }

}
