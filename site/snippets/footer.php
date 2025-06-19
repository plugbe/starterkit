				<footer class="footer">
				</footer>
  			</div>
		</div>
	</main>

	<!-- Cookie Consent by TermsFeed Privacy Policy and Consent Generator https://www.TermsFeed.com -->
	<script type="text/javascript" src="https://www.termsfeed.com/public/cookie-consent/4.0.0/cookie-consent.js" charset="UTF-8"></script>
	<script type="text/javascript" charset="UTF-8">
		document.addEventListener('DOMContentLoaded', function () {
			cookieconsent.run({
				"notice_banner_type": "simple",
				"consent_type": "express",
				"palette": "light",
				"language": "<?= $site->language(); ?>",
				"page_load_consent_levels": ["strictly-necessary"],
				"notice_banner_reject_button_hide": false,
				"preferences_center_close_button_hide": false,
				"page_refresh_confirmation_buttons": false,
				"website_privacy_policy_url": "<?= page('privacy-policy')->url(); ?>",
				"website_name": "Website Naam"
			});
		});
	</script>

	<!-- Google Analytics -->
	<!-- Global site tag (gtag.js) - Google Analytics PLUG-->
	<script type="text/plain" cookie-consent="tracking" async src="https://www.googletagmanager.com/gtag/js?id=IDHIER"></script>
	<script type="text/plain" cookie-consent="tracking">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'IDHIER');
	</script>
	<!-- end of Google Analytics-->
	<!-- End Cookie Consent by TermsFeed Privacy Policy and Consent Generator https://www.TermsFeed.com -->
  
  <!-- JS ==================================================================== -->
	<script src="<?= url('assets/js/plugins/fancybox.umd.js') ?>" type="text/javascript"></script>
	<script src="<?= url('assets/js/plugins/swiper-bundle.min.js') ?>" type="text/javascript"></script>
	<script src="<?= url('assets/js/plugins/gsap.min.js') ?>" type="text/javascript"></script>
	<script src="<?= url('assets/js/plugins/ScrollTrigger.min.js') ?>" type="text/javascript"></script>
	<script src="<?= url('assets/js/plugins/ScrollToPlugin.min.js') ?>" type="text/javascript"></script>

	<script src="<?php echo url('assets/js/min/scripts.min.js?v=' . $site->timestamp()->text()); ?>" type="text/javascript"></script>

	<?= snippet('seo/schemas'); ?>
</body>
</html>
