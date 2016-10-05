<?php $pageTitle = 'BaseKit:'; ?>
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

    <?= $this->Html->css('basekit-admin.css') ?>
    <?= $this->Html->css('KingLoui/BaseKit.vendor/animate/animate.css') ?>
    <?= $this->Html->css('KingLoui/BaseKit.vendor/font-awesome/font-awesome.min.css') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script_head') ?>

    <?php // Body scripts
        $this->prepend('scriptfiles_body', $this->Html->script([
            'KingLoui/BaseKit.vendor/jquery/jquery-3.1.0.min.js', 
            'KingLoui/BaseKit.vendor/bootstrap/bootstrap.min.js',
            'KingLoui/BaseKit.vendor/slimscroll/jquery.slimscroll.min.js',
            'KingLoui/BaseKit.vendor/metismenu/jquery.metisMenu.js',
            'KingLoui/BaseKit.vendor/pace/pace.min.js',
            'KingLoui/BaseKit.theme-basekit-admin.js'
        ]));
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <?php if($headerElement !== "") 
                            echo $this->element($headerElement);
                        ?>
                        <div class="logo-element"><?= $headerLogo ?></div>
                    </li>
                    <?= $this->Menu->render('menu_admin',[
                        'renderer' => '\KingLoui\BaseKit\Menu\Renderer\AdminMenuRenderer',
                        'currentClass' => 'active',
                        'ancestorClass' => 'active'
                    ]); ?>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="overlay">
            </div>
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <?php if($topLinksElement !== "") 
                        echo $this->element($topLinksElement);
                    ?>                    
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?= $this->fetch('title') ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <?= $this->Html->link('Home', '/admin'); ?>
                        </li>
                        <?= $this->Menu->render('menu_admin',[
                            'renderer' => '\KingLoui\BaseKit\Menu\Renderer\BreadcrumbsRenderer',
                            'currentClass' => 'active'
                        ]); ?>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <?= $this->fetch('scriptfiles_body') ?>
    <?= $this->fetch('script_body') ?>
  </body>
</html>