<footer>
	<div class="sitemap">
		<div class="links">
			<div>
				<img src="img/logo_black.svg">
			</div>
			<div>
				<ul>
					<li><a href="#">inicio</a></li>
					<li><a href="#">proyecto</a></li>
					<li><a href="#">nosotros</a></li>
					<li><a href="#">proceso/servicios</a></li>
					<li><a href="#">contacto</a></li>
				</ul>
			</div>
		</div>
		<div class="social">
			<ul>
				<li>
					<a href="#"><p>Facebook</p></a>
				</li>
				<li>
					<a href="#"><p>Instagram</p></a>
				</li>
			</ul>
		</div>
	</div>

	<div class="info">
		<div class="frase">
			<p>“El espacio que habitamos es el reflejo de nosotros mismos”.</p>
			<span>— Salvador Dalí.</span>
		</div>
		<div class="txt">
			<div>
				<p>Independencia 208 Pte. San Pedro <br>
				G.G., N.L. CP. 66230 <br><br>
				<b>t:</b> (81) 8338 1020<br>
				<b>e.</b> info@nuno.com.mx</p>
			</div>
			<div><p>Nuño Arquitectos 2016. <br>
				Derechos Reservados.<br>
				Sitio web: <a href="#"><b>Raidho</b></a></p>
			</div>
		</div>
	</div>
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
