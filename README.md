# Drupal 8 disqus comment import

Use Drupal 8 migrate API to import disqus comments from a disqus xml dump -- see https://help.disqus.com/customer/portal/articles/472149-comments-export

Instructions:

    1. Export disqus comments @ https://disqus.com/admin/discussions/export/
    2. Make sure the export file is named `disqus_data.xml` and move it to the same directory as this README
    3. Change the COMMENT_BUNDLE constant to whatever bundle you want comments to be enabled on (we are importing for the 'blog_post' bundle) @ line 3 of disqus_import.module
    4. Enable this module
    5. Run the command `drush disqus-import`
    6. Make sure the comment field is displayed in the "manage display" tab of your content type.