<?= extend('/auth/layout/head.php') ?>
<div class="px-4 py-1 my-2 text-center">
    <h3 class="display-9 fw-bold">Crea y administra tus proyectos</h3>
</div>

<div class="container">
    <form>
        <div class="row justify-content-md-center">
            <p class=" h5 mb-3 fw-normal text-center">Colocar Tu nuevo Passwordk</p>

            <div class="col-lg-8 m-2 p-1 mx-auto form-floating">
                <input type="password" class="form-control " id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nuevo Password</label>
            </div>

            <div class="col-lg-8 mx-auto text-center">
                <button class="col-lg-8 mx-auto btn btn-lg btn-primary" type="submit">Guardar Password</button>
            </div>
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