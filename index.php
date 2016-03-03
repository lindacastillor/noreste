<?php

	get_header(); ?>


	<section>
		<div class="filtro">
			<div class="titulo">
				<ul>
					<?php
					$cat_arguments = array(
						'orderby' => 'name',
						'parent' => 0,
						);
						$cats = get_categories($cat_arguments);
						$i = 0;
						foreach($cats as $category) {
							if($cat != $category->term_id) { echo '<li><a href="'.get_category_link( $category->term_id ).'" class="' . $category->slug .'">'.$category->name.'</a> '; }
							else { echo '<li class="active"><a href="'.get_category_link( $category->term_id ).'" class="' . $category->slug .'">'.$category->name.'</a></li>'; }
						}
					?>
				</ul>
			</div>
			<div class="categoria">
				<ul>
					<?php
					$tags = get_tags();
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id );

						$html .= "<li> <a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
						$html .= "{$tag->name}</a></li>";
					}
					echo $html;
					?>
				</ul>
			</div>
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
