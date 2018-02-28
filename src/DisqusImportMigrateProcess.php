<?php

namespace Drupal\disqus_import;

class DisqusImportMigrateProcess {

  public static function getStatus($args) {
    $isDeleted = $args[0];
    $isSpam =    $args[1];

    return (!$isDeleted && !$isSpam) ? 1 : 0;
  }

  public static function getPid($parent) {
    $test = 'blah';
  }

  public static function getUidFromEmail($email) {
    $test = 'blah';
  }
}