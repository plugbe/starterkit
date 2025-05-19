import { addParam } from './parameters';

//CONTACTFORM
export const contactForm = () => {
	let form = document.querySelector('#contact-form');
	let message = form.querySelector('feedback');
	let fields = {};
	form.querySelectorAll('[name]').forEach((field) => {
		fields[field.name] = field;
	});


	// Displays all error messages and adds 'error' classes to the form fields with
	// failed validation.
	const handleError = (response) => {
		let errors = [];
		for (let key in response) {
			if (!response.hasOwnProperty(key)) continue;
			if(fields.hasOwnProperty(key)) {
				fields[key].classList.add('error');
				// fields[key].placeholder = response[key];
				// console.log(key)

				form.querySelector(`.error-${key}`).innerHTML = response[key];
				form.querySelector(`.group-${key}`).classList.add('error');
			}

			// if(document.querySelector('#policy').checked == false) {
			// 	document.querySelector('#group-policy').classList.add('error');
			// 	document.querySelector('#error-policy').innerHTML = 'Gelieve de algemene voorwaarden te accepteren om verder te gaan.';
			// } else {
			// 	document.querySelector('#group-policy').classList.remove('error');
			// 	document.querySelector('#error-policy').innerHTML = '';
			// }
			Array.prototype.push.apply(errors, response[key]);
		}
	}

	const onload = (e) => {
		if (e.target.status === 200) {
			form.style.display = "none";
		} else {
			handleError(JSON.parse(e.target.response));
		}
	};

	const submit = (e) => {
		e.preventDefault();
		let request = new XMLHttpRequest();
		request.open('POST', e.target.action);
		request.onload = onload;
		request.send(new FormData(e.target));
		// Remove all 'error' classes of a possible previously failed validation.
		for (let key in fields) {
			if (!fields.hasOwnProperty(key)) {
				continue;
			}
			fields[key].classList.remove('error');
			form.querySelector(`.group-${key}`).classList.remove('error');
			form.querySelectorAll('.error-text').forEach((errorfield) => {
				errorfield.innerHTML = '';
			});
		}
	};
	form.addEventListener('submit', submit);
}

//FILTER FORM IF EXISTS
// export const filterForm = () => {
// 	let container = document.querySelector('.portefeuilles');
// 	let filterBlock = container.querySelector('.block-filter');

// 	let branche = filterBlock.querySelector('#branche');
// 	let company = filterBlock.querySelector('#company');
// 	let region = filterBlock.querySelector('#region');
// 	let type = filterBlock.querySelector('#type');

// 	branche.addEventListener('change', () => {
// 		location.href = addParam(location.href, 'branche', branche.value);
// 	});

// 	company.addEventListener('change', () => {
// 		location.href = addParam(location.href, 'company', company.value);
// 	});

// 	region.addEventListener('change', () => {
// 		location.href = addParam(location.href, 'region', region.value);
// 	});

// 	type.addEventListener('change', () => {
// 		location.href = addParam(location.href, 'type', type.value);
// 	})
// }