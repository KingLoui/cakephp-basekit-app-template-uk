<?php
$pageTitle = 'UkApp Template';
?>
<?php 
    $user = $this->request->session()->read('Auth.User');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        <?= $pageTitle ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('unitheme.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script_head') ?>

    <?= // Body scripts
        $this->Html->script(
        [
            'KingLoui/BaseKit.vendor/jquery/jquery-3.1.0.min.js', 
            'KingLoui/BaseKit.vendor/bootstrap/bootstrap.min.js',
        ], 
        ['block' => 'scriptfiles_body'])
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <div class="header clearfix">
        <div class="userinfo pull-right">
          <?php if(isset($user)): ?>
              <span>Angemeldet als: <?= $user['username'] ?></span>
              <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'btn btn-default']) ?>
          <?php endif; ?>
        </div>
        <?= $this->Html->image('logo_unikassel.svg', ['class' => 'logo', 'alt' => 'Universität Kassel']); ?>
      </div>

      <?php if(isset($user)): ?>
      <nav>
        <ul class="nav nav-pills">
          <?= $this->Menu->render('menu_main',[
              'renderer' => '\KingLoui\BaseKit\Menu\Renderer\AdminMenuRenderer',
              'currentClass' => 'active',
              'ancestorClass' => 'active'
          ]); ?>
        </ul>
      </nav>
      <?php endif; ?>   
      
      <section class="content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
      </section>

      <footer class="footer">
        <p class="text-center">
          <a target="_blank" href="http://www.uni-kassel.de/its/">IT-Servicezentrum Universät Kassel</a><br/>
          Mönchebergstraße 11<br />
          34125 Kassel<br />
          Tel: +49 561 804 5678<br />
          <a href="mailto:it-servicedesk@uni-kassel.de">it-servicedesk@uni-kassel.de</a>
        </p>
      </footer>

    </div> <!-- /container -->

    <?php $this->append('script_body'); ?>
        <script>
            $(document).ready(function(){
                
            });
        </script>
    <?php $this->end(); ?>

    <?= $this->fetch('scriptfiles_body') ?>
    <?= $this->fetch('script_body') ?>

  </body>
</html>