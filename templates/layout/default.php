<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?> -
        <?= 'magicplan' ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <h1>Hi, Hallo, Salut 👋</h1>

            <div>
                <h3>Interested in magicplan? Already a customer?</h3>
                <h3>We're here for you</h3>
            </div>
        </div>
    </nav>
    <main class="main" id="main">
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>

    <?php
    echo $this->Html->scriptBlock(sprintf(
        'var csrfToken = %s;',
        json_encode($this->request->getAttribute('csrfToken'))
    ));
    ?>
    <?= $this->Html->script('app') ?>
</body>
</html>
