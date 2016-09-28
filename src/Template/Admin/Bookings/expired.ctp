<?php $this->assign('title', 'Expired Bookings'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('uniaccount', 'User') ?></th>
                            <th><?= $this->Paginator->sort('username', 'Account') ?></th>
                            <th><?= $this->Paginator->sort('expired') ?></th>
                            <th><?= $this->Paginator->sort('expirationdate') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?= $this->Number->format($booking->id) ?></td>
                            <td><?= $booking->has('user') ? $this->Html->link($booking->user->uniaccount, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                            <td><?= $booking->has('account') ? $this->Html->link($booking->account->username, ['controller' => 'Accounts', 'action' => 'view', $booking->account->id]) : '' ?></td>
                            <td><?= $booking->expired ? '✓' : '' ?></td>
                            <td><?= h($booking->expirationdate) ?></td>
                            <td><?= h($booking->created) ?></td>
                            <td><?= h($booking->modified) ?></td>
                            <td class="actions dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-cog"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right animated fadeInRight m-t-xs">
                                    <li><?= $this->Html->link(__('View'), ['action' => 'view', $booking->id]) ?></li>
                                    <li><?= $this->Html->link(__('Set Password'), ['controller' => 'Accounts','action' => 'edit', $booking->account->id]) ?></li>
                                </ul>
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
        </div>
    </div>
</div>