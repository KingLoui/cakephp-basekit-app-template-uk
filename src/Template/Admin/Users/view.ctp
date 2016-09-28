<?php $this->assign('title', 'Userdetails'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h3><?= h($user->uniaccount) ?></h3>
                <table class="table">
                    <tr>
                        <th><?= __('Uniaccount') ?></th>
                        <td><?= h($user->uniaccount) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($user->realname) ?></td>
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

<?php if (!empty($user->bookings)): ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Related Bookings') ?></h5>
            </div>
            <div class="ibox-content">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Id') ?></th>
                        <th><?= __('User Id') ?></th>
                        <th><?= __('Account Id') ?></th>
                        <th><?= __('Expirationdate') ?></th>
                        <th><?= __('Created') ?></th>
                        <th><?= __('Modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($user->bookings as $bookings): ?>
                    <tr>
                        <td><?= h($bookings->id) ?></td>
                        <td><?= h($bookings->user_id) ?></td>
                        <td><?= h($bookings->account_id) ?></td>
                        <td><?= h($bookings->expirationdate) ?></td>
                        <td><?= h($bookings->created) ?></td>
                        <td><?= h($bookings->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $bookings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookings->id)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>