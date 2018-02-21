<?php

namespace Drupal\disqus_import\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DisqusImportForm extends FormBase {

  public function getFormId() {
    return 'import_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['prompt'] = [
      '#markup' => '<p>Import comments from Disqus:</p>'
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Import'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $num_failed = _disqus_import_run();
    if ($num_failed === 0) {
      drupal_set_message(t('Success!'));
    } else {
      drupal_set_message(t("$num_failed items unsuccessfully imported -- check logs for more info"), 'error');
    }
  }
}
