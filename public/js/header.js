let display = false;
const navButton = document.getElementById('mobile_nav_button');
navButton.onclick = function() {
    const listMenu = document.getElementById('mobile_navigation_list');
    if(!display) {
        listMenu.style.display = 'block';
        display = true;
    }
    else {
        listMenu.style.display = 'none';
        display = false;
    }
};
