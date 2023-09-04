// hamburger
document.getElementById('menu-toggle')
.addEventListener('click', function(){
  document.body.classList.toggle('nav-open');
  document.getElementById('mobMenu').classList.toggle('mob-menu-hide');
});

// dropdown menu on mob
document.addEventListener('DOMContentLoaded', function() {
    const dropdownBtnMob = document.getElementById('dropdown-btn-mob');
    const dropdownContentMob = document.querySelector('.dropdown-content-mob');

    dropdownBtnMob.addEventListener('click', function(event) {
        event.preventDefault();
        if (dropdownContentMob.style.display === 'block') {
            dropdownContentMob.style.display = 'none';
        } else {
            dropdownContentMob.style.display = 'block';
        }
    });
});

// get rid of background scroll when mob-menu is open
document.getElementById('menu-toggle').addEventListener('click', function () {
    document.body.classList.toggle('no-scroll'); // Add this line to toggle the class
});