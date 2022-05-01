const newPassword = document.querySelector("#newPassword");
const newPasswordConf =document.querySelector("#newPasswordConf");

newPassword.addEventListener("keyup", function(){
    verificationPassword();
})

newPasswordConf.addEventListener("keyup", function(){
    verificationPassword();
})

/******************** Function verification password are same ********************/
function verificationPassword() {
    if(newPassword.value == newPasswordConf.value ) {
        document.querySelector("#btnValidation").disabled = false;
        document.querySelector("#error").classList.add("d-none");
    } else {
        document.querySelector("#btnValidation").disabled = true;
        document.querySelector("#error").classList.remove("d-none");
    }
}