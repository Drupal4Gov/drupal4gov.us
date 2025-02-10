# Drupal4Gov Recipe

This is the basic template for an Drupal4gov recipe.
To run the recipe run the following commands.

## Install an empty site.

```shell
drush site:install --existing-config
```

## Run the recipe and install the content.

The line below might change once drush 13 is added to the project.

``` shell
cd docroot
php core/scripts/drupal recipe recipes/custom/drupal4gov -v
```
