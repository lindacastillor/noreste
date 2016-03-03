<?php

if(get_field('contacto')):
	while (have_rows('contacto')) :
		the_row();

		if(get_sub_field('on_off') == 'on') : ?>

		<section>
			<div class="contact bg_grayL y_mtop">
				<div class="img" style=" background-image: url('<?php the_sub_field('img') ?>');">
				</div>
				<div class="form">
					<h2><?php the_sub_field('title') ;?></h2>
					<p>Escríbenos y nos pondremos en contacto</p>
					<?php the_sub_field('forms'); ?>
				</div>
			</div>
		</section><?php

		endif;
	endwhile;

endif; ?>
