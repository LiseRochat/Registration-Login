let btnModificationMail = document.querySelector("#btnModificationMail");
let btnValidationModificationMail = document.querySelector("#btnValidationModificationMail");
let divMail = document.querySelector("#mail");
let divModificationMail = document.querySelector("#modificationMail");

btnModificationMail.addEventListener("click", function(){
    divMail.classList.add("d-none");
    divModificationMail.classList.remove("d-none");
})

document.querySelector("#btnDeleteAccount").addEventListener("click", function(){
    document.querySelector("#deleteAccount").classList.remove("d-none");
})