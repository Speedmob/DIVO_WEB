const logregBox = document.querySelector('.logreg-box');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

registerLink.addEventListener('click', () => {
    logregBox.classList.add('active');
});
loginLink.addEventListener('click', () => {
    logregBox.classList.remove('active');
});
function show() {
    document.getElementById('helpe').style.visibility = 'visible';
    document.getElementById('btn2').style.visibility = 'visible';
    document.getElementById('btn1').style.visibility = 'hidden';
}

function hide() {
    document.getElementById('helpe').style.visibility = 'hidden';
    document.getElementById('btn2').style.visibility = 'hidden';
    document.getElementById('btn1').style.visibility = 'visible';
}
