export const popup = () => {
	const popup1 = Fancybox.show([{
		src: "#hiddenmodal",
		type: "inline",
		touch: false,
	}], {
		on: {
			"close": (fancyboxRef, eventName) => {
				Cookies.set('hideModal', true, { expires: 1 })
			},
		}
	});
}