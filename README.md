# Drupal4Gov
Welcome to the repo for the Drupal4Gov Website. This is an open source project where we proudly make all of our source code available—not only to those that want to contribute to the project—but also for those that are interested in seeing a working Drupal 10 site.

## Getting Started

This project uses [Lando](https://lando.dev) for local development, Drush for site tasks, and [Acquia Drupal Recommended Settings](https://docs.acquia.com/drupal-recommended-settings/) for environment-aware `settings.php` includes.

* Ensure that your computer meets the [Lando System Requirements](https://docs.lando.dev/getting-started/requirements.html).
* Fork the parent repository in GitHub (see button to right of repository title to do this)
* Request access to the Drupal4Gov organization in GitHub
* Request access to the Acquia Cloud Environment for Drupal GovCon
* Setup a SSH key that can be used for GitHub and the Acquia Cloud (you CAN use the same key)
    * [Setup GitHub SSH Keys](https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/)
    * [Setup Acquia Cloud SSH Keys](https://docs.acquia.com/acquia-cloud-platform/generating-ssh-public-key)

After creating a fork of the repository in GitHub and installing all dependencies above there are only a few commands to get started:

* `git clone git@github.com:<your repository>/drupal4gov.us.git` (clone your fork)
* `git remote add upstream git@github.com:Drupal4Gov/drupal4gov.us.git` (set your fork to track the upstream—*the project‘s code source of truth*—repository)
* `lando start` (provision the containers)
* `lando composer install` (install dependencies for the project)
* `lando drush site:install minimal --existing-config -y` (install Drupal from config), or sync a database from Acquia (see below)

## Appplying the drupal4gov recipe

The quick start recipe adds data to a vareity of entities (nodes, taxonomy_terms, menu_items, users, media ,and files ) on the site.

* run `lando ssh`
* run `cd docroot`
* run `php core/scripts/drupal recipe recipes/custom/drupal4gov -v`
* run `lando drush cr` (Clears the cache)


## Updating from BLT

BLT has been removed from this project. If you have an existing local environment:

* run `lando rebuild -y` (removes the old `lando blt` command)
* run `lando composer install`
* in `docroot/sites/default/settings/local.settings.php`, replace `use Acquia\Blt\Robo\Common\EnvironmentDetector;` with `use Acquia\Drupal\RecommendedSettings\Helpers\EnvironmentDetector;` and `blt.development.services.yml` with `local.development.services.yml` (or delete the file and copy `default.local.settings.php` over it)
* `blt/local.blt.yml` is no longer used and can be deleted

## Working with Lando

Our team utilizes a standard [Git flow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) for our development workflow.

In general, "all" commands (drush, composer, etc.) should be run "inside" the Lando container. You can do this by prefixing them with `lando`.

For example:

Cleanly Install Drupal:

`lando drush site:install minimal --existing-config -y`

Sync Drupal Database from Cloud:*

```
lando drush sql:sync @drupal4gov.dev @self -y
lando drush deploy -y
```

Log Into Drupal

`lando drush uli`

## Contributing Code
This is the project workflow:

* Locate a ticket that you will be working on in the project issue queue.
* Ensure that your local branch is tracking the most current upstream:
```
git fetch upstream
```
* Create a new branch off of upstream/develop that is based on the ticket you are working (e.g. D4G-XXX)
```
git checkout -b D4G-XXX_your_branch_name upstream/develop
```
* Reset local environment to ensure all is inline with new branch: **WARNING: this is destructive**
```
lando drush sql:sync @drupal4gov.dev @self -y
lando drush deploy -y
```
* Do whatever work is required for ticket.
* Create new commit(s) as needed. All commit messages should follow the pattern: `"D4G-XXX: Commit message goes here."` They must include the ticket number (with a dash AND a colon), a message, and a period.
* Run validation scripts:
```
lando composer lint
```
* Ensure no other changes have been made to the upstream/develop branch. If they have, rebase your branch: *(This helps avoid infuriating merge conflicts)*
```
git fetch upstream
git rebase upstream/develop
```
* Push your commit(s) to *your* origin
```
git push --set-upstream origin D4G-XXX_your_branch_name
```
* Create a new pull request that references the original ticket in the body (D4G-XXX)
* Ensure the build passes (validation scripts will let you know the status)

## Resources

* JIRA - https://drupal4gov.atlassian.net
* GitHub - https://github.com/Drupal4Gov/drupal4gov.us.git
