<!DOCTYPE html>
<html lang="es">

<head>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

        .info {
            position: fixed;
            display: flex;
            top: 0;
            right: 0;
            width: 100%;
            height: 30px;
            background: #0F2027;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            justify-content: space-around;
            margin: 0;
            padding: 0;
            font-weight: 300;

        }

        .data {
            margin: 5px 0 0 0;
            padding: 0 0 0 5px;
            color: white;
        }

        .info>a {
            margin: 5px;
            padding: 0 3px;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }

        .info>a:hover {
            color: black;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="info">
        <p class="data"><?php echo ""; ?></p>
        <p class="data"><?php echo $nombre; ?></p>
        <p class="data"><?php echo $email; ?></p>
        <a href="./index.html">Cerrar sesion</a>
    </div>
</body>

</html>