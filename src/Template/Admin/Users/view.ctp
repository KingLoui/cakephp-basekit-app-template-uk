<?php $this->assign('title', __('Userdetails')); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h3><?= h($user->uniaccount) ?></h3>
                <table class="table">
                    <tr>
                        <th><?= __('Uniaccount') ?></th>
                        <td><?= h($user->username) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('First Name') ?></th>
                        <td><?= h($user->first_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Last Name') ?></th>
                        <td><?= h($user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Role') ?></th>
                        <td><?= h($user->role) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Active') ?></th>
                        <td><?= h($user->active) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Superuser') ?></th>
                        <td><?= h($user->is_superuser) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($user->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
