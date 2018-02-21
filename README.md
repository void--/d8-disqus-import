# Drupal 8 disqus comment import

Use Drupal 8 migrate API to import disqus comments from a json source file -- see https://github.com/void--/disqus-export

Instructions:

    1. Export disqus comments using https://github.com/void--/disqus-export
    2. Make sure the export file is named `disqus_data.json` and move it to the same directory as this README
    3. Enable this module
    4. Run the command `drush disqus-import`