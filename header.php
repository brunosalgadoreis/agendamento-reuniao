<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Reserva</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#calendar").datepicker({dateFormat: 'dd-mm-yy'});
            });

            $(function () {
                $("#calendar2").datepicker({dateFormat: 'yy-mm-dd'});
            });
        </script>
    </head>


    <body>
        <header>
            <div class="center">
                <div class="logo">
                    <h2>Agenda Sala de Reunião</h2>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href="logout.php">Sair</a></li>
                    </ul>
                </nav>

                <div class="clear"></div>
            </div>
        </header>

<?php
    require 'classes/Database.php';        
    date_default_timezone_set('America/Sao_Paulo');
?>