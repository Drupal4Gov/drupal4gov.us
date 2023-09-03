/**
 * @file
 *
 * This is moved to header component because SDC is running this script first.
 */
((Drupal) => {
  Drupal.currentTheme = {};

  /**
   * Checks if the mobile navigation button is visible.
   *
   * @return {boolean}
   *   True if navButtons is hidden, false if not.
   */
  function isDesktopNav() {
    const navButton = document.querySelector(
      '[data-drupal-selector="mobile-nav-button"]',
    );
    return navButton
      ? window.getComputedStyle(navButton).getPropertyValue('display') ===
      'none'
      : false;
  }

  Drupal.currentTheme.isDesktopNav = isDesktopNav;
})(Drupal);
