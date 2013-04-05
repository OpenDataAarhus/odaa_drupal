<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['content']: The main content of the current page.
 * - $page['sidebar']: Items for the first sidebar.
  * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<header class="masthead">
  <div class="container">
    <?php if ($logo): ?>
      <hgroup class="header-image">
        <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" title="<?php print t('Home'); ?>">
        </a>
      </hgroup>
    <?php endif; ?>
    <div class="content">
      <?php print render($page['header']); ?>
      <form method="get" action="/dataset" class="section site-search simple-input">
        <div class="field">
          <label for="field-sitewide-search">Search Datasets</label>
          <input placeholder="Search" name="q" id="field-sitewide-search">
          <button type="submit" class="btn-search">Search</button>
        </div>
      </form>
      <nav class="section account not-authed">
        <ul class="unstyled">
          <li><a href="/user/login">Log in</a></li>
          <li><a href="/user/register" class="sub">Register</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>

<div class="beta-logo"></div>

<div role="main">
  <div id="content" class="container">
    <div class="flash-messages"><?php print $messages; ?></div>
    <div class="toolbar">
      <?php if ($breadcrumb): ?>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>
    </div>
    <div class="primary">
      <div class="module">
        <?php if ($tabs['#primary']): ?>
          <header class="module-content page-header"><?php print render($tabs); ?></header>
        <?php endif; ?>
        <div class="module-content">
          <a id="main-content"></a>
          <?php print render($title_prefix); ?>

          <?php if ($title): ?>
            <h1 class="title" id="page-title"><?php print $title; ?></h1>
          <?php endif; ?>

          <?php print render($title_suffix); ?>

          <?php print render($page['help']); ?>

          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>

          <?php print render($page['content']); ?>

          <?php print $feed_icons; ?>
        </div>
      </div>
    </div>

    <?php if ($page['sidebar']): ?>
      <aside class="secondary column sidebar">
        <?php print render($page['sidebar']); ?>
      </aside>
    <?php endif; ?>
  </div>
</div>

<footer class="site-footer">
  <div class="container">
    <div class="footer-first">
      <?php print render($page['footer']); ?>
    </div>
    <div class="footer-second">
      <div class="attribution attribution-first">      
        <a href="http://www.smartaarhus.dk/" class="hide-text made-with-aarhus-footer-logo">Made with Aarhus - Danish for progress</a> 
        <a href="http://www.itaward.dk/default.asp?Id=320&amp;cpc=1" class="hide-text award-smart-city-footer-logo">Nomineret Årets Smart City-pris 2013</a>
      </div>
      <div class="attribution attribution-second">
        <div style="float:right;">
        <p style="text-align:right;"><strong>Powered by</strong></p>
          <a href="http://ckan.org" class="hide-text ckan-footer-logo">CKAN</a>
          <a class="hide-text drupal-footer-logo" href="http://drupal.org">Drupal</a>
        </div>
        <div class="clearfix"></div>    
      </div>
    </div>
  </div>
</footer>
