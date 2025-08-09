// cuando la pagina cargue por completo ejecuta el codigo que quita el loading
window.onload = function () {
    let cargando = document.querySelector(".centrado-cargando").classList.add("overflow");
    body = document.querySelector("body")
    body.classList.remove("overflow");

    html = document.querySelector("html").classList.remove("overflow")
    html = document.querySelector("html").classList.add("scrolNone");
};
// login y register
const btnSigIn = document.getElementById('sign-in');
const btnSigUp = document.getElementById('sign-up');
const signUp2 = document.getElementById('sign-up2');
const forRegister = document.querySelector('.form-register');
const forLogin = document.querySelector('.login');
const admin = document.querySelector(".admin");
const loginAdmin = document.querySelector("#login-admin");




btnSigIn.addEventListener('click', e => {
    forRegister.classList.add('hide');
    forLogin.classList.remove('hide');
    admin.classList.add('remove');
});

btnSigUp.addEventListener('click', e => {
    forLogin.classList.add('hide')
    forRegister.classList.remove('hide')
    admin.classList.add('remove');
});

loginAdmin.addEventListener('click', e => {
    forLogin.classList.add('hide');
    forRegister.classList.add('hide');
    admin.classList.remove('hide');
});

signUp2.addEventListener('click', e => {
    forLogin.classList.remove('hide');
    forRegister.classList.add('hide');
    admin.classList.add('hide');
});

