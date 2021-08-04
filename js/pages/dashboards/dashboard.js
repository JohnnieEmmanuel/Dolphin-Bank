
        var date= new Date;
        var year = date.getFullYear();
        console.log(year);
        document.getElementById('c_year').innerHTML = year;

  function maketransfer(){
    var amount = document.getElementById("amount");
    var receipient_name = document.getElementById("receipient_name");
    var acno = document.getElementById("acno");
    var routing_no = document.getElementById("routing_no");
    var bank_name = document.getElementById("bank_name");



document.getElementById("amount1").innerHTML = amount.value;
document.getElementById("receipient_name1").innerHTML = receipient_name.value;
document.getElementById("acno1").innerHTML = acno.value;
document.getElementById("routing_no1").innerHTML = routing_no.value;
document.getElementById("bank_name1").innerHTML = bank_name.value;
  }


  var d= new Date();
var _date = d.toISOString().split('T')[0];
var _time = d.toTimeString().split(' ')[0];
var _curdate = `${_date} ${_time}`;
console.log(d);
console.log(_date);
console.log(_time);
console.log(_curdate);

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();