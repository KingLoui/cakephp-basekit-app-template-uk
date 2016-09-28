<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('uniaccount');
            echo $this->Form->input('realname');
            echo $this->Form->input('email');
            echo $this->Form->input('role', ['options' => ['user' => 'User','admin' => 'Admin']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
