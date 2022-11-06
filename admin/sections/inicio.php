<?php include("../templates/headboard.php"); ?>
<div class="contenedorVisual">
    <div class="descripcionInicio">
    <h3 class="tituloInicio">Bienvenido!</h3>
    <p class="parrafoDescripcionInicio">Aqui podras gestionar la informacion de la tienda virtual BARGAME, podras acceder a las funcionalidades de crear, leer, actualizar y eliminar los datos!</p>
    </div>
    <div class="contenedorRedirecciones">
        <div class="redireccionUsuarios">
        <a href="users.php" class="aRedireccionUsuarios">
            <h3 class="tituloRedireccionUsuarios">Usuarios</h3>
            <ion-icon name="people"></ion-icon>
        </a>
        </div>
        <div class="redireccionProductos">
        <a href="products.php" class="aRedireccionProductos">
            <h3 class="tituloRedireccionProductos">Productos</h3>
            <ion-icon name="game-controller"></ion-icon>
        </a>
        </div>
    </div>
</div>
<?php include("../templates/foot.php"); ?>