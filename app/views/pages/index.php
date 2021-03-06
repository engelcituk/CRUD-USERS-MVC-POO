<?php require APPROOT.'/views/shared/head.php'; ?>
<body class="off-canvas-sidebar">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">Página de inicio de sesión</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('<?php echo URLROOT; ?>/img/lock.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form"  action="<?php echo URLROOT . '/pages/index'; ?>" method="post">
              <div class="card card-login card-hidden">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title">Iniciar sesión</h4>
                  
                </div>
                <div class="card-body ">
                  <p class="card-description text-center">Ingrese los datos solicitados</p>
                  
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-user"></i>
                        </span> 
                      </div>
                      <span class="invalid-feedback"><?php echo $data['email_find'];?></span>
                      <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid':''; ?>" name="email" placeholder="Correo electrónico" value="<?php echo $data['email'];?>">
                      <span class="invalid-feedback"><?php echo $data['email_err'];?></span>

                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                        </span>
                      </div>
                      <input type="password" class="form-control"  name="password" placeholder="Contraseña...">
                      
                    </div>
                  </span>
                  
                  <br>
                  <?php flashMensaje('messageApi'); ?>
                </div>
                <div class="card-footer justify-content-center">
                  <button class="btn btn-primary"> <i class="fas fa-sign-in-alt"></i> Iniciar sesión</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!-- End Navbar -->
    <?php require APPROOT.'/views/shared/footer.php'; ?>
    <!-- End Navbar --> 
    </div>
  </div>
    <?php require APPROOT.'/views/shared/scriptjs.php'; ?>
    <script>
        $(document).ready(function() {
          md.checkFullPageBackgroundImage();
          setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
          }, 700);
        });
      </script>
    </body>
</html>

