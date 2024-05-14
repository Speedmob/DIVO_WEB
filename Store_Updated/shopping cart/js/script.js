let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active'); // make the button of the menu active (visible)
};

// window can be scrolled dynamically 
window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
};

// after editing , hide the container of edit options and direct me again to the admin page.
document.querySelector('#close-edit').onclick = () =>{
   document.querySelector('.edit-form-container').style.display = 'none';
   window.location.href = 'admin.php'; 
};