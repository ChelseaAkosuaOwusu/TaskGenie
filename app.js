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
    

// Profile Form
const hownerProfileDiv = document.getElementById('main__content_on_howner_profile_settings');
const handymanProfileDiv = document.getElementById('main__content_on_handyman_profile_settings');

// Form Switch
const OpenhownerProfileSettings = document.getElementById('handyman_profile__link');
const OpenhandymanProfileSettings = document.getElementById('howner_profile__link');


// Show handymanprofile Form
OpenhandymanProfileSettings.addEventListener('click', () => {
  hownerProfileDiv.style.display = 'none';
  handymanProfileDiv.style.display = 'flex';
});

// Show hownerProfile Form
OpenhownerProfile.addEventListener('click', () => {
 hownerProfileDiv.style.display = 'flex';
 handymanProfileDiv.style.display = 'none';
});
