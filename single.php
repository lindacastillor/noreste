<?php

get_header(); ?>


<section>
	<div class="filtro">
		<div class="titulo">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="categoria">
			<?php
			$posttags = get_the_tags();
			if ($posttags) {
				foreach($posttags as $tag) {
					echo '<span>' . $tag->name . '</span> ';
				}
			}
			?>
		</div>
	</div>
</section><?php


$hImg = get_post_thumbnail_id( $post->ID );
if($hImg) { ?>
	<section class="y_mtop">
		<div class="wrapper" id="huge_slide">
			<ul class="rslides slide" id="slider1">
				<li>
					<div class="img" id="ftd_bg" data-type="background" data-speed="10"><?php
						full_bgImg($hImg, '#ftd_bg'); ?>
					</div>
				</li>
			</ul>
		</div>
	</section><?php
}



if(have_rows('modulos')) :
	while(have_rows('modulos')) : the_row();
		if(get_row_layout() == 'contenido') : ?>

		<section class="bg_white">
			<div class="gallery">
				<ul><?php
				while(have_rows('repeater')) : the_row();
					$choose = get_sub_field('choose');


					if($choose == 'txt_blank') { ?>
						<li class="txt_img blank">
							<div class="txt">
								<div class="futura_med"><?php the_sub_field('content'); ?></div>
							</div>
							<div class="half_img">&nbsp;</div>
						</li><?php


					} elseif($choose == 'txt_img') { ?>
						<li class="txt_img">
							<div class="txt">
								<div class="futura_med"><?php the_sub_field('content'); ?></div>
							</div><?php

							$hImg = get_sub_field('img_A');
							imgObj($hImg, 'half_img'); ?>

						</li><?php


					} elseif($choose == 'img_txt') { ?>
						<li class="txt_img"><?php

							$hImg = get_sub_field('img_A');
							imgObj($hImg, 'half_img'); ?>

							<div class="txt">
								<div class="futura_med"><?php the_sub_field('content'); ?></div>
							</div>
						</li><?php


					} elseif($choose == 'img_img') { ?>
						<li><?php

							$hImg = get_sub_field('img_A');
							imgObj($hImg, 'half_img');

							$hImg = get_sub_field('img_B');
							imgObj($hImg, 'half_img'); ?>

						</li><?php


					} elseif($choose == 'big_img') { ?>
						<li><?php

							$hImg = get_sub_field('img_A');
							imgObj($hImg, 'full_img'); ?>

						</li><?php


					} elseif($choose == 'blank_img') { ?>
						<li class="txt_img">
							<div class="txt">
								<p class="futura_med">&nbsp;</p>
							</div><?php

							$hImg = get_sub_field('img_A');
							imgObj($hImg, 'half_img'); ?>

						</li><?php

					}
				endwhile; ?>
				</ul>
			</div>
		</section><?php


		elseif(get_row_layout() == 'creditos') : ?>

			<section class="bg_white">
				<div class="credits">
					<div><?php
						while(have_rows('repeat')) : the_row(); ?>
						<ul>
							<li><h2><?php the_sub_field('category') ?></h2></li>
							<li><?php the_sub_field('content'); ?></li>
						</ul><?php
						endwhile; ?>
					</div>
				</div>
			</section><?php


		endif;
	endwhile;

endif;

get_template_part('inc/contact');

get_footer(); ?>
