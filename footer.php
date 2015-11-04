<?php

	$post_objects = get_field('menu', 'options'); ?>

<footer>
	<div class="sitemap">
		<div class="links">
			<div>
				<img src="<?php bloginfo('template_url'); ?>/img/logo_black.svg">
			</div><?php

			if($post_objects) : ?>
			<div>
				<ul>
					<li><a href="<?php echo esc_url(home_url('/')) ?>">Inicio</a></li><?php
				foreach ($post_objects as $post) :
					setup_postdata($post); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</li><?php

				endforeach; ?>
				</ul>
			</div><?php
			endif; ?>
		</div><?php


		if(get_field('redes', 'options')) : ?>
		<div class="social">
			<ul><?php
			while(have_rows('redes', 'options')) :
				the_row(); ?>
				<li>
					<a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('name'); ?></a>
				</li><?php
			endwhile; ?>
			</ul>
		</div><?php
		endif; ?>

	</div><?php


	if(get_field('footer', 'options')) : ?>
	<div class="info"><?php
		while(have_rows('footer', 'options')) :
			the_row();
			$quo = get_sub_field('quote', 'options');
			$aut = get_sub_field('author', 'options');
			$add = get_sub_field('address', 'options');

			if($quo) {
				echo '<div class="frase"><p>'. $quo .'</p>';
				if($aut) {
					echo '<span>'. $aut .'</span>';
				}
				echo '</div>';
			} ?>

			<div class="txt"><?php
				if($add) {
					echo '<div>'. $add .'</div>';
				} ?>

				<div><p>Nuño Arquitectos <?php echo current_time('Y'); ?>. <br>
					Derechos Reservados.<br>
					Sitio web: <a href="http://www.raidho.mx/"><b>Raidho</b></a></p>
				</div>
			</div><?php

		endwhile; ?>

	</div><?php
	endif; ?>


</footer>

<script type="text/javascript">
	jQuery(window).on('load', function() {
		$('.masonry').masonry({
			columnWidth: '.masonry_column',
	    	gutter: '.masonry_gutter',
			itemSelector: '.masonry_item',
			percentPosition: true
		});
	});

	$( "a.burger" ).click(function() {
		$( "header" ).toggleClass( "show" );
	});
</script>

<?php wp_footer(); ?>

</body>
</html>
