const loadData = () => {
    let url = "../models/executionQuery.php";
    let formData = new FormData();
    formData.append('tipo_operacion', 'select');
    fetch(url, {
        method:'post',
        body:formData
    })
    .then(data => data.json())
    .then(data => {
        pintar_tabla_resultados(data);
    })
    .catch(function(error) {
        console.log('error', error);
    });
}

document.body.onload = loadData();

const formulariop = document.querySelector("#form");
formulariop.addEventListener("submit", (e) =>{
    e.preventDefault();
    const datos = new FormData(document.getElementById('form'));   
    saveData(datos);
});

const saveData = (data) => {
    var url = "../models/executionQuery.php";
    fetch(url, {
        method:'post',
        body:data
    })
    .then (data => data.json())
    .then (data => {
        if (data != 0) {
            pintar_tabla_resultados(data);
            formulariop.reset();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Registrado!',
                showConfirmButton: false,
                timer: 1500
          })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes completar todos los campos!'
              })
          }
    })
    .catch(function(error){
        console.log('error', error);
    });
}

const pintar_tabla_resultados = (data) =>{
     let tab_datos = document.querySelector("#tabla_juego");
     tab_datos.innerHTML = "";
     for(let item of data){
         tab_datos.innerHTML +=`
         <tr>
         <td>${item.id}</td>
         <td>${item.nombre}</td>        
         <td><img src="../img/${item.imagen}" width='60px'></td>
         <td>${item.precio}</td>
         <td>${item.cantidad}</td>
         <td><button onclick="editar(${item.id})"><ion-icon name='create-outline'></ion-icon></button></td>
         <td><button onclick="eliminar(${item.id})"><ion-icon name='trash-outline'></ion-icon></button></td>
         </tr>
         `;
     }
}

const eliminar = (id) =>{
    Swal.fire({
    title: 'Estas seguro de eliminar el registro',
    text: "Ya no se podra recuperar el registro",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar'
    }).then((result) => {
        confirmarEliminacion(id, result);
    })
}

const confirmarEliminacion = (id, result) =>{
    if (result.isConfirmed) {
        var url = "../models/executionQuery.php";
        var formdata = new FormData();
        formdata.append('tipo_operacion', 'eliminar');
        formdata.append('id', id);
        fetch(url, {
            method: 'post',
            body: formdata
        }).then(data => data.json())
        .then(data => {
            console.log('Success:', data)
            pintar_tabla_resultados(data);
            Swal.fire(
            'Eliminado', 
            'El registro se elimino correctamente.',
            'success'
            )
        })
        .catch(error => console.error('Error:', error));       
    }
}

const editar = (id) => {
    var url = "../models/executionQuery.php";
    var formData = new FormData();
    formData.append('tipo_operacion','editar');
    formData.append('id',id);
    fetch(url,{
        method:'post',
        body:formData
    })
    .then(data => data.json())
    .then(data => {
        for (const iterator of data) {
            updateAttributesModifyP(iterator.id, iterator.nombre, iterator.imagen, iterator.precio, iterator.cantidad);
        }
    })
    .catch(function (error){
        console.error('error',error);
    }); 
}

const actualizar = () => {
        let datos_actualizar = new FormData(document.querySelector("#updateFormProd"));
        let url = "../models/executionQuery.php";
        fetch(url, {
            method: 'post',
            body: datos_actualizar
        })
        .then(data => data.json())
        .then(data =>{ 
            pintar_tabla_resultados(data);
            resetAttributesP();
            Swal.fire(
                'Exito',
                'Se actualizo con exito',
                'success'
            )
        })
        .catch(function(error){
            console.error('Error:', error);
        });
}

const updateAttributesModifyP = (id, nombre, imagen, precio, cantidad) => {
    $("#form").attr("id", "updateFormProd");
    $("#tipo_operacion").attr("value", "update");
    $("#id").attr("name", "idu");
    $("#id").val(id);
    $("#nombre").attr("name", "nombreu");
    $("#nombre").val(nombre);
    $("#imagen").attr("name", "imagenu");
    let imagen_aux = imagen[0].files[0];
    $("#imagen").val(imagen_aux);
    $("#precio").attr("name", "preciou");
    $("#precio").val(precio);
    $("#cantidad").attr("name", "cantidadu");
    $("#cantidad").val(cantidad);
    $("#agregar").hide();
    $("#modify").removeAttr("hidden");
}

const resetAttributesP = () => {
    $("#updateFormProd").attr("id", "form");
    $("#tipo_operacion").attr("value", "guardar");
    $("#id").attr("name", "id");
    $("#nombre").attr("name", "nombre");
    $("#nombre").val("");
    $("#imagen").attr("name", "imagen");
    $("#imagen").removeAttr("value");
    $("#precio").attr("name", "precio");
    $("#precio").val("");
    $("#cantidad").attr("name", "cantidad");
    $("#cantidad").val("");
    $("#agregar").show();
    $("#modify").hide();
}