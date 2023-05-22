const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.navbar__menu');

menu.addEventListener('click', function() {
  menu.classList.toggle('is-active');
  menuLinks.classList.toggle('active');
});


   // Form Container 
   const formArea = document.getElementById('main');

   // Form
   const loginDiv = document.getElementById('main__content_on_login');
   const signupDiv = document.getElementById('main__content_on_signup');
   
   // Form Switch
   const OpenLogin = document.getElementById('login__link');
   const OpenSignup = document.getElementById('signup__link');

   
   // Show Sign Up Form
   OpenSignup.addEventListener('click', () => {
     loginDiv.style.display = 'none';
     signupDiv.style.display = 'flex';
   });
   
   // Show Login Form
   OpenLogin.addEventListener('click', () => {
    loginDiv.style.display = 'flex';
    signupDiv.style.display = 'none';
   });
   