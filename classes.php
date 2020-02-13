<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
</head>
</html>
<?php
class Adatbazis{
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "ajax";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;
	
	public function __construct() { self::kapcsolodas(); }
	public function __destruct() { self::kapcsolatbontas(); }
    
    public function kapcsolodas() {
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			die ("Connection failed: " . $this->conn->connect_error);
		}
		$this->conn->query("SET NAMES 'UTF8';");
	}

	public function insert() {
    if ($_GET["input_nev"] == "" || $_GET["input_ar"] == "") { ?>
      <p>Valami nincs kitöltve!</p>
      <?php
    }
    else {
      $this->sql = "INSERT INTO raktar (nev, ar, keszleten)
      VALUES ('".$_GET["input_nev"]."',
              ".$_GET["input_ar"].",
              '".$_GET["input_keszleten"]."')";
      $this->conn->query($this->sql);
    }
  }

  public function updateForm($id) {
    $this->sql = "SELECT * FROM raktar WHERE id = " . $id;
    $this->result = $this->conn->query($this->sql);
    while ($this->row = $this->result->fetch_assoc()) {
      ?>
      <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Módosítás</h5>
              <?php echo $this->row["id"]; ?>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div style="padding: 2%; margin:auto">
                <div class="form-group">
                  <input class="form-control" type="text" id="input_upd_nev" placeholder="Név" value="<?php echo $this->row["nev"]; ?>"><br /><br />
                </div>
                <div class="form-group">
                  <input class="form-control" type="number" id="input_upd_ar" placeholder="Ár" value="<?php echo $this->row["ar"]; ?>"><br /><br />
                </div>
                <div class="form-group">
                  <select class="form-control" id="input_upd_keszleten"> <?php
                    if ($this->row["keszleten"] == 1) { ?>
                      <option value="1" selected>Igen</option>
                      <option value="0">Nem</option> <?php
                    } else { ?>
                      <option value="1">Igen</option>
                      <option value="0" selected>Nem</option> <?php
                    } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="update(<?php echo $this->row['id']; ?>)" data-dismiss="modal">Mentés</button>
            </div>
          </div>
        </div>
      </div> <?php
    }
  }
	
	public function list() {
        $this->sql = "SELECT * FROM raktar";
		$this->result = $this->conn->query($this->sql); ?>

        <table class="table table-hover">
        <tr>
            <th>Név</th>
            <th>Ár</th>
            <th>Készleten</th>
            <th>Törlés</th>
            <th>Módosítás</th>
        </tr> <?php
		if ($this->result->num_rows > 0) {
			while($this->row = $this->result->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $this->row["nev"]; ?></td>
          <td><?php echo $this->row["ar"]; ?></td>
          <td><div class="form-group" onchange="updateKeszleten(<?php echo $this->row['id']; ?>)">
                  <select class="form-control" id="input_list_keszleten"> <?php
                    if ($this->row["keszleten"] == 1) { ?>
                      <option value="1" selected>Igen</option>
                      <option value="0">Nem</option> <?php
                    } else { ?>
                      <option value="1">Igen</option>
                      <option value="0" selected>Nem</option> <?php
                    } ?>
                  </select>
          </div>
          </td>
					<td>
            <button class="btn btn-danger" onclick="torles(<?php echo $this->row['id']; ?>)">Törlés</button>
          </td>
          <td>
            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal">Módosítás</button>-->
            <!--<button class="btn btn-primary" onclick=updateForm(<?php /*echo $this->row["id"];*/ ?>) data-toggle="modal" data-target="#updateModal">Módosítás</button>-->
          </td> <?php
			}
        }
        else { ?>
            <tr><td colspan="5">Nincs még rögzített adat</td></tr> <?php
        } ?>
        </table> <?php
    }
    
    public function delete($id) {
        $this->sql = "DELETE FROM raktar WHERE id=" . $id;
        $this->conn->query($this->sql);
    }

    /*public function adatok($id) {
        $this->sql = "SELECT * FROM raktar WHERE id=".$id;
        $this->conn->query($this->sql);
    }*/

    public function update() {
        if ($_GET["input_nev"] == "" || $_GET["input_ar"] == "") { ?>
          <p>Valami nincs kitöltve!</p>
          <?php
        }
        else {
          $this->sql = "UPDATE raktar SET nev='".$_GET["input_nev"]."', ar=".$_GET["input_ar"].", keszleten=".$_GET["input_keszleten"]." WHERE id = ".$_GET["input_id"];
          $this->conn->query($this->sql);
        }
    }
    
    public function updateKeszleten() {
      $this->sql = "UPDATE raktar SET keszleten = ".$_GET["input_keszleten"]." WHERE id = ".$_GET["input_id"];
      $this->conn->query($this->sql);
    }
    
	public function kapcsolatbontas() {
		$this->conn->close();	
	}
} ?>	