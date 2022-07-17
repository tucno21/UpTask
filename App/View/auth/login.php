<?= extend('/auth/layout/head.php') ?>
<div class="px-4 py-1 my-2 text-center">
    <h3 class="display-9 fw-bold">Crea y administra tus proyectos</h3>
</div>

<div class="container">
    <form method="POST" action="<?= base_url('/') ?>">
        <div class="row justify-content-md-center">
            <p class=" h5 mb-3 fw-normal text-center">Iniciar Sesion</p>

            <div class="col-lg-8 m-2 p-1 mx-auto form-floating">
                <input type="email" name="email" class="form-control <?= isset($err->email) ? 'is-invalid' : '' ?>" id="floatingInput" placeholder="name@example.com" value="<?= isset($data->email) ? $data->email : '' ?>">
                <label for="floatingInput">Email</label>
                <?php if (isset($err->email)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->email ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-8 m-2 p-1 mx-auto form-floating">
                <input type="password" name="password" class="form-control <?= isset($err->password) ? 'is-invalid' : '' ?>" id="floatingInput">
                <label for="floatingInput">Password</label>
                <?php if (isset($err->password)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->password ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-8 mx-auto text-center">
                <button class="col-lg-8 mx-auto btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="row justify-content-md-center m-3">
        <div class="col-lg-4 m-1 mx-auto text-center">
            <a class="fs-4 text-info nav-link" href="/register">¿Aún no tienes cuenta? Registrate</a>
        </div>
        <div class="col-lg-4 m-1 mx-auto text-center">
            <a class="fs-4 text-info nav-link" href="/forgot-password">¿Olvidasde tu contraseña?</a>
        </div>
    </div>
</div>

<?= extend('/auth/layout/footer.php') ?>