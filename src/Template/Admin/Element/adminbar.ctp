<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Expired Bookings'), ['controller' => 'Bookings', 'action' => 'expired']) ?></li>
        <li><?= $this->Html->link(__('Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li>&nbsp;</li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'],['class' => 'button']) ?></li>
    </ul>
</nav>