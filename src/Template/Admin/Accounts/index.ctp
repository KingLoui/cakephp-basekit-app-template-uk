<?php $this->assign('title', 'All Accounts'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('username') ?></th>
                            <th><?= $this->Paginator->sort('created') ?></th>
                            <th><?= $this->Paginator->sort('modified') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($accounts as $account): ?>
                        <tr>
                            <td><?= $this->Number->format($account->id) ?></td>
                            <td><?= h($account->username) ?></td>
                            <td><?= h($account->created) ?></td>
                            <td><?= h($account->modified) ?></td>
                            <td class="actions dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-cog"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right animated fadeInRight m-t-xs">
                                    <li><?= $this->Html->link(__('View'), ['action' => 'view', $account->id]) ?></li>
                                    <li><?= $this->Html->link(__('Edit'), ['action' => 'edit', $account->id]) ?></li>
                                    <li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id)]) ?></li>
                                </ul>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator text-center">
                    <ul class="pagination btn-group">
                        <?= $this->Paginator->numbers(['prev' => true, 'next' => true]) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>