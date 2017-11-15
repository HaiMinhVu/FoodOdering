<form name="placeorder" action="" method="POST">
        <table>
          <tr>
            <td>Select Product</td>
            <td><select name="protype" onchange="product_selection()">
              <option>Select ...</option>
              <?php
                $respro = $dbconnect->query("SELECT DISTINCT Pro_Type FROM product");
                while ($row = mysqli_fetch_array($respro)) {
              ?>
                  <option value="<?php echo $row['Pro_Type']?>"><?php echo $row['Pro_Type'];?></option>
              <?php
                }
              ?>
            </select>
          </td>
          </tr>

          <tr>
            <td>Select Type</td>
            <td>
              <div id="type">
                <select>
                <option>Select ...</option>
                <?php
                if (isset($_POST['protype'])) {
                  $selectedproduct = $_POST['protype'];
                  echo $selectedproduct;
                }
                  
                  $restype = $dbconnect->query("SELECT App_Type FROM $selectedproduct");
                  while ($row = mysqli_fetch_array($restype)) {
                ?>
                  <option><?php echo $row['App_Type']?></option>
                <?php  # code...
                  }
                ?>


                </select>

              </div>
            </td>
          </tr>
        </table>
      </form>