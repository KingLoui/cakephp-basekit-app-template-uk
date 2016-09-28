<?php $this->assign('title', 'Edit Account'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <?= $this->Form->create($account, ['align' => [
                    'sm' => [
                        'left' => 2,
                        'middle' => 10,
                        'right' => 12
                    ],
                    'md' => [
                        'left' => 2,
                        'middle' => 10,
                        'right' => 4
                    ]
                ]]) ?>
                <?php
                    echo $this->Form->input('username');
                    echo $this->Form->input('password', ['type' => 'text']);
                ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <?= $this->Form->submit('Save', ['class' => 'btn-primary']); ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($account->bookings)): ?>
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
                        <th><?= __('Expired') ?></th>
                        <th><?= __('Expirationdate') ?></th>
                        <th><?= __('Created') ?></th>
                        <th><?= __('Modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($account->bookings as $bookings): ?>
                    <tr>
                        <td><?= h($bookings->id) ?></td>
                        <td><?= h($bookings->user_id) ?></td>
                        <td><?= h($bookings->account_id) ?></td>
                        <td><?= $bookings->expired ? '✓' : '' ?></td>
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