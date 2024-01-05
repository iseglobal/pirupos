<div class="container d-flex flex-column">
  <div class="row vh-100">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
      <div class="d-table-cell align-middle">
        <div class="text-center mt-4">
          <h1 class="h2">Bienbenido</h1>
          <p class="lead">Por favor, ingrese a su cuenta.</p>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="m-sm-3">
              <form id="frm-sign-in" method="POST">
                <div class="mb-3">
                  <label class="form-label">Usuario</label>
                  <input class="form-control" type="text" name="email" placeholder="Ingrese su usuario">
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Ingres su contraseña">
                  <small>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                  </small>
                </div>
                <div>
                  <div class="form-check align-items-center">
                    <input class="form-check-input" id="customControlInline" type="checkbox" value="remember-me"
                      name="remember-me" checked="">
                    <label class="form-check-label text-small" for="customControlInline">Recuerdame</label>
                  </div>
                </div>
                <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Ingresar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "../../views/partials/dark-ligth.view.php" ?>