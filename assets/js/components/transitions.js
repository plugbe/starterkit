export const fadeOut= (element) => {
    return gsap.to('#content', {
        opacity: 0,
        duration: 0.4,
        ease: "exo",
    });
}

export const fadeIn = (element) => {
    gsap.from('#content', {
        opacity: 0,
        duration: 1,
        delay: 0.2,
        ease: "exo",
    })
}