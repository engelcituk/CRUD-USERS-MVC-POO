<?php require APPROOT . '/views/shared/head.php'; ?>
    <body class="">
        <div class="wrapper ">
            <!-- sidebar -->
            <?php require APPROOT . '/views/shared/sidebar.php'; ?> 
            <!-- sidebar -->
            <div class="main-panel">
            <!-- Navbar -->
                <?php require APPROOT . '/views/shared/navbar.php'; ?> 
            <!-- End Navbar -->
            <div class="content">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo URLROOT; ?>/users" class="btn btn-warning mr-auto" > <i class="fas fa-arrow-left"></i> Volver</a>
                            <?php flashMensaje('updated_success'); ?>
                            
                            <div class="card ">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <h4 class="card-title">Modificar datos</h4>
                                </div>
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="<?php echo URLROOT.'/users/profile'; ?>" method="post">
                                                <div class="form-group d-none">
                                                    <input type="text" class="form-control" name="tokenCSRF" value="<?php echo $_SESSION["tokencsrf"]; ?>">
                                                    <input type="text" class="form-control" name="idUser" value="<?php echo $data['id']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="form-label"> Nombre de usuario *</label> 
                                                    <input type="text" class="form-control" name="name"  aria-required="true" value="<?php echo $data['name'];?>">
                                                    <span class="error" for="name"><?php echo $data['name_err'];?></span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="form-label"> Correo electrónico *</label> 
                                                    <input type="text" class="form-control" name="email"  aria-required="true" value="<?php echo $data['email'];?>">
                                                    <span class="error" for="email"><?php echo $data['email_err'];?></span>
                                                </div>
    
                                                <div class="form-group">
                                                    <label for="password" class="form-label"> Contraseña 6 caracteres min *</label> 
                                                    <input type="password" class="form-control" name="password" aria-required="true" value="<?php echo $data['password'];?>">
                                                    <span class="error"><?php echo $data['password_err'];?></span>
                                                </div>

                                                <div class="form-group d-none">
                                                    <label for="password" class="form-label"> Contraseña 6 caracteres min *</label> 
                                                    <input type="password" class="form-control" name="oldPassword" aria-required="true" value="<?php echo $data['oldPassword'];?>">
                                                    <span class="error"><?php echo $data['oldPassword_err'];?></span>
                                                </div>

                                                <button class="btn btn-primary"> <i class="fas fa-save"></i> Actualizar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <?php require APPROOT . '/views/shared/footer.php'; ?> 
            <!-- footer -->
            </div>
        </div>
        <?php require APPROOT . '/views/shared/scriptjs.php'; ?> 
        <script src="<?php echo URLROOT; ?>/js/usuariosHotspot/agregar.js"></script> <!-- Contiene el script para aplicar validaciones -->

    </body>
</html>