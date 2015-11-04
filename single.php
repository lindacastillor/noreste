<?php

get_header(); ?>


<section>
	<div class="filtro">
		<div class="titulo">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="categoria">
			<?php the_category(); ?>
		</div>
	</div>
</section>


<section class="y_mtop">
	<div class="wrapper" id="huge_slide">
		<ul class="rslides slide" id="slider1">
			<li>
				<div class="img" style="background-image: url('img/2s.jpg');" data-type="background" data-speed="10">
					<div>
						<!-- <div class="mask"></div>
						<div class="titulo">
							<p>Casa<br>Maíz RyE.</p>
							<span></span>
						</div> -->
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>



<section class="bg_white">
	<div class="quote">
		<div class="half">
			<p class="futura_med">La casa se diseñó con un estudio del espacio y del usuario,
				se llegó a concluir tcomo objetivo principal, la accesibilidad de entradas
				desde distintos puntos a todas las áreas comunes.</p>
		</div>
	</div>
</section><?php


if(have_rows('modulos')) :
	while(have_rows('modulos')) : the_row();
		if(get_row_layout() == 'contenido') : ?>

		<section class="bg_white">
			<div class="gallery">
				<ul><?php
				while(have_rows('repeat')) : the_row();
					$choose = get_sub_field('choose');
					if($choose == 'txt_blank') { ?>
						<li class="txt_img">
							<div class="txt">
								<p class="futura_med">La casa se diseñó con un estudio del espacio y del usuario,
							se llegó a concluir tcomo objetivo principal, la accesibilidad de entradas
							desde distintos puntos a todas las áreas comunes.</p>
							</div>
							<div class="half_img">&nbsp;</div>
						</li><?php


					} elseif($choose == 'txt_img') { ?>
						<li class="txt_img">
							<div class="txt">
								<p class="futura_med">La casa se diseñó con un estudio del espacio y del usuario,
							se llegó a concluir tcomo objetivo principal, la accesibilidad de entradas
							desde distintos puntos a todas las áreas comunes.</p>
							</div>
							<div class="half_img">
								<img src="img/3s.jpg">
							</div>
						</li><?php


					} elseif($choose == 'img_txt') { ?>
						<li class="txt_img">
							<div class="half_img">
								<img src="img/3s.jpg">
							</div>
							<div class="txt">
								<p class="futura_med">La casa se diseñó con un estudio del espacio y del usuario,
							se llegó a concluir tcomo objetivo principal, la accesibilidad de entradas
							desde distintos puntos a todas las áreas comunes.</p>
							</div>
						</li><?php


					} elseif($choose == 'img_img') { ?>
						<li>
							<div class="half_img">
								<img src="img/590.jpg">
							</div>
							<div class="half_img">
								<img src="img/3s.jpg">
							</div>
						</li><?php


					} elseif($choose == 'big_img') { ?>
						<li>
							<div class="entire_img">
								<img src="img/2s.jpg">
							</div>
						</li><?php


					} elseif($choose == 'blank_img') { ?>
						<li class="txt_img">
							<div class="txt">
								<p class="futura_med">&nbsp;</p>
							</div>
							<div class="half_img">
								<img src="img/3s.jpg">
							</div>
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
