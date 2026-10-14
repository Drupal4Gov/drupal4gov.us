## Cloud Hooks

This directory contains [Acquia Cloud hooks](https://docs.acquia.com/cloud/manage/cloud-hooks).

### Directory Structure

    tests
    ├── common    - contains hooks that will be executed for _all_ environments.
    ├── dev       - contains hooks that will be executed for _dev_ environment.
    ├── prod      - contains hooks that will be executed for _prod_ environment.
    └── test      - contains hooks that will be executed for _test_ environment.

### Default hooks

The post-code-update and post-code-deploy hooks run `drush deploy` (database updates, config import and deploy hooks) in all environments following a code deployment or update. The post-db-copy hook runs `drush deploy` after a database copy.

### Documentation and additional examples

For detailed information on how to implement these hooks, read the [documentation on Acquia.com](https://docs.acquia.com/cloud/manage/cloud-hooks) and find sample hooks in the [Cloud Hook repository](https://github.com/acquia/cloud-hooks).
