<div class="sidebar" data-color="rose" data-background-color="black" data-image="<?php echo URLROOT; ?>/img/sidebar-1.jpg">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          :)  
        </a>
        <a href="#" class="simple-text logo-normal">
        <?php echo SITENAME; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo URLROOT; ?>/img/avatar.png" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                 <?php echo $_SESSION['usuario'];?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo URLROOT; ?>/user/profile">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> <?php echo $_SESSION['emailUser'];?> </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          
          
          <li class="nav-item <?php echo activeMenuArray([ROOTFOLDER.'users']); ?>">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
            <i class="fas fa-users"></i>
              <p> Usuarios
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse <?php echo setCollapseShowArray([ROOTFOLDER.'users',ROOTFOLDER.'users/profile',ROOTFOLDER.'users/create',ROOTFOLDER.'users/agregar']); ?>" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item <?php echo activeMenu(ROOTFOLDER.'users'); ?>">
                  <a class="nav-link" href="<?php echo URLROOT; ?>/users">
                    <span class="sidebar-mini"> <i class="fas fa-users"></i> </span>
                    <span class="sidebar-normal">Usuarios </span>
                  </a>
                </li>
                <li class="nav-item <?php echo activeMenu(ROOTFOLDER.'users/create'); ?>">
                  <a class="nav-link" href="<?php echo URLROOT; ?>/users/create">
                    <span class="sidebar-mini"> <i class="fas fa-plus-square"></i>  </span>
                    <span class="sidebar-normal"> Agregar </span>
                  </a>
                </li>
                <li class="nav-item <?php echo activeMenu(ROOTFOLDER.'users/profile'); ?>">
                  <a class="nav-link" href="<?php echo URLROOT; ?>/users/profile">
                    <span class="sidebar-mini"> <i class="fas fa-user"></i> </span>
                    <span class="sidebar-normal"> Perfil </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

        </ul>
      </div>
    </div>