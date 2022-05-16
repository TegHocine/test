
<?php 
require 'admin_navbar.php';
if(! isset($_SESSION['login']))
{
  header("Location:../index.php"); 
}else{
?>

         <section class="section_two">
             <div class="user_button">
                 <a href="./admin_creation.php">ajouter un admin</a>
                
             </div>
             <div class="table_container">
             <h1>Table client</h1>
             <table id="customers">
             
                 <tr>
                 <th>id</th>
                 <th>nom</th>
                 <th>prenom</th>
                 <th>email</th>
                 <th>Action</th>
                 </tr>
                  <?php 
                  require '../php/dbh.php';        
                    $sql = "SELECT * FROM users";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['idUsers'] . "</td>";
                                        echo "<td>" . $row['nomUsers'] . "</td>";
                                        echo "<td>" . $row['prenomUsers'] . "</td>";
                                        echo "<td>" . $row['emailUsers'] . "</td>";
                                        echo "<td class='action_but'>";
                                        echo '<a href="../php/php_delete_doc/delete_users_php.php?id='. $row['idUsers'] .'" class="button_delete"><img src="../img/img_cat/trash.svg" ></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<tr>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL </td>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL </td>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                    ?>
                        
             </table>
             </div>
         </section>
         <script type="text/javascript" src="../js/menu-js.js"></script>
     </main>
</body>
</html>
                <?php } ?>