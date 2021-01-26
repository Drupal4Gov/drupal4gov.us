# Drupal4Gov
Welcome to the repo for the Drupal4Gov Website. This is an open source project where we proudly make all of our source code available—not only to those that want to contribute to the project—but also for those that are interested in seeing a working Drupal 8 site.

## Getting Started

This project is built with BLT, an open-source project template and tool that enables building, testing, and deploying Drupal installations following Acquia Professional Services best practices.

* Ensure that your computer meets the minimum installation requirements (and then install the required applications). See the [BLT System Requirements](https://docs.acquia.com/blt/install/) and [Lando System Requirements](https://docs.lando.dev/basics/installation.html).
* Fork the parent repository in GitHub (see button to right of repository title to do this)
* Request access to the Drupal4Gov organization in GitHub
* Request access to the Acquia Cloud Environment for Drupal GovCon
* Setup a SSH key that can be used for GitHub and the Acquia Cloud (you CAN use the same key)
    * [Setup GitHub SSH Keys](https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/)
    * [Setup Acquia Cloud SSH Keys](https://docs.acquia.com/acquia-cloud/ssh/generate)

After creating a fork of the repository in GitHub and installing all dependencies above) there are only a few commands to get started:

* `git clone git@github.com:<your repository>/drupal4gov.us.git` (clone your fork)
* `git remote add upstream git@github.com:Drupal4Gov/drupal4gov.us.git` (set your fork to track the upstream—*the project‘s code source of truth*—repository)
* `composer install` (install dependencies for the project)
*  (For Linux users) add 'export LANDO_SSH_AUTH_SOCK="${SSH_AUTH_SOCK}"' at the end of your ~/.bashrc:
* `lando start` (provision the VM)
* `lando blt setup` (install Drupal)

## Updating from DrupalVM

If you have been a part of our team in the past and have a local DrupalVM, here are a few steps to take to update to Lando.

* `blt vm:nuke` to destroy the old vm
* open the blt/local.blt.yml file and look for a "vm" key. If present, remove the vm (and enable:true) keys from the file

* run `lando start`
* run `lando blt setup`

Note that the new local project url is http://drupal4gov.lndo.site:8080

## Working with Lando and BLT

Our team utilizes a standard [Git flow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) for our development workflow. You can read more about our recommended workflow in the [BLT docs](https://docs.acquia.com/blt/developer/dev-workflow/#workflow-example-local-development).

In general, "all" commands (drush, blt, etc.) should be run "inside" the Lando container. You can do this by first running the `lando` command.

For example:

Cleanly Install Drupal:

`lando blt setup`

Sync Drupal Database from Cloud:*

`lando blt sync`

Log Into Drupal

`lando drush uli`

## Contributing Code
This is the project workflow:

* Locate a ticket that you will be working on in the project issue queue.
* Ensure that your local branch is tracking the most current upstream:
```
git fetch upstream
```
* Create a new branch off of upstream/main that is based on the ticket you are working (e.g. D4G-XXX)
```
git checkout -b D4G-XXX_your_branch_name upstream/main
```
* Reset local environment to ensure all is inline with new branch: **WARNING: this is destructive**
```
lando blt sync
```
* Do whatever work is required for ticket.
* Create new commit(s) as needed. All commit messages should follow the pattern: `"D4G-XXX: Commit message goes here."` They must include the ticket number (with a dash AND a colon), a message, and a period.
* Run tests/validation scripts:
```
lando blt validate
lando blt tests
```
* Ensure no other changes have been made to the upstream/main branch. If they have, rebase your branch: *(This helps avoid infuriating merge conflicts)*
```
git fetch upstream
git rebase upstream/main
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
