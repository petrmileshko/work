<footer class="page__footer">
	<div class="page-footer center-flexible">
	<?php
		if (has_custom_logo()) echo get_custom_logo();
		else echo "Логотип";
		?>
		<p class="page-footer__copyright">
			&copy;<?php bloginfo('blogname');
						$currentYear = date('Y');
						$foundedYear = '2023';
						if ($currentYear > $foundedYear) {
							echo " $foundedYear - $currentYear";
						} else {
							echo " $currentYear";
						}
						?>
		</p>
	</div>
</footer>