<?php require 'admin_navbar.php';
if(!isset($_SESSION['login']))
{
  header("Location:../index.php"); 
}else{
?>
         <section class="section_two">
             <div class="user_button">
             <a href="./product_creation.php">ajouter un produit &#11166;</a>
                
             </div>
             <div class="table_container">
             <h1>Table PC</h1>
             <?php
            if (isset($_GET['error'])) {
                      if ($_GET['error'] == "error") {
                        echo "<p class='errormsg2'>Le produit n'a pas été modifié</p>";
                      } 
                  }
             if (isset($_GET['succes'])) {
                    if ($_GET['succes'] == "succes") {
                      echo "<p class='succesmsg2'>Le produit a été modifié</p>";
                    } 
                }
                ?>  
             <table id="customers">
             
                 <tr>
                 <th>id</th>
                 <th>Categorie</th>
                 <th>Nom</th>
                 <th>Prix</th>
                 <th>Discription</th>
                 <th>Image</th>
                 <th>Actions</th>
                 </tr>
                  <?php 
                  require '../php/dbh.php';        
                    $sql = "SELECT * FROM product where catProd='PC';";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['idProd'] . "</td>";
                                        echo "<td>" . $row['catProd'] . "</td>";
                                        echo "<td class='nom_prod'>" . $row['nomProd'] . "</td>";
                                        echo "<td>" . number_format($row['prixProd'], 2, ',', ' ') . "&nbsp;DA</td>";
                                        echo '<td class="discrip">' . $row['discProd'] . "</td>";
                                        echo "<td ><img class='img_prod' src='../../database_image/".$row['imgProd'] ." ' ></td>";
                                        echo "<td class='action_but'>";
                                        echo '<a href="../php/php_delete_doc/delete_prodpc_php.php?id='. $row['idProd'] .'" class="button_delete"><img src="../img/img_cat/trash.svg" ></a>';
                                        echo '<a href="./edit_product.php?id='. $row['idProd'] .'" class="button_edit"><img src="../img/img_cat/edit.svg" ></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            echo "<tr>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL</td>";
                            echo "<td>NULL</td>";
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