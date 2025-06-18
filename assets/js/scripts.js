import { fadeOut, fadeIn } from './components/transitions';
import { contactForm } from './components/forms';
import { popup } from './components/popup';

$(() => {
	init();
})

const init = () => {
	const popupWindow = document.querySelector('#hiddenmodal');
	if(popupWindow) {
		if(Cookies.get('hideModal')) {
			popup();
		}
	}

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

