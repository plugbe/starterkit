export const popup = (cookieKey) => {
	const popup1 = Fancybox.show([{
		src: "#hiddenmodal",
		type: "inline",
		touch: false,
	}], {
		on: {
			"close": (fancyboxRef, eventName) => {
				Cookies.set(cookieKey, true, { expires: 1 })
			},
		}
	});
}