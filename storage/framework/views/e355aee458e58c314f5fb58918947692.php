<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title><?php echo e($title ?? 'customtitle'); ?></title> <!-- usando uma variável para o título, opcional -->

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        /* seus estilos permanecem os mesmos */
        body {
            background-image: url("img/fundolivro.jpeg");
            background-size: cover;
            background-position: center;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 20px;
        }

        .container-login {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .logo-container {
            width: 100px;
            height: 100px;
            margin: 0 auto 20px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo-container img {
            width: 80%;
            height: auto;
        }

        .title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fff;
        }

        .subtitle {
            font-size: 1rem;
            font-weight: 300;
            margin-bottom: 30px;
            color: #ddd;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-label {
            font-size: 0.9rem;
            margin-bottom: 5px;
            display: block;
            color: #ccc;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background: #222;
            color: #fff;
            font-size: 1rem;
        }

        .form-control:focus {
            outline: none;
            border-color: #717277;
        }

        .btn-submit {
            width: 100%;
            padding: 10px 0;
            background-color: #717277;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #ffffff;
        }

        footer {
            text-align: center;
            font-family: "New Century Schoolbook", "TeX Gyre Schola", serif;
            color: #ffffff;
            background-color: rgba(0, 0, 0, 0.5);
            position: relative;
            margin-top: -40px;
            padding: 10px 0;
        }

        .footer-line {
            width: 80%;
            height: 1px;
            background: #fff;
            margin: 10px auto;
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container-login">
            <?php echo e($slot); ?> <!-- aqui renderiza o conteúdo da página -->
        </div>
    </main>

    <footer>
        <div class="footer-line"></div>
        Copyright © 2024 Todos os Direitos Reservados
    </footer>
</body>
</html>
<?php /**PATH C:\laragon\www\biblioteca\resources\views/pages/livros/administrador/Login/layoutlogin.blade.php ENDPATH**/ ?>