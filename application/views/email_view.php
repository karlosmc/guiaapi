<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMIONES HOWO-SINOTRUCK</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Poppins:ital,wght@0,100;0,200;1,100;1,200&display=swap" rel="stylesheet">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .img {
            width: 230px;
            max-height: 100px;
            margin: 5px;
        }

        .contenedor {
            padding: 0 200px;
            width: 90%;
            max-width: 1000px;
            margin: auto;
            overflow: hidden;

        }

        .contenedor2 {
            display: flex;
            justify-content: space-evenly;
            flex-direction: row;
            align-items: center;
        }

        .misdatos p {

            line-height: 0.5;
        }

        .bold {
            font-weight: bold;
        }

        .imagenes {
            display: flex;
            flex-direction: column;
        }

        .text-center {
            text-align: center;
        }

        .mt {
            margin-top: 10px;
        }

        .row_container {
            display: flex;
            justify-content: space-between;
        }
    </style>

</head>

<body>
    <div class="contenedor mt">
        <div class="row_container">
        
                <img style="max-height: 100px;margin: 5px;" width="230" height="60" src="<?php echo $baseurl;?>/application/views/assets/logohowo.png" alt="imagen1">
                <img style="max-height: 100px;margin: 5px;" width="230" height="60" src="<?php echo $baseurl;?>/application/views/assets/sinotruk1.png" alt="imagen2">
        </div>
        <div class="mt">
            <p>Estimado cliente, gracias por contactarse con nosotros, pronto un asesor se contactará contigo</p>
        </div>
        <div class="mt text-center">
            <p class="bold">TU INFORMACIÓN</p>
        </div>
        <ul>
            <li><strong>Nro. Documento: </strong><?php echo $nrodocumento; ?></li>
            <li><strong>Nombres: </strong><?php echo $nombresapellidos; ?></li>
            <li><strong>Teléfono: </strong><?php echo $telefono; ?></li>
            <li><strong>E-mail: </strong><?php echo $email; ?></li>
            <li><strong>Ciudad: </strong><?php echo $ciudad; ?></li>
            <li><strong>Modelo: </strong><?php echo $detalles->modelo; ?></li>
        </ul>

    </div>
</body>

</html>