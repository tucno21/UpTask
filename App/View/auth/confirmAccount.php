<?= extend('/auth/layout/head.php') ?>
<div class="px-4 py-1 my-2 text-center">
    <h3 class="display-9 fw-bold">Crea y administra tus proyectos</h3>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <?php if ($alert == '') { ?>
            <p class=" h5 mb-3 fw-normal text-center">Cuenta comprobada correctamente</p>
        <?php } else {  ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $alert ?>
            </div>
        <?php } ?>
    </div>

</div>

<div class="container">
    <div class="row justify-content-md-center m-3">
        <div class="col-lg-4 m-1 mx-auto text-center">
            <a class="fs-4 text-info nav-link" href="/">Iniciar sesión</a>
        </div>
    </div>
</div>

<?= extend('/auth/layout/footer.php') ?>