const formLogin = document.querySelector('#formLogin');
formLogin.addEventListener('submit', (e) => {
    e.preventDefault();
    const datosForm = new FormData(formLogin);
    var url = "../admin/models/executionQueryUsers.php";
    fetch(url, {
        method: "POST",
        body: datosForm
    })
    .then(data => data.text())
    .then(data => {
        if (data != 0) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Bienvenido!',
                showConfirmButton: false,
                timer: 1500
              })
              location.href = "../admin/sections/inicio.php";
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Datos incorrectos!'
              })
            return false;
        }
    });
});