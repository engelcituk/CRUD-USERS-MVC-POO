
<div class="modal fade" id="showUser" tabindex="-1" role="dialog" aria-labelledby="showUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showUserLabel">Actualizar información del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <div class="card-body ">
            <div class="form-group d-none">
              <input type="text" class="form-control " id="tokenCSRF" value="<?php echo $_SESSION["tokencsrf"]; ?>">
              <input type="text" class="form-control " id="idUser">
            </div>
            
            <div class="form-group">
              <label for="name" class="form-label"> Nombre completo *</label> 
              <input type="text" class="form-control " id="nameEdit" required="true" aria-required="true" aria-invalid="false" onkeyup="activeButton()">
              <label id="name-error" class="error" for="name"></label>
            </div>

            <div class="form-group">
              <label for="emailEdit" class="form-label"> Correo electrónico *</label> 
              <input type="text" class="form-control " id="emailEdit" required="true" aria-required="true" aria-invalid="false" onkeyup="activeButton()">
              <label id="emailEdit-error" class="error" for="emailEdit"></label>
            </div>

            <div class="form-group">
               <label for="passwordEdit" class="form-label"> Contraseña *</label> 
              <input type="password" class="form-control " id="passwordEdit" required="true" aria-required="true" aria-invalid="false">
              <label id="password-error" class="error" for="passwordEdit"></label>
            </div> 

            <div class="form-group d-none">
               <label for="passwordEditOld" class="form-label"> Contraseña *</label> 
              <input type="text" class="form-control " id="passwordEditOld" required="true" aria-required="true" aria-invalid="false">
              <label id="password-error" class="error" for="passwordEditOld"></label>
            </div>

          
                        
          </div>          
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning mr-auto" data-dismiss="modal"> <i class="fas fa-window-close"></i> Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnSaveUser" onclick="updateUser()" disabled> <i class="fas fa-save"></i> Guardar cambios</button>
      </div>
    </div>
  </div>
</div>