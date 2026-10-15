#!/bin/sh
#
# Cloud Hook: post-db-copy
#
# The post-db-copy hook is run whenever you use the Workflow page to copy a
# database from one environment to another.
#
# Usage: post-db-copy site target-env db-name source-env

set -ev

site="$1"
target_env="$2"
db_name="$3"
source_env="$4"

# Prep for Drush commands.
repo_root="/var/www/html/$site.$target_env"
export PATH=$repo_root/vendor/bin:$PATH
cd $repo_root

# Bring the copied database in line with the code on this environment.
drush deploy --yes --no-interaction

set +v
