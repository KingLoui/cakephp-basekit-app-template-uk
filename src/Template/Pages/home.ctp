<?php $this->assign('title', 'Startseite'); ?>

<h2><?= $this->fetch('title'); ?></h2>

<div class="row">
	<div class="col-md-6 col-sm-6">
		<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
	</div>
	<div class="col-md-6 col-sm-6">
		<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
		<?= $this->element('login') ?>
	</div>
</div>
