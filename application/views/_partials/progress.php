<?php if ($display_progress === TRUE): ?>
<style type="text/css">
	.progress-compact {
		margin-bottom: 0;
	}
</style>

<div class="panel <?php echo $progress_panel_context; ?>">
	<div class="panel-heading">
		<strong>Progress:</strong> You have rated <?php echo $progress_percent; ?>% of the artifacts
	</div>
	<div class="panel-body">
		<div class="progress progress-compact">
			<div class="progress-bar <?php echo $progress_context; ?>" role="progressbar" aria-valuenow="<?php echo $progress_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress_percent; ?>%;">
				<span class="sr-only"><?php echo $progress_percent; ?>% Complete</span>
			</div>

		</div>
	</div>
</div>
<?php endif; ?>