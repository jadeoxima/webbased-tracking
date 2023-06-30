document.getElementById('addPayroll').onclick=addPayroll;

function addPayroll(){
    var employee_name = document.getElementById('employee_name').value;
    var monthly_rate = parseFloat(document.getElementById('monthly_rate').value);
    var total_hrs = parseFloat(document.getElementById('total_hrs').value);
    var dateFrom = document.getElementById('dateFrom').value;
    var dateTo = document.getElementById('dateTo').value;

    var semi_monthly_rate = monthly_rate / 2;
    document.getElementById('semi_monthly_rate').value = semi_monthly_rate;

    var hourly_rate = ((monthly_rate * 12) / 365) / 8;
    document.getElementById('hourly_rate').value = hourly_rate;

    var total_deduct = (208 - total_hrs) * hourly_rate;
    document.getElementById('total_deduct').value = total_deduct;

    var payroll = monthly_rate - total_deduct;
    document.getElementById('payroll').value = payroll;
        
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","outPayroll.php?id=" + id + "&employee_name=" + employee_name + 
                                               "&monthly_rate=" + monthly_rate  + 
                                               "&semi_monthly_rate=" + semi_monthly_rate +
                                               "&hourly_rate=" + hourly_rate + 
                                               "&total_hrs=" + total_hrs + 
                                               "&total_deduct=" + total_deduct + 
                                               "&dateFrom=" + dateFrom +
                                               "&dateTo=" + dateTo +
                                               "&payroll=" + payroll, true);

    
    
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