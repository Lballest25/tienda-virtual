const loadData = () => {
    let url = "../models/executionQueryUsers.php";
    let formData = new FormData();
    formData.append('tipo_operacion', 'select');
    fetch(url, {
        method:'post',
        body:formData
    })
    .then(data => data.json())
    .then(data => {
        paint_resuls_table(data);
    })
    .catch(function(error) {
        console.log('error', error);
    });
}

document.body.onload = loadData();

const form = document.getElementById('formUsers');
form.addEventListener("submit", (e)=>{
    e.preventDefault();
    const datos = new FormData(document.getElementById('formUsers'));
    saveData(datos);
});

const saveData = (data) => {
    let url = "../models/executionQueryUsers.php";
    fetch(url, {
        method:'post',
        body:data
    })
    .then (data => data.json())
    .then (data => {
        console.log(data);
        if (data != 0) {
            paint_resuls_table(data);
            form.reset();
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

const paint_resuls_table = (data) =>{
    let tab_data = document.querySelector("#table_users");
    tab_data.innerHTML = "";
    for(let item of data){
        tab_data.innerHTML +=`
        <tr>
        <td>${item.id}</td>
        <td>${item.usuario}</td>        
        <td>${item.password}</td>
        <td><button onclick="editUser(${item.id})"><ion-icon name='create-outline'></ion-icon></button></td>
        <td><button onclick="deleteUser(${item.id})"><ion-icon name='trash-outline'></ion-icon></button></td>
        </tr>
        `;
    }
}

const deleteUser = (id) => {
    Swal.fire({
        title: 'Estas seguro de eliminar el registro',
        text: "Ya no se podra recuperar el registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
        }).then((result) => {
            confirmDeletion(id, result);            
        })
}

const confirmDeletion = (id, result) => {
    if (result.isConfirmed) {
        let url = "../models/executionQueryUsers.php";
        let formdata = new FormData();
        formdata.append('tipo_operacion', 'delete');
        formdata.append('id', id);
        fetch(url, {
            method: 'post',
            body: formdata
        }).then(data => data.json())
        .then(data => {
            console.log('Success:', data)
            paint_resuls_table(data);
            Swal.fire(
            'Eliminado', 
            'El registro se elimino correctamente.',
            'success'
            )
        })
        .catch(error => console.error('Error:', error));
    }
}

const editUser = (id) => {
    let url = "../models/executionQueryUsers.php";
    let formData = new FormData();
    formData.append('tipo_operacion', 'edit');
    formData.append('id', id);
    fetch(url, {
        method: 'post',
        body:formData
    })
    .then(data => data.json())
    .then(data => {
        console.log('sucess', data);
        for (let iterator of data) {
            updateAttributesModify(iterator.id, iterator.usuario, iterator.password);
        }
    })
    .catch(function (error) {
        console.error('error', error);
    });
}

const update = () => {
    let formData = new FormData(document.getElementById('updateFormUsers'));
    let url = "../models/executionQueryUsers.php";
    fetch(url, {
        method: 'post',
        body: formData
    })
    .then(data =>data.json())
    .then(data => {
        console.log(data);
        paint_resuls_table(data);
        resetAttributes();
        Swal.fire(
            'Exito',
            'Se actualizo con exito',
            'success'
        )
    }).catch(function (error) {
        console.log('Error', error);
    });
}

const updateAttributesModify = (id, user, pass) => {
    $("#formUsers").attr("id", "updateFormUsers");
    $("#tipo_operacion").attr("value", "update");
    $("#id").attr("name", "idu");
    $("#id").val(id);
    $("#user").attr("name", "useru");
    $("#user").val(user);
    $("#password").attr("name", "passwordu");
    $("#password").val(pass);
    $("#agregar").hide();
    $("#modify").removeAttr("hidden");
}

const resetAttributes = () => {
    $("#updateFormUsers").attr("id", "formUsers");
    $("#tipo_operacion").attr("value", "save");
    $("#id").attr("name", "id");
    $("#user").attr("name", "user");
    $("#user").val("");
    $("#password").attr("name", "password");
    $("#password").val("");
    $("#agregar").show();
    $("#modify").hide();
}