<?php
$drupal_major_version = 8;
$drush_major_version = 8;

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}

// Stage 2 Prod
$aliases['prod'] = array(
  'root' => '/var/www/html/drupal4gov.prod/docroot',
  'ac-site' => 'drupal4gov',
  'ac-env' => 'prod',
  'ac-realm' => 'prod',
  'uri' => 'drupal4gov.prod.acquia-sites.com',
  'remote-host' => 'ded-5779.prod.hosting.acquia.com',
  'remote-user' => 'drupal4gov.prod',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);

// Stage 2 Test / UAT
$aliases['test'] = array(
  'root' => '/var/www/html/drupal4gov.test/docroot',
  'ac-site' => 'drupal4gov',
  'ac-env' => 'stg',
  'ac-realm' => 'prod',
  'uri' => 'drupal4govstg.prod.acquia-sites.com',
  'remote-host' => 'staging-3921.prod.hosting.acquia.com',
  'remote-user' => 'drupal4gov.test',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);

// Stage 2 Dev
$aliases['dev'] = array(
  'root' => '/var/www/html/drupal4gov.dev/docroot',
  'ac-site' => 'drupal4gov',
  'ac-env' => 'dev',
  'ac-realm' => 'prod',
  'uri' => 'drupal4govdev.prod.acquia-sites.com',
  'remote-host' => 'staging-3383.prod.hosting.acquia.com',
  'remote-user' => 'drupal4gov.dev',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);