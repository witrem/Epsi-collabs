<?php

    include_once $_SERVER['document_ROOT'] . "Includes/main.php";
    session_start();

?>

<html lang="fr">

    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, userscalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="Css/main.css">
        <title>Epsi Collabs</title>
    
    </head>

    <body>
        
        <?php include "Includes/nav.php"; ?>

        <input type="text" id="search" placeholder="Compétences, artices">

        <section id="competences" class="txt-center txt-light card border hide">
            <table>
                
                <thead>
                    <tr>
                        <th id="comp-title" class="txt-center">Compétences</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="clickable">PHP</td>
                    </tr>
                    <tr>
                        <td class="clickable">Javascript</td>
                    </tr>
                    <tr>
                        <td class="clickable">C++</td>
                    </tr>
                </tbody>
            
            </table>

        </section>

    </body>

</html>