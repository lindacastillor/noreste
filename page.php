<?php

	/*
	 * 	Template Name: Page Template
	 */

	get_header();


	$slider = get_field('slider');
	$count = count($slider);
	if($slider) {
		$n = 1; ?>
		<div class="wrapper" id="huge_slide">
			<ul class="rslides slide" id="slider1"><?php
				while (have_rows('slider')) { the_row(); ?>
					<li>
						<div class="img" id="homeBgImg<?php echo $n; ?>" data-type="background" data-speed="10"><?php
							$orImg = get_sub_field('img-or');
							$pO = get_sub_field('post');
							if($pO) {
							$post = $pO;
							setup_postdata($post); ?>

								<div>
									<div class="mask"></div>
									<div class="titulo"><a href="<?php the_permalink(); ?>"><p><?php the_title(); ?></p></a></div>
								</div><?php
								if($orImg) {
									$img = $orImg;
								} else {
									$img = get_post_thumbnail_id( $post->ID );
								}
								full_bgImg($img, '#homeBgImg'.$n++);

							wp_reset_postdata();
							} ?>
						</div>
					</li><?php
				} ?>
			</ul><?php
	// } if($slider) {
		if($count > 1) {
		$n = 1; ?>
			<ul class="slide-pager" id="slider3-pager"><?php
			while (have_rows('slider')) { the_row(); ?>
				<li><a href="#tab<?php echo $n; ?>"><p><?php echo $n++; ?></p></a></li><?php
			} ?>
			</ul><?php
		} ?>
		</div><?php
	}




	if(get_field('flex')) {
		while (have_rows('flex')) : the_row();
			if(get_row_layout() == 'content') : ?>
			<section class="bg_grayM">
				<div class="quote">
					<div class="full">
						<?php the_sub_field('content'); ?>
					</div>
				</div>
			</section><?php


			elseif (get_row_layout() == 'bloques') : ?>
			<section class="halfs">
				<ul><?php
					while(have_rows('repeater')) : the_row(); ?>

					<li class="<?php // hide_half ?>">
						<div class="imagen"><?php
							$images = get_sub_field('gallery');
							$count = count($images);
							$n = 1;
							if($count > 1) { ?>

								<ul class="rslides slide" id="slider2"><?php
									foreach ($images as $image) { ?>
										<li><?php
											imgObj($image, 'half_img'); ?>
										</li><?php
									} ?>
								</ul>
								<ul class="slide-pager" id="slider2-pager"><?php
									foreach ($images as $image) { ?>
										<li><a href="#tab<?php echo $n; ?>"><p><?php echo $n++; ?></p></a></li><?php
									} ?>
								</ul><?php

							} else {
								foreach ($images as $image) {
									imgObj($image, 'half_img');
								}
							} ?>
						</div>
						<div class="titulo" style="background-image: url('img/590.jpg');">
							<a href="<?php the_sub_field('post'); ?>">
								<div class="txt">
									<div>
										<?php the_sub_field('content'); ?>
									</div>
								</div>
							</a>
						</div>
					</li><?php

					endwhile; ?>
				</ul>
			</section><?php

			endif;
		endwhile;
	}




	if(get_field('excerpt')) { ?>
		<section class="bg_coal">
			<div class="quote">
				<div class="full black_quote">
					<div class="futura_big white"><?php the_field('excerpt'); ?></div>
				</div>
			</div>
		</section><?php
	}




	$hImg = get_field('big_img');
	if($hImg) { ?>
		<section>
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




	if(get_field('service_list')){ ?>
		<section>
			<div class="servicios">
				<div class="title">
					<h1>Servicios</h1>
				</div>
				<ul><?php
				while (have_rows('service_list')) { the_row(); ?>
					<li><?php

						if(get_sub_field('img')){
							echo '<div class="imagen"><img src="img/590.jpg"></div>';
						} ?>
						<div class="titulo">
							<a href="<?php the_sub_field('link'); ?>">
								<div class="txt">
									<div>
										<p><?php the_sub_field('title'); ?></p>
									</div>
								</div>
							</a>
						</div>
					</li><?php
				} ?>
				</ul>
			</div>
		</section><?php
	}




	if(get_field('contenido')) {
		while(have_rows('contenido')) : the_row(); ?>
		<section>
			<div class="entire_halfs white" id="hippo"><?php
				$hImg = get_sub_field('bg_img');
				if($hImg){
					full_bgImg($hImg, '#ftd_bg');
				} ?>
				<div class="coal_mask"></div>
				<div class="title">
					<h1><?php the_sub_field('title'); ?></h1>
				</div>
				<div class="two_columns">
					<ul>
						<li><?php the_sub_field('content'); ?></li>
						<li><?php the_sub_field('content_2'); ?></li>
					</ul>
				</div>
			</div>
		</section><?php
		endwhile;
	}




	if(get_field('miembros')) {
		get_template_part('inc/team');
	}




	while(have_rows('footer', 'options')) { the_row();
		$address = get_sub_field('address');
	}
	if(get_field('or_address') || get_field('map')){ ?>
		<section>
			<div class="entire_halfs white" style="background-image: url('img/2000x2117.jpg');">
				<div class="coal_mask"></div>
				<div class="title">
					<h1 class="futuraB_big">Contacto.</h1>
				</div>
				<div class="two_columns">
					<ul>
						<li><?php
							if(get_field('or_address')){
								the_field('or_address');
							} else {
								echo $address;
							} ?>
						</li>
						<li>
							<div class="gmap">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3596.1523154334755!2d-100.40560414908629!3d25.666245118728117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662bd7d06930a2b%3A0xc8c9af8c92e98e1!2sIndependencia+208%2C+Casco+Urbano%2C+66230+San+Pedro+Garza+Garc%C3%ADa%2C+N.L.!5e0!3m2!1ses-419!2smx!4v1444500831964" frameborder="0" style="border:0; max-width: 300px; height:300px;" allowfullscreen></iframe>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section><?php
	}




	get_template_part('inc/contact');
	get_footer(); ?>
