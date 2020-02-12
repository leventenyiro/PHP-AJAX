<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="ajax.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
</head>
<html>
<body onload="list()">
	<h1 class="display-1 m-3">Raktár</h1>
	<button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#insertModal">Hozzáadás</button>
	<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Hozzáadás</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body">
	  				<div style="padding: 2%; margin:auto">
					  	<div class="form-group">
							<input class="form-control" type="text" id="input_nev" placeholder="Név">
						</div>
						<div class="form-group">
							<input class="form-control" type="number" id="input_ar" placeholder="Ár">
						</div>
						<div class="form-group">
							<p>Készleten</p>
							<select class="form-control" id="input_keszleten">
								<option value="1" selected>Igen</option>
								<option value="0">Nem</option>
							</select>
						</div>
					</div>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-primary" onclick="insert()" data-dismiss="modal">Küldés</button>
      			</div>
    		</div>
  		</div>
	</div>

	<div id="muvelet"></div>
	<button type="button" class="btn btn-secondary m-3" onclick="list()">Frissítés</button>
	<div id="tartalom"></div>
</body>
</html>