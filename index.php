<?php 
    include_once ('Requests.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css ">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <title>Pagos Integración</title>

</head>
<body>

<h1>Formulario de Pago de Compras</h1> 

<section class="centro">
    <div class="contenedor">
        <form action="" method=>
            <p class="posicion_izquierda">Nombre: <br><input type="text" name="nombre" value="" class="Input_1"></p>
            <p class="posicion_derecha">Apellido: <br><input type="text" name="nombre" value="" class="Input_1"></p>
            <p class="centrado">Seleccione su banco</p>
            <select name="bancos" id="banks">
                <?php   
                    $bancos = new getBanks;  
                    echo "<option value='bankName' class='options'>".$bancos->ListofBanks(0). "</option>"; 
                        for ($j=1; $j <= 40; $j++) { 
                            echo "<option value='bankName' class='options'>".$bancos->ListofBanks($j). "</option>";
                        }
                    
                ?>
            </select>

        </form>
    </div>


</section>


    
</body>
</html>