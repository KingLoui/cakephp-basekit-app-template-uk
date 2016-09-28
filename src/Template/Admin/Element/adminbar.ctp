<?php 
	$user = $this->request->session()->read('Auth.User');
?>
<div class="dropdown profile-element">               
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
	        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $user['fullName'][0] ?></strong>
	         </span> <span class="text-muted text-xs block"><?= $user['uid'][0] ?> <b class="caret"></b></span> </span> </a>
	<ul class="dropdown-menu animated fadeInRight m-t-xs">
	    <li><?= $this->Html->link('Logout', ['prefix' => false, 'controller' => 'Users', 'action' => 'logout']); ?></li>
	</ul>
</div>