<?php
/**
 * @todo pininterest css effect, if possible
 * @todo fix color of text in boxes on hover and otherwise
 * @todo Move images up to the top of the canvas
 */ 
?>
      <div class="page-header">       
        <h1><?php echo $title; ?></h1>  
      </div>

      <div class="row">
<?php foreach ($artifacts as $index => $artifact): ?>
<?php $index++ ?>
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">  
          <a class="thumbnail" href="<?php echo site_url(array('artifacts', $artifact['id'])); ?>" style="min-height:350px;padding-bottom:6ex;position:relative;">
            <img alt="" class="img-responsive" src="/assets/img/artifacts/<?php echo $artifact['image']; ?>">
            <strong><?php echo $artifact['name']; ?> <small>[<?php echo $artifact['identifier']; ?>]</small></strong>
            <strong class="badge badge-info" style="position:absolute; top:1.25ex; left:.75em;">#<?php echo $artifact['rank']; ?></strong>
            <dl class="dl-horizontal">    
<?php if (isset($artifact['visitor_rating']) === TRUE): ?>
              <dt>Your Rating</dt>
              <dd><?php echo $artifact['visitor_rating']; ?></dd>
<?php endif; ?>
              <dt>Average</dt>
              <dd><?php echo $artifact['average']; ?></dd>     
              <dt>Votes</dt>
              <dd><?php echo $artifact['votes']; ?></dd>
            </dl>
            <div style="text-align:center; position:absolute; bottom:1.5ex; left:0; right: 0;">
              <span class="btn btn-primary">Rate it!</span>
            </div>
          </a>
        </div>  

<?php if ($index % 2 === 0): ?>
        <div class="clearfix visible-xs"></div>
<?php endif; ?>
<?php if ($index % 3 === 0): ?>
        <div class="clearfix visible-sm"></div>
<?php endif; ?>
<?php if ($index % 4 === 0): ?>
        <div class="clearfix visible-md"></div>
<?php endif; ?>
<?php if ($index % 6 === 0): ?>
        <div class="clearfix visible-lg"></div>
<?php endif; ?>

<?php endforeach; ?>
      </div>