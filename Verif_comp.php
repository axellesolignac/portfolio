<?
$rech=$_POST['t_rechercher'];
$libelle=$_POST['t_libelle'];
$logo=$_POST['t_logo'];
$niveau=$_POST['t_niveau'];
    // connexion à la base de données
    $db_username = 'id10067108_axelle';
    $db_password = 'Noisette13';
    $db_name     = 'id10067108_portfolio';
    $db_host     = 'localhost';
    $cn = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
mysql_select_db("ma_base",$cn);
 if (isset($_POST['rechercher']))
{
$req="select * from  competence where libelle='$rech'";
 
mysql_query($req);
$res=mysql_query($req,$cn);
$enrg=mysql_fetch_row($res);
 
 if ($enrg[0] == $rech)
{
 
   echo "<form id='form1' name='form1' method='post' action='Verif_comp.php'>
    <table width='420' border='0'>
   <tr>
     <td width='169' bgcolor='#CCFF00'><label>
    <input name='rechercher' type='submit' id='rechercher' value='Rechercher' />
     </label></td>
     <td width='369' bgcolor='#CCFF00'><label>
    <input name='t_rechercher' type='text' id='t_rechercher' value='$enrg[0]' />
     </label>Recherche par nom</td>
   </tr>
   <tr>
     <td>Libelle</td>
     <td><label>
    <input name='t_libelle' type='text' id='t_libelle'  value='$enrg[0]'/>
     </label></td>
   </tr>
   <tr>
     <td>Logo</td>
     <td><label>
    <input name='t_logo' type='text' id='t_logo' value='$enrg[1]' />
     </label></td>
   </tr>
   <tr>
     <td>Niveau</td>
     <td><label>
    <input name='t_niveau' type='text' id='t_niveau' value='$enrg[2]' />
     </label></td>
   </tr>
   <tr>
     <td colspan='2'><label>
    <input name='nouveau' type='reset' id='nouveau' value='Nouveau' />
    <input name='ajouter' type='submit' id='ajouter' value='Ajouter' />
    <input name='modifier' type='submit' id='modifier' value='Modidier' />
    <input name='supprimer' type='submit' id='supprimer' value='Supprimer' />
     </label></td>
   </tr>
    </table>
    <p> </p>
  </form>";
}
  else
   {
  echo '<body onLoad="alert('Client introuvable...')">';
  echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
  }
} 
 
 else
  {
  
                 
      
         if (isset($_POST['ajouter']))
                              
           if($libelle=='')
          {
         echo '<body onLoad="alert('Le nom obligatoire')">';
                               echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
           
          }
          elseif ($logo=='')
          {
          echo '<body onLoad="alert('Prénom obligatoire...')">';
                               echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
          }
          elseif($niveau=='')
          {
          echo '<body onLoad="alert('Téléphone obligatoire...')">';
                                   echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
          }
         
         else
         {
          $rqt="insert competence values('$libelle','$logo','$niveau')";
           
          mysql_query($rqt);
           
            echo '<body onLoad="alert('Ajout effectuée...')">';
          echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
          mysql_close();
               }
       if (isset($_POST['modifier']))
        
                                    if($libelle=='' || $logo=='' ||$niveau==''   )
          {
          
          echo '<body onLoad="alert('fair une recherche avant la modification ou verifiez les champs obligatoire...')">';
                                   echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
          }
          else
          {
           $rqt="update competence set libelle='$libelle',logo='$logo',niveau='$niveau' where libelle ='$rech'";
        mysql_query($rqt);
          echo '<body onLoad="alert('Modification effectuée...')">';
          echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
        mysql_close();
         }
       elseif(isset($_POST['supprimer']))       
         {
         
         $rqt="delete  FROM competence where libelle ='$rech'";
         
        mysql_query($rqt);
         echo '<body onLoad="alert('Suppression effectuée...')">';
        echo '<meta http-equiv="refresh" content="0;URL=option_comp.php">';
        mysql_close();
         }
      
  
  }

?>
<?     // connexion à la base de données
    $db_username = 'id10067108_axelle';
    $db_password = 'Noisette13';
    $db_name     = 'id10067108_portfolio';
    $db_host     = 'localhost';
    $cn = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');

mysql_select_db("ma_base",$cn);  
$req="select * from  competence";
mysql_query($req);
$res=mysql_query($req,$cn);  
?>
<table width="630" align="left" bgcolor="#CCCCCC">
<tr >
 
<td width="152">Libelle</td>
<td width="66">Logo</td>
<td width="248">Niveau</td>
</tr>
<?
$var=0;
while($row=mysql_fetch_array($res))
{
 
if ($var==0)
{
?>
<tr bgcolor="#EEEEEE">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
<td><? echo $row[2]  ?></td>
</tr>
<?
$var=1; 
 }
else
{
?>
<tr bgcolor="#FFCCCC">
<td><? echo $row[0];  ?></td>
<td><? echo $row[1];  ?></td>
<td><? echo $row[2]  ?></td>
</tr>
<?
$var=0; 
 }
 }
?>
</table>
