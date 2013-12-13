<?php
/**
 * @todo Make navbar-inverse?
 * @todo Customize the collapsing point
 * Depending on the content in your navbar, you might need to change the point at which your navbar switches between collapsed and horizontal mode. Customize the @grid-float-breakpoint variable or add your own media query.
 *
 */
?>
<?php
if (! isset($current_navigation))
{
  $current_navigation = '';
}
?>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo anchor('', 'Favorite Things', array('class' => 'navbar-brand')); ?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li<?php if ($current_navigation === 'browse') { echo ' class="active"'; } ?>><?php echo anchor('artifacts', 'Browse'); ?></li>
            <li<?php if ($current_navigation === 'about') { echo ' class="active"'; } ?>><?php echo anchor('about', 'About'); ?></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><?php echo anchor('http://vesterheim.org/', 'Vesterheim Museum Home'); ?></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>