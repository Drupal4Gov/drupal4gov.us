#!/bin/sh
#
# db-copy Cloud hook: db-scrub
#
# Scrub important information from a Drupal database.
#
# Usage: db-scrub.sh site target-env db-name source-env

set -ev

site="$1"
target_env="$2"
db_name="$3"
source_env="$4"

# Prep for Drush commands.
repo_root="/var/www/html/$site.$target_env"
export PATH=$repo_root/vendor/bin:$PATH
cd $repo_root

# Never scrub production.
if [ "$target_env" != "prod" ]; then
  drush sql:sanitize --yes --no-interaction
fi

set +v
