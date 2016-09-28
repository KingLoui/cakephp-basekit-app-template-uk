<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create(null, ['url' => ['controller' => 'users', 'action' => 'login']]) ?>
	<fieldset>
		<legend><?= __('Anmeldung') ?></legend>
		<?= $this->Form->input('username', ['label' => 'Uni-Account']) ?>
		<?= $this->Form->input('password', ['label' => 'Passwort']) ?>
		<?= $this->Form->button(__('Login')); ?>
	</fieldset>
<?= $this->Form->end() ?>
</div>