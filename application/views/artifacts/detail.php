      <div class="page-header">     
        <h1><?php echo $artifact['name']; ?> <small>[<?php echo $artifact['identifier']; ?>]</small></h1>  
      </div>
      <?php $this->load->view('_partials/alerts'); ?>
      <div class="row">

        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
          <figure>
<?php if (array_key_exists('image', $artifact) === TRUE):?>
  <?php switch (count($artifact['image'])):
          case 0: ?>
            <img alt="" class="img-responsive img-rounded" data-src="holder.js/100%x430/social" />
    <?php break; ?> 
    <?php case 1: ?>
            <img alt="" class="img-responsive img-rounded" src="/assets/img/artifacts/<?php echo $artifact['image'][0]; ?>" />
    <?php break; ?> 
    <?php default: ?>
            <div id="carousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
      <?php for ($i = 0, $size = count($artifact['image']); $i < $size; ++$i): ?>
                <li data-target="#carousel" data-slide-to="<?php echo $i; ?>"<?php echo ($i === 0) ? ' class="active"':''; ?>></li>
      <?php endfor; ?>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
      <?php for ($i = 0, $size = count($artifact['image']); $i < $size; ++$i): ?>
                <div class="<?php echo ($i === 0) ? 'active ':''; ?>item"><img alt="" class="img-responsive" src="/assets/img/artifacts/<?php echo $artifact['image'][$i]; ?>" /></div>
      <?php endfor; ?>
              </div>
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="right carousel-control" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
  <?php endswitch; ?> 
<?php else: ?>
            <img alt="" class="img-responsive img-rounded" data-src="holder.js/100%x430/social" />
<?php endif; ?>        
          </figure>
        </div>      

        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">
          <div class="well well-small">
<?php $this->load->view('_partials/rating_form'); ?>
            <div class="row">
              <div class="col-xs-6 col-sm-2 col-md-6 col-lg-2 muted">Rank: <?php echo $artifact['rank']; ?></div>
              <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 muted">Average: <?php echo $artifact['average']; ?></div>
              <div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 muted">Votes: <?php echo $artifact['votes']; ?></div>
              <div class="col-xs-6 col-sm-3 col-md-6 col-lg-3 muted">Views: <?php echo $artifact['views']; ?></div>
            </div>                 	 	
          </div> 
        </div>  

        <div class="col-xs-12 col-sm-9  col-md-6 col-lg-6">
          <?php echo $artifact['description']; ?>
          <dl class="artifact-details">
            <dt>Date</dt>
            <dd><?php echo $artifact['date']; ?></dd>                                                      
            <dt>Creator</dt>
            <dd><?php echo $artifact['creator']; ?></dd>                                                      
            <dt>Source</dt>
            <dd><dd><?php echo $artifact['source']; ?></dd> </dd>                                                                                                             
          </dl>
        </div> 

      </div>