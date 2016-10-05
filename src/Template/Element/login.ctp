<?php 

use Cake\Core\Configure;

?>

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create(null, ['url' => ['controller' => 'users', 'action' => 'login']]) ?>
	<fieldset>
		<legend><?= __('Login') ?></legend>
		<?= $this->Form->input('username', ['required' => true, 'label' => 'Uni-Account']) ?>
		<?= $this->Form->input('password', ['required' => true, 'label' => 'Passwort']) ?>
		<?php
        if (Configure::read('Users.RememberMe.active')) {
            echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __('Stay logged in'),
                'checked' => 'checked'
            ]);
        }
        ?>
		<?= $this->Form->button(__('Login')); ?>
	</fieldset>
<?= $this->Form->end() ?>
</div>