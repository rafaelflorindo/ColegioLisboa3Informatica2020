 function validaForm(frm){
    var nome = document.getElementById("nome");
    var email = document.getElementById("email");
    alert("Campo nome não preenchido");
    if(nome.value == ""){
        alert("Campo nome não preenchido");
        nome.focus();
    }   
    if(email.value == ""){
        alert("Campo email não preenchido");
        email.focus();
    }    
 }
