<?php

namespace Drupal\disqus_import\Plugin\migrate_plus\data_fetcher;

use Drupal\migrate_plus\Plugin\migrate_plus\data_fetcher\File;
/**
 * Retrieve data from a Disqus Json dump.
 *
 * @DataFetcher(
 *   id = "disqus_import_file",
 *   title = @Translation("Disqus Import File")
 * )
 */
class DisqusImportFile extends File {

  /**
   * {@inheritdoc}
   */
  public function getResponse($url) {
    // $url is unused.
    $disqus_dump_path = file_directory_temp() . '/disqus_data.json';
    $response = file_get_contents($disqus_dump_path);
    if ($response === FALSE) {
      throw new MigrateException('file parser plugin: could not retrieve data from ' . $disqus_dump_path);
    }
    return $response;
  }

}
