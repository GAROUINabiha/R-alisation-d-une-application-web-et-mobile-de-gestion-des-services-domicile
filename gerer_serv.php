 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Administrateur</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
   <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"/>




   <style type="text/css">
    #ilogout{
      margin-right: 20px;
      width: 50px;
      height: 20px;
      color: white;
     }
       #e {
        color: red;
       }
       #myInput {
    background-image: url('./images/j.png'); /* Add a search icon to input */
    background-position: 9px 10px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 25%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 10px 50px 15px 50px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 20px; /* Add some space below the input */
    height: 50px;
}
#customers{
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
    background-color:  #F1f1f1;
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
                               <a class="az"­ href="home.html">
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
                        <a href="home.html" ><i class="fa fa-home"></i></i>Page d'accueil</a>
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

        <div id="page-wrapper" >
            <div class="panel"><br><div>
  &nbsp;&nbsp;&nbsp;
   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Chercher..." title="Taper un texte">

             </div>

        <div class="panel-heading">
            <center><h5><i class="fa fa-gears"></i> <b>  Liste des services</b></h5></center>

        </div>
     


             



        <!--tableau des services les colonnes et les lignes-->
                <table id='customers' class="table table-bordered  table-hover">
                    <thead>

                        <tr class="header">
                         



                            <th >nom de service</th>
                            <th ><center>photo</center></th>
                            <th ><center>description de service</center></th>

                          
                             <!--
                             <th></th>
                             <th></th>
                         -->
                            </tr>
                    </thead>
                    <tbody>
                        <?php
require "connection_bd.php";
$resultat=mysqli_query($db, "select * from service;");
while ($ligne=mysqli_fetch_array($resultat)) {
    ?>
                            <tr>




                                <td>
                                    <?php echo $ligne['nomSer']; ?>
                                </td>
                                <td>
                                    <?php echo $ligne['photo']; ?>
                                </td>
                                 <td>
                                    <?php echo $ligne['description']; ?>
                                </td>
                                       <td>

                                <a id="<?php echo $ligne['idSer'] ?>" class="me" data-toggle="modal" data-target="#exampleModal2" class="text-danger"><img src="./images/edit.png"></a>
                                </td>
                                <td class="text-capitalize">
                                   <a id="<?php echo $ligne['idSer'] ?>" class="se" data-toggle="modal" data-target="#supp" class="text-danger"><img src="./images/trash.png"></a>
                                </td>
                            </tr>

        <?php  } ?>   
<!-- Modal -->
<div class="modal fade" id="supp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ATTENTION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Etes-vous sure de vouloir supprimer ce service?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger confirmer" >Supprimer</button>
      </div>
    </div>
  </div>
</div>
           <!-- /. PAGE WRAPPER  -->
        </div>
<!-- le button ajouter on peut mettre dans ce champs un form model -->
      
 <center>
       
        <tr><td colspan=80 class="text-center"><center> <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Ajouter Un Service</button></center></td></tr>

       </center>
       <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

                    </tbody>
                </table>
        </div>
                <br />
<!-- le button ajouter on peut mettre dans ce champs un form model -->
    
         <!--  

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...LLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
    </div>
  </div>
</div>

 -->




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center><i class="fa fa-gear"></i> Ajouter Un Service</center></h4>
        </div>

  <div class="form-group">
        <div class="modal-body">

           <form name="myForm" method="post" action="ajouterService.php" enctype="multipart/form-data">

           <input class="form-control form-control-lg" class="validity" placeholder="nom de service" type="text" name="nomSer" required >

           <input class="form-control form-control-lg"  class="validity" placeholder="photo de service" type="file" name="photo" required>

           <input class="form-control form-control-lg"  class="validity" placeholder="description" type="text" name="description" required>
           
              <div class="modal-footer">


                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
     <button type="submit" class="btn btn-default" class="text-center" ><center>Ajouter</center></button>
        </div>
      </div>
          </form>
        </div>
       
      </div>
      
    </div>
  </div>





  
  <!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier le service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userForm" method="post" action="modifierService.php">
 <input class="form-control form-control-lg" placeholder="idSer" type="text" name="idSer" id="idSer" style="display: none;">
  <input  class="form-control form-control-lg"   class="validity" placeholder="nom de service" type="text" name="nomSer" id="nomSer" required >

            <input class="form-control form-control-lg"  class="validity" placeholder="photo de service" type="file" name="photo"  id="photo" required>
 
            <input class="form-control form-control-lg"  class="validity" placeholder="description" type="textarea" name="description"  id="description" required>
     

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary validerc" class="ed" 
        data-toggle="modal" data-target=".bd-example-modal-lg" >Enregistrer les changements</button>
      </form>
      </div>
    </div>
  </div>
</div>

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>







    <script type="text/javascript">
      var id1 = 0;
      $(".me").on("click", function(e){
        //e.preventDefault();
        id1 = $(this).attr("id");
        var url = "selectionnerElemService.php?id=" + id1;
      $.ajax({  
                url: url,  
                method: "GET",
                data: {},
                async: false,
                dataType: "json",
                success:function(data){
                  console.log(data);
                  $("#nomSer").val(data.nomSer);
                  $("#description").val(data.description); 
                    
                  $('#idSer').val(id1);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  }  
           });
    });

      $(".se").on("click", function(e){
        //e.preventDefault();
        id1 = $(this).attr("id");
    });

      $(".confirmer").on("click", function(e){
        //e.preventDefault();
        var url = "supprimer_ser.php?id=" + id1;
        $(location).attr('href', url);
      });












    </script>








</body>
</html>