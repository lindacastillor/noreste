<?php

	get_header(); ?>

	<section>
		<div class="filtro">
			<div class="recent_post pb100 twelve columns">
			<form method="get" action="<?php echo esc_url( home_url('proyectos')); ?>">
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
				<input type="submit" value="Go" style="display:none">
			</form>
		</div>
	</section>


	<section>
		<div class="half_fourth">
			<ul class="masonry js-masonry masonry_item">
				<div class="masonry_gutter"></div>
				<div class="masonry_column"></div><?php

				$archive_args = array( 'category__in' => array(get_query_var('cat')) );

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
										<?php foreach((get_the_category()) as $category) {
										echo '<span>' . $category->name . '</span> ';
										} ?>
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
