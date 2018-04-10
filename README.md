Drupal4Gov website

## Getting Started

This project is based on BLT, an open-source project template and tool that enables building, testing, and deploying Drupal installations following Acquia Professional Services best practices.

* Ensure that your computer meets the minimum installation requirements (and then install the required applications). See the [System Requirements](http://blt.readthedocs.io/en/8.x/INSTALL/).
* Fork the parent repository in GitHub
* Request access to the Drupal4Gov organization in GitHub 
* Request access to the Acquia Cloud Environment for Drupal4Gov
* Setup a SSH key that can be used for GitHub and the Acquia Cloud (you CAN use the same key)
    * [Setup GitHub SSH Keys](https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/)
    * [Setup Acquia Cloud SSH Keys](https://docs.acquia.com/acquia-cloud/ssh/generate)
* Clone your fork
```
$ git clone git@github.com:<your repository>/drupal4gov.us.git
```
* Add the parent repository as an upstream
```
$ git remote add upstream git@github.com:Drupal4Gov/drupal4gov.us.git
```
* Install Composer Dependencies (warning: this can take some time based on internet speeds)
```
$ composer install
```
* Setup Virtual Machine (warning: this can take some time based on internet speeds)
```
$ blt vm
```
* Syncronize your local with the cloud
```
$ blt sync:refresh
``` 
* Access the site and do necessary work at http://local.drupal4gov.com

Additional [BLT documentation](http://blt.readthedocs.io) may be useful. You may also access a list of BLT commands by running:
```
$ blt
``` 

Note the following properties of this project:
* Primary development branch: master
* Local environment: DrupalVM
* Local drush alias: @drupal4gov.local
* Local site URL: http://local.drupal4gov.com

## Working With BLT

This is the common workflow for this project.

* Locate a ticket that you are planning on working
* Ensure that your git is tracking the most current upstream.
```
$ git fetch upstream
```
* Create a new branch off of upstream/master that is based on the ticket you are working (e.g. D4G-XXX)
```
$ git checkout -b D4G-XXX upstream/master
```
* Reset local environment to ensure all is inline with new branch. WARNING: this is destructive
```
$ blt sync:refresh
```
* Do whatever work is required for ticket
* Create new commit(s) as needed. All commit messages should follow the pattern: D4G-XXX: commit messages go here. They must include the Ticket Number (with a dash AND a colon), a message, and a period.
* Run Tests / Validation Scripts
```
$ blt validate
$ blt tests
```
* Ensure no other changes have been made to the upstream/master branch. If they have, rebase your branch.
```
$ git fetch upstream
$ git rebase upstream/master
```
* Push your commit(s) to your origin
```
$  git push --set-upstream origin D4G-XXX
```
* Create a new Pull Request that mentions the original ticket in the body (#DGC-XXX)
* Ensure the build passes

## Resources

* JIRA - https://drupal4gov.atlassian.net
* GitHub - https://github.com/Drupal4Gov/drupal4gov.us