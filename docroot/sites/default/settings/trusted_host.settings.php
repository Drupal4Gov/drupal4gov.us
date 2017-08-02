<?php

if ($is_ah_env) {
  if ($is_ah_prod_env) {
    $settings['trusted_host_patterns'] = array(
      '^drupal4gov\.us$',
      '^drupal4gov\.prod.acquia-sites\.com$',
    );
  }
  elseif ($is_ah_stage_env) {
    $settings['trusted_host_patterns'] = array(
      '^drupal4govstg\.prod.acquia-sites\.com$',
    );
  }
  elseif ($is_ah_dev_env) {
    $settings['trusted_host_patterns'] = array(
      '^drupal4govdev\.prod.acquia-sites\.com$',
    );
  }
}