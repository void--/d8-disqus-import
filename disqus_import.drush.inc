<?php

/**
 * Implements hook_drush_command().
 */
function disqus_import_drush_command() {
  $items = [];
  $items['disqus-import'] = [
    'description' => '',
    'arguments' => []
  ];

  return $items;
}

function drush_disqus_import() {
  _disqus_import_run();
}