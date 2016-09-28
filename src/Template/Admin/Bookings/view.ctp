<?php $this->assign('title', 'Bookingdetails'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h3><?= h($booking->id) ?></h3>
                <table class="table">
                    <tr>
                        <th><?= __('User') ?></th>
                        <td><?= $booking->has('user') ? $this->Html->link($booking->user->id, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Account') ?></th>
                        <td><?= $booking->has('account') ? $this->Html->link($booking->account->id, ['controller' => 'Accounts', 'action' => 'view', $booking->account->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($booking->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Expirationdate') ?></th>
                        <td><?= h($booking->expirationdate) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($booking->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($booking->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
