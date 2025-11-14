import { fadeOut, fadeIn } from './components/transitions';
import { form } from './components/forms';
import { popup } from './components/popup';
import { menuToggle, scrollCheck } from './components/navigation';


const init = () => {
	//Indien je popups gebruikt met fancybox hier fancybox init
	//En data-fancybox gebruiken in template
	// Fancybox.bind("[data-fancybox]", {
	// 	zoomEffect: false,
	// 	Carousel: {
	// 		gestures: false,
	// 		Zoomable: {
	// 			Panzoom: {
	// 				startPos: {
	// 					scale: "full",
	// 				},
	// 			},
	// 		},
	// 	},
	// });

	const popupWindow = document.querySelector('#hiddenmodal');

	if(popupWindow) {
		const version = popupWindow.dataset.popupVersion;
		const cookieKey = `hideModal-v${version}`;

		if(Cookies.get(cookieKey) === undefined) {
			popup(cookieKey);
		}
	}


	//Een formulier koppelen met de ID
	//form("#contact");
	//form("#newsletter");

	//Animaties hier init en className gebruiken in templates
	//fadeOut(".fadeout");
	//fadeIn(".fadein");


	//Carousel met swiper kan als volgt:
	// const sliderNaam = document.querySelector('#element');
	// if(sliderNaam) {
	// 	const swiper = new Swiper('#element', {
	// 		direction: 'horizontal',
	// 		loop: true,
	// 		speed: 800,
	// 		autoplay: {
	// 			delay: 3000,
	// 		}
	// 	});
	// }

	//Indien een blok is dat meermaals op pagina voorkomt
	// const imageBlock = document.querySelectorAll('.b-image');
	// if(imageBlock.length > 0) {
	// 	imageBlock.forEach((block) => {
	// 		const imageSlider = block.querySelector('.imageswiper-js');

	// 		const swiper = new Swiper(imageSlider, {
	// 			direction: 'horizontal',
	// 			slidesPerView: 1,
	// 			spaceBetween: 20,
	// 			navigation: {
	// 				nextEl: imageSlider.querySelector('.swiper-buttons-next'),
	// 				prevEl: imageSlider.querySelector('.swiper-buttons-prev'),
	// 			}
	// 		})
	// 	})
	// }
}

init();

