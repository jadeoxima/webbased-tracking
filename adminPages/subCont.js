document.getElementById('submitSubCont').onclick=subContractors;

function subContractors(){
    var id = document.getElementById('id').value;
    var plateNo = document.getElementById('plateNo').value;
    var fromDest = document.getElementById('fromDest').value;
    var toDest = document.getElementById('toDest').value;
    var beginning = document.getElementById('beginning').value;
    var ending = document.getElementById('ending').value;
    var rates = document.getElementById('rates').value;
    var gas = parseFloat(document.getElementById('gas').value);
    var tollFee = parseFloat(document.getElementById('tollFee').value);
    var meals = parseFloat(document.getElementById('meals').value);
    var accomodation = parseFloat(document.getElementById('accomodation').value);
    var repairs = parseFloat(document.getElementById('repairs').value);
    var photocopy = parseFloat(document.getElementById('photocopy').value);
    var telephone = parseFloat(document.getElementById('telephone').value);
    var others = parseFloat(document.getElementById('others').value);
    var remarks = document.getElementById('remarks').value;

    var totalExpenses = gas + tollFee + meals + accomodation + repairs + photocopy + telephone + others;
    document.getElementById('totalExpenses').value = totalExpenses;

    var grossProfits = rates - totalExpenses;
    document.getElementById('grossProfits').value = grossProfits;
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","outSubCont.php?id=" + id + "&plateNo=" + plateNo + 
                                                   "&fromDest=" + fromDest  + 
                                                   "&toDest=" + toDest +
                                                   "&beginning=" + beginning + 
                                                   "&ending=" + ending + 
                                                   "&rates=" + rates + 
                                                   "&gas=" + gas +
                                                   "&tollFee=" + tollFee + 
                                                   "&meals=" + meals + 
                                                   "&accomodation=" + accomodation +
                                                   "&repairs=" + repairs + 
                                                   "&photocopy=" + photocopy + 
                                                   "&telephone=" + telephone +
                                                   "&others=" + others + 
                                                   "&remarks=" + remarks + 
                                                   "&totalExpenses=" + totalExpenses + 
                                                   "&grossProfits=" + grossProfits, true);

    
    
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        //where your code is
          document.getElementById("output").innerHTML = this.responseText; 
        }
      };
    xmlhttp.send()
  
    //   truckType = document.getElementById('truckType').value = '';
    //   vanType = document.getElementById('vanType').value  = '';
    //   plateNo = document.getElementById('plateNo').value  = '';
    //   model = document.getElementById('model').value  = '';
    //   drivername = document.getElementById('drivername').value  = '';
    
}