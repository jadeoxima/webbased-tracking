document.getElementById('addDetailsDirectOp').onclick=getFormValue;

function getFormValue(){
    var truckType = document.getElementById('truckType').value;
    var vanType = document.getElementById('vanType').value;
    var plateNo = document.getElementById('plateNo').value;
    var model = document.getElementById('model').value;
    var drivername = document.getElementById('drivername').value;

    if(truckType == '' && truckType == '' && plateNo == '' && model == '' && drivername == '') {
      alert("empty");
    }

    else { 
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET","truckDetailsDirectOpOut.php?truckType=" + truckType + "&vanType=" + vanType + 
                   "&plateNo=" + plateNo + "&model="+ model + "&drivername=" + drivername, true);
    
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        //where your code is
          document.getElementById("output").innerHTML = this.responseText; 
        }
      };
      xmlhttp.send()
  
      truckType = document.getElementById('truckType').value = '';
      vanType = document.getElementById('vanType').value  = '';
      plateNo = document.getElementById('plateNo').value  = '';
      model = document.getElementById('model').value  = '';
      drivername = document.getElementById('drivername').value  = '';
    }
}