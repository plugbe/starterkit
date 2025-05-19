import { fadeOut, fadeIn } from './components/transitions';
import { contactForm } from './components/forms';

$(() => {
	init();

	barba.init({
        cacheIgnore: true,
        transitions: [
			{
				leave: ({ current }) => fadeOut(current.container),
				enter: ({ next }) => fadeIn(next.container),
				// once: ({ next }) => quote(next.container)
			},
			// {
			// 	to: { namespace: 'home' },
			// 	once: ({ next }) => quote(next.container),
			// }
		]
    });

	barba.hooks.after((data) => {
		const body = document.querySelector('body');

		body.classList.remove(...body.classList);
		body.classList.add(data.next.namespace);

        init();

		gsap.to(window, {duration: 0.3, scrollTo: 0});

		ga('set', 'page', window.location.pathname);
  		ga('send', 'pageview');
	});

    barba.hooks.before((data) => {
		gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
	});
})

const init = () => {
	if($('form').length){
		contactForm();
	}

	if($('.home').length) {
		const swiperHome = new Swiper('#home-swiper', {
			direction: 'horizontal',
			autoplay: {
				delay: 5000,
			}
		})
	}

	if($('#swiper-realisatie').length) {
		const swiperRealisatieThumbnails = new Swiper('#swiper-realisatie-thumbnails', {
			direction: 'horizontal',
			spaceBetween: 30,
			slidesPerView: 3,
			freeMode: true,
			watchSlidesProgress: true,
		})

		const swiperRealisatie = new Swiper('#swiper-realisatie', {
			direction: 'horizontal',
			thumbs: {
				swiper: swiperRealisatieThumbnails
			}
		})
	}
}

