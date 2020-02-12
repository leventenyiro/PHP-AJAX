function insert() {
	felvetel_url = "";
	felvetel_url += "?input_nev=" + document.getElementById("input_nev").value;
	felvetel_url += "&input_ar=" + document.getElementById("input_ar").value;
	felvetel_url += "&input_keszleten=" + document.getElementById("input_keszleten").value;
	/*document.getElementById("input_nev").value = "";
	document.getElementById("input_ar").value = "";
	document.getElementById("input_keszleten").value = "Igen";*/
	console.log(felvetel_url);
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("muvelet").innerHTML =
      		this.responseText;
	  		list();
    	}
  	};
  	xhttp.open("GET", "insert.php" + felvetel_url, true);
  	xhttp.send();
}

function list() {
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("tartalom").innerHTML =
      		this.responseText;
    	}
  	};
  	xhttp.open("GET", "select.php", true);
  	xhttp.send();
}

function torles(id) {
	torol_url = "";
	torol_url += "?input_id=" + id;

	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("tartalom").innerHTML =
			  this.responseText;
			  list();
    	}
  	};
  	xhttp.open("GET", "delete.php" + torol_url, true);
  	xhttp.send();
}

function adatok(id) {
	adatok_url = ""
	adatok_url += "?input_id=" + id;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
			document.getElementById("tartalom").innerHTML =
			this.responseText;
	  }
	};
	xhttp.open("GET", "adatok.php" + upd_url, true);
	xhttp.send();
}

function updateForm(id) {
	updateForm_url = "";
	updateForm_url += "?input_id=" + id;

	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
			/*$(document).ready(function(){
				$('#updateModal').modal('show');
			});*/
      		document.getElementById("tartalom").innerHTML =
			  this.responseText;
			  list();
    	}
  	};
  	xhttp.open("GET", "updateform.php" + updateForm_url, true);
  	xhttp.send();
}

function update(id) {
	upd_url = ""
	upd_url += "?input_id=" + id;
	upd_url += "&input_nev=" + document.getElementById("input_upd_nev").value;
	upd_url += "&input_ar=" + document.getElementById("input_upd_ar").value;
	upd_url += "&input_keszleten=" + document.getElementById("input_upd_keszleten").value;

	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("tartalom").innerHTML =
			  this.responseText;
			  list();
    	}
  	};
  	xhttp.open("GET", "update.php" + upd_url, true);
  	xhttp.send();
}

function updateKeszleten(id) {
	updkesz_url = "";
	updkesz_url += "?input_id=" + id;
	updkesz_url += "&input_keszleten=" + document.getElementById("input_list_keszleten").value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
			document.getElementById("tartalom").innerHTML =
			this.responseText;
			list();
	  }
	};
	xhttp.open("GET", "updateKeszleten.php" + updkesz_url, true);
	xhttp.send();
}

// REGIST MODAL
/*$(document).ready(function(){
	$('#errorModal').modal('show');
  });
  $(document).ready(function(){
	$('#successModal').modal('show');
  });
  
  $(document).ready(function(){
	$('#modal').modal('hide');
  });*/