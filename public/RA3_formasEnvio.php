<html>
    <head>
        <title>Prueba envío</title>
    </head>
    <body>

<?php if(!empty($_GET)) echo "<p>Errores:" . $_GET['errores'] . "</p>"; ?>
        <a href="clientes.php?numero=5">Listado de 5 clientes.</a><br />
        <a href="clientes.php?numero=10">Listado de 10 clientes.</a>

        <form action="clientes.php" method="post">
            <label for="numero">Horas</label>
            <input type="number" name="horas">
            <input type="text" name="codCiclo" />
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>