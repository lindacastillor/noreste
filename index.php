<?php

	get_header(); ?>
	<section>
		<div class="half_fourth">
			<ul class="masonry js-masonry masonry_item">
				<div class="masonry_gutter"></div>
				<div class="masonry_column"></div><?php

				$archive_args = array(
					post_type => 'post',
					'posts_per_page'=> -1
					// post_meta_value => $variable_from_filter (interior || exterior)
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
	</section><?php
get_footer(); ?>
