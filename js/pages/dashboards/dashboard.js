
        var date= new Date;
        var year = date.getFullYear();
        console.log(year);
        document.getElementById('c_year').innerHTML = year;



// // for transfer
//         var part_1= document.getElementById("part_1");
//         var part_2= document.getElementById("part_2");
//         part_2.style.display ='NONE';

//         function confirmpin(){
//         part_1.style.display ='none';
//         part_2.style.display ='block';

//         }




  
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
  const folderNameInput = document.getElementById("acno");

folderNameInput.addEventListener('focus', setFolderNameValidityMessage);
folderNameInput.addEventListener('input', setFolderNameValidityMessage);

  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false || (folderNameInput.validity.patternMismatch || folderNameInput.validity.valueMissing)) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();



 function confirmpin(){
//   // var amount = document.getElementById("amount");
//   // var receipient_name = document.getElementById("receipient_name");
  // var acno1 = document.getElementById("acno");
//   // var routing_no = document.getElementById("routing_no");
//   // var bank_name = document.getElementById("bank_name");

// // document.getElementById("amount1").innerHTML = amount.value;
// // document.getElementById("receipient_name1").innerHTML = receipient_name.value;
// // document.getElementById("acno1").innerHTML = acno.value;
// // document.getElementById("routing_no1").innerHTML = routing_no.value;
// // document.getElementById("bank_name1").innerHTML = bank_name.value;

 var r = document.getElementById("bankname");
if (x.length < 10 )  {
 
  r.style.display = 'block';
  r.style.color = 'red';
  r.value = null;
 
}
else{
  r.style.display = 'none';
  
}
}

// function myFunction() {
//   const inpObj = document.forms["myForm"]["account_number"].value;
//   if (!inpObj.checkValidity()) {
//     document.getElementById("in-feed").innerHTML = inpObj.validationMessage;
//   } else {
//     document.getElementById("in-feed").innerHTML = "Input OK";
//   } 
// }

const folderNameInput = document.getElementById("acno");

folderNameInput.addEventListener('focus', setFolderNameValidityMessage);
folderNameInput.addEventListener('input', setFolderNameValidityMessage);

function setFolderNameValidityMessage() {
  if (folderNameInput.validity.patternMismatch || folderNameInput.validity.valueMissing) {
      folderNameInput.setCustomValidity('The folder name must contain between 3 and 50 chars');
  } else {
      folderNameInput.setCustomValidity('');
  }
}