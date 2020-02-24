

<?php
  session_start();

 ///////////////////////////////////////////////
  $db = mysqli_connect('localhost','root','pascal59264','admin');
  $req_select_nom ='SELECT Nom FROM fichier';
  $exec_select_nom = $db->query('SELECT * FROM fichier');
  echo $_SESSION["username"];
 


  //////////////////////////////////////////
  ////////////////////////////////////////// 
   // $ldap_con = ldap_connect("ldap://ValProcess.lan");
   // ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
   // $ldap_dn ="VALPROCESS\\".$_SESSION["username"];
   // $ldap_password = $_SESSION["password"];
    //$dir_path = "\\\\SSSR0003\\ssdfs\\Sites$\\";
    //$files = scandir($dir_path);
   // $rfiles= array($files);
   /////////////////////////////////////////////

  ?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style2.css">
  </head>
  <body>
  
    <section>
      <!--for demo wrap-->
      <h1>Demande Gestion De Fichier</h1>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>
                Nom du dossier
              </th>
              <th>
                Lecture
              </th>
              <th>
                Ecriture
              </th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
         <select>
        <table cellpadding="0" cellspacing="0" border="0">
          <form  class="menu_form" action="requete.php" method='POST'>
            <?php while (NULL !== ($row = $exec_select_nom->
            fetch_array())) {?>
          

                <option value=<?php echo $row['Nom']; ?>> <?php echo $row['Nom']; ?>
                </option> 

            <?php
            }
          ?>
           <button>Validé</button>
            </select>
          </form>
        </div>
      </section>
    </body>
  </html>
