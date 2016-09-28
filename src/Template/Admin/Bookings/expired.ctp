<div class="bookings index large-9 medium-8 columns content">
    <h3><?= __('Expired Bookings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('uniaccount', 'User') ?></th>
                <th><?= $this->Paginator->sort('username', 'Account') ?></th>
                <th><?= $this->Paginator->sort('expirationdate') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= $booking->has('user') ? $this->Html->link($booking->user->uniaccount, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                <td><?= $booking->has('account') ? $this->Html->link($booking->account->username, ['controller' => 'Accounts', 'action' => 'view', $booking->account->id]) : '' ?></td>
                <td><?= h($booking->expirationdate) ?></td>
                <td><?= h($booking->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Set PW'), ['controller' => 'Accounts','action' => 'edit', $booking->account->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
