const token = document.getElementById("tokenCSRF").value; //obtengo el token, que está en campo oculto del modal showUser

let users = $('#users').DataTable({
    responsive: true,
    //bDestroy: true,
    language: {
    "decimal": "",
    "emptyTable": "No hay información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "Sin resultados encontrados"
    },
});

function showUser(id) {

    $.ajax({
        url: "users/getUserById", 
        type: "POST",
        dataType:"json",
        data: {
            idUser:id,
            tokenCsrf: token
        },
        success: function(respuesta) { //respuesta es un json
            ok = respuesta.ok;
            if(ok){
                usuario = respuesta.user; 
                //si esos valores no existen, se mandan vacíos
                idUser = usuario.id;
                name = usuario.name;
                email = usuario.email;
                password = usuario.password;
                //se pinta en los campos los valores obtenidos
                document.getElementById("idUser").value = idUser;
                document.getElementById("nameEdit").value = name;
                document.getElementById("emailEdit").value = email;
                document.getElementById("passwordEditOld").value = password;

                $('#showUser').modal('show');//muestro el modal con los datos cargados
                activeButton(); //se llama la funcion para activar/desactivar el botón de actualizar del modal

            }            
        },
        error: function(respuesta) {
            console.log('error')
        }
    })
}

function updateUser() {

    id = document.getElementById("idUser").value ;
    name = document.getElementById("nameEdit").value ;
    email = document.getElementById("emailEdit").value;
    newPassword = document.getElementById("passwordEdit").value;
    oldPassword = document.getElementById("passwordEditOld").value;
    //creo el objeto user con los datos recogidos
    user = { id, name, email, newPassword, newPassword, oldPassword};

    $.ajax({
        url: "users/updateUser", 
        type: "POST",
        dataType:"json",
        data: {
            user,
            tokenCsrf: token
        },
        success: function(respuesta) { //respuesta es un json
            ok = respuesta.ok;
            if(ok){
                mensaje= respuesta.mensaje;
                showMessageNotify(mensaje, 'info', 2500); //muestro alerta
                $('#showUser').modal('hide');
                setTimeout(() => {
                    location.reload();
                }, 3000);
            }
                           
        },
        error: function(respuesta) {
            console.log('error')
        }
    })
}

function deleteUser(id, name) {
    Swal.fire({
        title: `¿Seguro de eliminar a  ${name}?`,
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: '¡Cancelar!',
        confirmButtonText: 'Sí, borrarlo!'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "users/deleteUser", 
                type: "POST",
                dataType:"json",
                data: {
                    id,
                    tokenCsrf: token
                },
                success: function(respuesta) { //respuesta es un json
                    ok = respuesta.ok;
                    if(ok){
                        mensaje = respuesta.mensaje+': '+name;
                        showMessageNotify(mensaje, 'success', 2000); //muestro alerta
                        setTimeout(() => {
                            location.reload();
                        }, 2500);
                    }              
                },
                error: function(respuesta) {
                    console.log('error')
                }
            })
        }
    })
}

// funcion exclusiva para mostrar mensajes como notificaciones
function showMessageNotify(mensaje, tipo, duracion) {
    $.notify({							
      message: `<i class="fa fa-sun"></i><strong> ${mensaje}</strong>`
      },{								
          type: tipo,
          delay: duracion,
          z_index: 3000,
    });
} 

function activeButton() {
    name = document.getElementById("nameEdit").value ;
    email = document.getElementById("emailEdit").value ;
    password = document.getElementById("passwordEdit").value;
    
    let disabled = (name == '' || email == ''  ) ? true : false ;   

    $('#btnSaveUser').prop("disabled", disabled);
}