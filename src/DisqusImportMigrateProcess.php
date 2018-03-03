<?php

namespace Drupal\disqus_import;

class DisqusImportMigrateProcess {

  public static function getStatus($args) {
    $isDeleted = $args[0];
    $isSpam =    $args[1];

    return (($isDeleted === 'false') && ($isSpam === 'false')) ? 1 : 0;
  }

  public static function getPid($parent) {
    // Grab the cid from the key value map created on entity save.
    // @see \Drupal\disqus_import\Plugin\migrate\destination\DisqusImportEntityComment::save
    $pid = \Drupal::keyValue('disqus_import')->get($parent);
    return $pid ? $pid : 0;
  }

  public static function getUidFromEmail($email) {
    $user = user_load_by_mail($email);

    return $user ? $user->id() : null;
  }
}