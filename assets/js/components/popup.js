export const popup = () => {
	const popup = Fancybox.show([{
		src: "#hiddenmodal",
		type: "inline",
		touch: false,
	}]);


	popup.on('shouldClose', () => {
		Cookies.set('hideModal', true, { expires: 1 })
	})
}