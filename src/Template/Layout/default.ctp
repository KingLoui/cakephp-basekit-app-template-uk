<?php
$pageTitle = 'Zugang zu Video-Tutorials';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $pageTitle ?>:
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('unikassel.css') ?>
   

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <header>
            <?= $this->Html->image('logo_unikassel.svg', ['class' => 'logo', 'alt' => 'Universität Kassel']); ?>
            <div class="user">
                <?php if(isset($user['id'])): ?>
                    <span>Angemeldet als: <?= $user['uid'][0] ?></span>
                    <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'logout']) ?>
                <?php endif; ?>
            </div>
        </header>
        <section class="content">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </section>
        <footer>
            <p>
                <a target="_blank" href="http://www.uni-kassel.de/its/">IT-Servicezentrum Universät Kassel</a><br/>
                Mönchebergstraße 11<br />
                34125 Kassel<br />
                Tel: +49 561 804 5678<br />
                <a href="mailto:it-servicedesk@uni-kassel.de">it-servicedesk@uni-kassel.de</a>
            </p>
        </footer>
    </div>
</body>
</html>
