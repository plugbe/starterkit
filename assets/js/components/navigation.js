export const menuToggle = () => {
    const container = document.querySelector('.header');
    const toggle = container.querySelector('.toggle__wrapper');
    const menu = document.querySelector('.mobile-navigation');
    const menuLinks = menu.querySelectorAll('li a');
    let menuVisible = false;

    toggle.addEventListener('click', () => {
        if(menuVisible == false) {
            menu.classList.add('visible');
            menuVisible = true;
        } else {
            menu.classList.remove('visible');
            menuVisible = false;
        }
    });

    menuLinks.forEach((links) => {
        links.addEventListener('click', (e) => {
            e.preventDefault();
            menu.classList.remove('visible');
            menuVisible = false;
        })
    })
}