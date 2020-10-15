<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Simple Administrateur</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <style type="text/css">
        #ilogout {
            margin-right: 20px;
            width: 50px;
            height: 20px;
            color: white;
        }

        #customers {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            font-size: 15px; /* Increase font-size */
        }

        #customers th, #customers td {
            text-align: left; /* Left-align text */
            padding: 12px; /* Add padding */
        }

        #customers tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }

        #customers tr.header, #customers tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #F1f1f1;
        }
    </style>
</head>
<body>


<?php
require 'connection_bd.php';
?>


<div id="wrapper">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="az" ­ href="home.html">
                    <img src="assets/admin.png" width="100" height="100"/>

                </a>

            </div>
            <a href="index.php" class="logout-spn"><i id="ilogout" class="fa fa-sign-out fa-lg" aria-hidden="true"></i></a>
        </div>
    </div>


    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">

                <li>
                    <a href="home.html"><i class="fa fa-home"></i></i>Page d'accueil</a>
                </li>
                <li>
                    <a href="gerer_emp.php"><i class="fa fa-users"></i>Les employés</a>
                </li>
                <li>
                    <a href="gerer_serv.php"><i class="fa fa-gears"></i>Les services</a>
                </li>
                <li>
                    <a href="gerer_avis.php"><i class="fa fa-comments-o"> </i>Les avis </a>
                </li>
            </ul>
        </div>

    </nav>


    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div class="panel">
            <div class="panel-heading">
                <center>
                    <h7><i class="fa fa-comments-o"> </i> <b>Les Avis Des Clients</b></h7>
                </center>
            </div>


            <!--tableau des services les colonnes et les lignes-->
            <table id='customers' class="table table-bordered  table-hover">
                <thead>
                <tr class="header">
                    <th>date</th>
                    <th>description Avis</th>
                    <th>Nom Service</th>
                    <th>Nom/Prenom Utilisateur</th>

                    <th></th>

                </tr>
                </thead>
                <tbody>
                <?php
                require "connection_bd.php";
                $query = "SELECT a.*, s.nomSer ,c.nom,c.prenom
FROM avis a LEFT JOIN service s ON (s.idSer=a.idSer) 
LEFT JOIN client c ON (c.idCl=a.idCl) ";
                $resultat = mysqli_query($db, $query);
                while ($ligne = mysqli_fetch_array($resultat)) {
                    ?>
                    <tr class="
                            <?php if ($ligne[5] == 1) {
                        echo "bg-success";

                    } else {
                        echo "bg-warning";
                    } ?>
                            ">
                        <td>
                            <?php echo $ligne[1]; ?>
                        </td>
                        <td>
                            <?php echo $ligne[2]; ?>
                        </td>
                        <td>
                            <?php echo $ligne[6]; ?>
                        </td>
                        <td>
                            <?php echo $ligne[7] . ' ' . $ligne[8]; ?>
                        </td>
                        <td>
                            <a class="text-danger" href="supprimer_avis.php?id=<?php echo $ligne['idA'] ?>"><img
                                    src="./images/trash.png"></a>
                        </td>
                    </tr>
                <?php } ?>

                <center>

                    <tr>
                        <td colspan=20 class="text-center">
                            <center><a href="miseajourPageAvis.php"><i class="fa fa-refresh fa-lg"></i></a></center>
                        </td>
                        
                    </tr>

                </center>
            </table>

<br>
            <!-- /. WRAPPER  -->
            <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
            <!-- JQUERY SCRIPTS -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- BOOTSTRAP SCRIPTS -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- CUSTOM SCRIPTS -->
            <script src="assets/js/custom.js"></script>
</body>
</html>