<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('title', 'Welcome') ?></title>
        <?php $view['slots']->output('stylesheets') ?>
        <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    </head>
    <body>
        <?php $view['slots']->output('_content') ?>
        <?php $view['slots']->output('javascripts') ?>
    </body>
</html>
