<?= view('layouts/header') ?>
<?= view('layouts/navbar_horizontal') ?>
<?= view('layouts/navbar_vertical') ?>
<?= '<script>window.localStorage.setItem("id", "'.$id.'")</script>'?>
    <app-root></app-root>
    <br><br><br>

    <script src="<?= base_url() ?>/assets/js/quotation_edit/runtime-es2015.cdfb0ddb511f65fdc0a0.js" type="module"></script>
    <script src="<?= base_url() ?>/assets/js/quotation_edit/runtime-es5.cdfb0ddb511f65fdc0a0.js" nomodule defer></script>
    <script src="<?= base_url() ?>/assets/js/quotation_edit/polyfills-es5.0290b245fbcca09184ac.js" nomodule defer></script>
    <script src="<?= base_url() ?>/assets/js/quotation_edit/polyfills-es2015.ffa9bb4e015925544f91.js" type="module"></script>
    <script src="<?= base_url() ?>/assets/js/quotation_edit/main-es2015.aebe1adf88ff02f590c0.js" type="module"></script>
    <script src="<?= base_url() ?>/assets/js/quotation_edit/main-es5.aebe1adf88ff02f590c0.js" nomodule defer></script>

<?= view('layouts/footer'); ?>