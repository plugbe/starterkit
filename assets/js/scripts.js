import { fadeOut, fadeIn } from './components/transitions';
import { contactForm } from './components/forms';
import { popup } from './components/popup';


const init = () => {
	const popupWindow = document.querySelector('#hiddenmodal');

	if(popupWindow) {
		const version = popupWindow.dataset.popupVersion;
		const cookieKey = `hideModal-v${version}`;

		if(Cookies.get(cookieKey) === undefined) {
			popup(cookieKey);
		}
	}
}

init();

