export const menuToggle = () => {
    const container = document.querySelector('.header');
    const toggle = container.querySelector('.hamburger');
    const menu = document.querySelector('.fullmenu');
    const closeToggle = menu.querySelector('.hamburger');
    const menuLinks = menu.querySelectorAll('li a');
    let menuVisible = false;

    toggle.addEventListener('click', () => {
        if(menuVisible == false) {
            menu.classList.add('open');
            menuVisible = true;
        }
    });

    closeToggle.addEventListener('click', () => {
        if(menuVisible == true) {
            menu.classList.remove('open');
            menuVisible = false;
        }
    });

    // menuLinks.forEach((links) => {
    //     links.addEventListener('click', (e) => {
    //         e.preventDefault();
    //         menu.classList.remove('visible');
    //         menuVisible = false;
    //     })
    // })
}

export const scrollCheck = () => {
    const nav = document.querySelector('.header');
    const secondaryNav = document.querySelector('.header-secondary');
    const secondaryNavContent = document.querySelector('.header-secondary-content');
    const scrollThreshold = 10; // Adjust this threshold as needed

    let previousScrollPosition = window.scrollY;

	window.addEventListener('scroll', () => {
        let currentScroll = window.scrollY || document.documentElement.scrollTop;

        // Detect when the user scrolls upwards
        if (currentScroll > previousScrollPosition && currentScroll > 60) {
            // nav.classList.add('scrolling');
            // nav.classList.remove('visible');

            // gsap.to(nav, {
            //     y: 0,
            //     autoAlpha: 1,
            //     position: 'fixed',
            //     // ease: "expo.inOut",
            //     duration: 0.4,
            //     paddingTop: "1.375rem",
            //     paddingBottom: "1.000rem",
            //     backgroundColor: "#EEEFED",
            // })

            nav.classList.add('minimize');
            secondaryNav.classList.add('minimize');
            secondaryNavContent.classList.add('minimize');
        } else if (currentScroll < previousScrollPosition && previousScrollPosition - currentScroll > scrollThreshold) {
            // gsap.to(nav, {
            //     y: 0,
            //     autoAlpha: 1,
            //     position: 'fixed',
            //     // ease: "expo.inOut",
            //     duration: 0.4,
            //     paddingTop: "1.375rem",
            //     paddingBottom: "1.000rem",
            //     backgroundColor: "#EEEFED",
            // })
        }

        if (currentScroll < 80) {
            nav.classList.remove('minimize');
            secondaryNav.classList.remove('minimize');
            secondaryNavContent.classList.remove('minimize');

            if(window.innerWidth < 650) {
                // gsap.to(nav, {
                //     y: 0,
                //     position: 'fixed',
                //     autoAlpha: 1,
                //     paddingTop: "1.5625rem",
                //     paddingBottom: "1.5625rem",
                //     backgroundColor: "#EEEFED",
                //     // ease: "expo.inOut",
                //     duration: 0.4,
                // })
            } else {
                // gsap.to(nav, {
                //     y: 0,
                //     position: 'fixed',
                //     autoAlpha: 1,
                //     paddingTop: "4.375rem",
                //     paddingBottom: "4.375rem",
                //     backgroundColor: "transparent",
                //     // ease: "expo.inOut",
                //     duration: 0.4,
                // })
            }
        }

        previousScrollPosition = currentScroll <= 0 ? 0 : currentScroll;
    })
}