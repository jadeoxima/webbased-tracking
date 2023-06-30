document.getElementById('addDetailsDel').onclick=getFormValue;

function getFormValue(){
    var whname = document.getElementById('whname').value;
    var city = document.getElementById('city').value;
   
    var barangay = document.getElementById('barangay').value;
    var drivername = document.getElementById('drivername').value;
    var vantype = document.getElementById('vantype').value;

    if(whname== '' && whname == '' && city == '' && barangay == '' && vantype == ''  && drivername == '') {
      alert("empty");
    }

    else { 
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET","whadd.php?whname=" + whname + "&city=" + city+ 
                   "&barangay=" + barangay + "&vantype="+ vantype + "&drivername=" + drivername, true);
    
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        //where your code is
          document.getElementById("output").innerHTML = this.responseText; 
        }
      };
      xmlhttp.send()
  
      var whname = document.getElementById('whname').value;
      var city = document.getElementById('city').value;
     
      var barangay = document.getElementById('barangay').value;
      var drivername = document.getElementById('drivername').value;
      var vantype = document.getElementById('vantype').value;
    }
}