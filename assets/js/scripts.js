import { fadeOut, fadeIn } from './components/transitions';
import { contactForm } from './components/forms';
import { popup } from './components/popup';


const init = () => {
	const popupWindow = document.querySelector('#hiddenmodal');

	if(popupWindow) {
		if(Cookies.get('hideModal') === undefined) {
			popup();
		}
	}
}

init();

