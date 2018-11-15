<?php

namespace Drupal\drupalcamp_2018\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class MusicianForm.
 */
class MusicianForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $musician = $this->entity;
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#maxlength' => 255,
      '#default_value' => $musician->getName(),
      '#description' => $this->t("Name."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $musician->id(),
      '#machine_name' => [
        'exists' => '\Drupal\drupalcamp_2018\Entity\Musician::load',
      ],
      '#disabled' => !$musician->isNew(),
    ];

    $form['instrument'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Instrument'),
      '#maxlength' => 255,
      '#default_value' => $musician->getInstrument(),
      '#description' => $this->t("Instrument"),
      '#required' => TRUE,
    ];

    $form['style'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Main style'),
      '#maxlength' => 255,
      '#default_value' => $musician->getStyle(),
      '#description' => $this->t("Main style."),
      '#required' => TRUE,
    ];

    $form['axe'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Favorite Axe'),
      '#maxlength' => 255,
      '#default_value' => $musician->getInstrument(),
      '#description' => $this->t("Favorite Axe."),
      '#required' => true,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $musician = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Musician.', [
          '%label' => $musician->getName(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Musician.', [
          '%label' => $musician->getName(),
        ]));
    }
    $form_state->setRedirectUrl($musician->toUrl('collection'));
  }

}
