<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--Datatables-->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
        href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script
        src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script
        src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script
        src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?= $this->Html->script(['https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        'https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js',
    ]) ?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/establishments/">
            Início
        </a>
        <a class="navbar-brand" href="/api/manual">
            Endpoint
        </a>
    </div>
</nav>
<br>
<main class="main">
    <?php
    if (!empty($this->request->getSession()->read('Flash'))) {
        $flash = $this->request->getSession()->read('Flash');
        $this->request->getSession()->delete("Flash");
        foreach ($flash['flash'] as $item) {
            $msg = $item['message'];
            $tipoMsg = explode('/', $item['element']);
            echo "
                    <script type='text/javascript'>
                        Swal.fire({
                            icon: '{$tipoMsg[1]}',
                            html: '{$msg}',
                            showConfirmButton: false,
                            timer: 5000,
                        });
                    </script>
                ";
        }
    }
    ?>
    <div class="container-fluid">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer class="d-flex flex-wrap align-items-end py-3 my-4 border-top container-fluid">
    <div class="col">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            </a>
            <span class="mb-3 mb-md-0 text-muted">Raul Tavares Cecatto</span>
        </div>
    </div>
    <div class="col-4 d-flex justify-content-end">
        <ul class="nav col-md-4 d-flex flex-row-reverse list-unstyled d-flex">
            <a href="https://www.linkedin.com/in/raulcecatto/" target="_blank" type="button" class="btn btn-info"><i
                    class="fa-brands fa-linkedin"></i></a>&nbsp;
            <a href="https://github.com/cecattot" target="_blank" type="button" class="btn btn-info"><i
                    class="fa-brands fa-github"></i></a>&nbsp;
            <a href="http://lattes.cnpq.br/3337450965056307" target="_blank" type="button" class="btn btn-info"><i
                    class="fa-solid fa-file"></i></a>
        </ul>
    </div>
    <!--        <div class="col"></div>-->
</footer>

<?= $this->Html->script(['datatables']) ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
</body>
</html>
