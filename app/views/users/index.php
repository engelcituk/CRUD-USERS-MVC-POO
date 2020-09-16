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
                                
                                <a href="<?php echo URLROOT; ?>/users/create" class="btn btn-info mr-auto" > <i class="fa fa-user"></i> Agregar usuario</a>
                                
                                <?php flashMensaje('register_success'); ?>

                                <div class="card ">
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <h4 class="card-title">Usuarios</h4>
                                    </div>
                                   
                                    <div class="card-body ">
                                        <div class="material-datatables">
                                            <table id="users" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Creado</th>
                                                        <th class="disabled-sorting text-right">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if( $data['total'] > 0 ){ //si los datos son mayores a cero
                                                            $contador = 1;
                                                            foreach ($data['users'] as  $user) {

                                                                $hideBtnDelete = $_SESSION['idUser'] == $user->id ? 'd-none' : '';
                                                                $name = "'".$user->name."'";

                                                                echo '<tr>
                                                                      <td>'.$user->id .'</td>
                                                                      <td>'.$user->name.'</td>
                                                                      <td>'.$user->email.'</td>
                                                                      <td>'.$user->created_at.'</td>
                                                                      <td class="text-right">
                                                                            <button class="btn btn-sm btn-info" onclick="showUser('.$user->id.')"><i class="fas fa-edit"></i></button>
                                                                            <button class="btn btn-sm btn-danger '.$hideBtnDelete.' " onclick="deleteUser('.$user->id.','.$name.')"><i class="fas fa-trash"></i></button>
                                                                      </td>
                                                                ';
                                                                echo '</tr>';
                                                                $contador++;
                                                            }
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal modalShowUser-->
            <?php require APPROOT .'/views/users/partials/modalShowUser.php'; ?> 
            <!-- modal modalShowUser-->
            <!-- footer -->
            <?php require APPROOT . '/views/shared/footer.php'; ?> 
            <!-- footer -->
            </div>
        </div>
        <?php require APPROOT . '/views/shared/scriptjs.php'; ?> 
        <script src="<?php echo URLROOT; ?>/js/users/index.js"></script> <!-- Contiene el script para aplicar datatables -->
    </body>
</html> 