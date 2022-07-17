<?= extend('/auth/layout/head.php') ?>
<div class="px-4 py-1 my-2 text-center">
    <h3 class="display-9 fw-bold">Crea y administra tus proyectos</h3>
</div>

<div class="container">
    <form method="POST" action="<?= base_url('/reset-password') ?>">
        <div class="row justify-content-md-center">
            <?php if (!isset($alert)) { ?>

                <p class=" h5 mb-3 fw-normal text-center">Colocar Tu nuevo Password</p>
                <input type="hidden" name="token" value="<?= isset($user->token) ? $user->token :  $data->token ?>">

                <div class="col-lg-8 m-2 p-1 mx-auto form-floating">
                    <input type="password" name="password" class="form-control <?= isset($err->password) ? 'is-invalid' : '' ?>" id="floatingInput">
                    <label for="floatingInput">Password</label>
                    <?php if (isset($err->password)) : ?>
                        <div class="invalid-feedback">
                            <?= $err->password ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-8 m-2 p-1 mx-auto form-floating">
                    <input type="password" name="repassword" class="form-control <?= isset($err->repassword) ? 'is-invalid' : '' ?>" id="floatingInput">
                    <label for="floatingInput">Repetir Password</label>
                    <?php if (isset($err->repassword)) : ?>
                        <div class="invalid-feedback">
                            <?= $err->repassword ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-8 mx-auto text-center">
                    <button class="col-lg-8 mx-auto btn btn-lg btn-primary" type="submit">Guardar Password</button>
                </div>
            <?php } else {  ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $alert ?>
                </div>
            <?php } ?>
        </div>
    </form>
</div>

<div class="container">
    <div class="row justify-content-md-center m-3">
        <div class="col-lg-4 m-1 mx-auto text-center">
            <a class="fs-4 text-info nav-link" href="/">¿Ya tienes cuenta? Iniciar sesión</a>
        </div>

        <div class="col-lg-4 m-1 mx-auto text-center">
            <a class="fs-4 text-info nav-link" href="/register">¿Aún no tienes cuenta? Registrate</a>
        </div>

    </div>
</div>

<?= extend('/auth/layout/footer.php') ?>