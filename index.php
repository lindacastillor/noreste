<?php

	get_header(); ?>


	<section>
		<div class="filtro">
			<form method="get" action="<?php echo esc_url( home_url('proyectos')); ?>">
				<div class="titulo">
					<ul>
						<li>
							<input type="radio" name="type" value="exterior" id="exterior" <?php if($_GET['type'] == 'exterior') { echo 'checked'; } ?>>
							<label for="exterior">Proyectos Arquitectónicos</label>
						</li>
						/<li>
							<input type="radio" name="type" value="interior" id="interior" <?php if($_GET['type'] == 'interior') { echo 'checked'; } ?>>
							<label for="interior">Diseño de Interiores</label>
						</li>
					</ul>
				</div>
				<div class="categoria">
					<ul><?php

						$categories = get_categories();

						foreach ($categories as $cat) {
							if($cat->category_parent == 0) {
								if($_GET['category'] == $cat->slug) {
									$active = 'checked';
								}
								echo '<li><input type="radio" name="category" value="' . $cat->slug . '" id="' . $cat->slug . '" ' . $active . '><label for="' . $cat->slug . '">' . $cat->cat_name . '</label></li>';
								$active = '';
							}
						} ?>
					</ul>
				</div>
				<input type="submit" value="Go" style="display:none">
			</form>
		</div>
	</section>





<?php /*

	// First(Empty) Query ( .../eventos )
	if(htmlentities($_GET['date']) == "") {
		$_GET['evType'] = '';
		$_GET['museum'] = '1';
		$_GET['date'] = date('d M Y');
		$_GET['dateFormat'] = date('Ymd');
	}


	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'eventos',
		'meta_query'	=> array(
			'relation'		=> 'AND',
			array(
				'key'		=> 'days_%_date',
				'compare'	=> '=',
				'value'		=> $_GET['dateFormat']
			)
		)
	);
	$the_query = new WP_Query( $args );
	$posts = $the_query->get_posts();

	echo '<ul class="masonry cards">';

		foreach($posts as $post) {
			if($_GET['museum'] == 1){
				echo get_template_part('inc/cards');
			} elseif($post->museum == $_GET['museum']){
				echo get_template_part('inc/cards');
			}
		}

		if($posts){} else {
			global $niceDay;
				echo 'No hay eventos programados';
			if($_GET['museum'] == 1) {} else {
				echo ' en el '.$_GET['museum'];
			}
			echo ' el '.$niceDay;
		}

	echo '</ul>';


	wp_reset_query(); */ ?>







	<section>
		<div class="half_fourth">
			<ul class="masonry js-masonry masonry_item">
				<div class="masonry_gutter"></div>
				<div class="masonry_column"></div><?php

				$archive_args = array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'category_name' => $_GET['category'],
					'post_meta_value' => $_GET['type']
				);

				$archive_query = new WP_Query( $archive_args );
				while ( $archive_query->have_posts() ) : $archive_query->the_post(); ?>
				<li>
					<div>
						<div class="img"><?php
							$imgID = get_post_thumbnail_id( $post->ID );
							echo wp_get_attachment_image( $imgID, 'large' ); ?>
						</div>
						<a href="<?php the_permalink(); ?>">
							<div class="txt">
								<div>
									<h1>
										<?php the_title(); ?>
										<span><?php inOut(get_field('opts_inout')); ?></span>
									</h1>
								</div>
							</div>
						</a>
					</div>
				</li><?php
				endwhile;
				wp_reset_postdata(); ?>
			</ul>
		</div>
	</section>

	<script>
		$('input[type=radio]').on('change', function() {
			$(this).closest("form").submit();
		});
	</script><?php
get_footer(); ?>
