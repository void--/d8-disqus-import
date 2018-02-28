<?php

namespace Drupal\disqus_import\Plugin\migrate\destination;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\comment\Plugin\migrate\destination\EntityComment;

/**
 * @MigrateDestination(
 *   id = "entity:comment"
 * )
 */
class DisqusImportEntityComment extends EntityComment {

  /**
   * Saves the entity, but also, save a mapping of the disqus id to comment id to be used
   * later for mapping comment pid.
   *
   * @param \Drupal\Core\Entity\ContentEntityInterface $entity
   *   The content entity.
   * @param array $old_destination_id_values
   *   (optional) An array of destination ID values. Defaults to an empty array.
   *
   * @return array
   *   An array containing the entity ID.
   */
  protected function save(ContentEntityInterface $entity, array $old_destination_id_values = []) {
    $entity->save();

    $map_entry = \Drupal::keyValue('disqus_import')->get($entity->disqus_id);

    if (!$map_entry) {
      \Drupal::keyValue('disqus_import')->set($entity->disqus_id, $entity->id());
    }

    return [$entity->id()];
  }

}
