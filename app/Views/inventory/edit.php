<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?> Editar remisión <?= $this->endSection() ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/js/edit_inventory/styles.523cab83d3477d6d96ff.css" media="print" onload="this.media='all'">
<link rel="stylesheet" href="<?= base_url('css/angular.css') ?>">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<noscript>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/js/edit_inventory/styles.523cab83d3477d6d96ff.css">
</noscript>
<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <app-root></app-root>
                <br><br><br>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script>localStorage.setItem('id', <?= $id ?>)</script>
<script src="<?= base_url() ?>/assets/js/edit_inventory/runtime.58e5c3603de5b46c8a86.js" defer></script>
<script src="<?= base_url() ?>/assets/js/edit_inventory/polyfills.dacd6549d6eac8a326be.js" defer></script>
<script src="<?= base_url() ?>/assets/js/edit_inventory/main.622fa1dae3c3888953b8.js" defer></script>
<?= $this->endSection() ?>


