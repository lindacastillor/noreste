<section>
	<div class="contact<?php
	if(is_single()) {
		echo ' bg_grayM y_mtop';
	} else {
		echo ' bg_grayL';
	} ?>">
		<?php // If Image ?>
		<div class="img" style=" background-image: url('img/590.jpg');">
		</div>
		<div class="form">
			<h2><?php // if(contact title) else : ?>Queremos ser parte de tu proyecto</h2>
			<p>Escríbenos y nos pondremos en contacto</p>
			<?php // Select Form ?>
			<form>
				<input type="text" placeholder="Tu Nombre:">
				<input type="text" placeholder="Email:">
				<input type="text" placeholder="Teléfono:">
				<textarea placeholder="Asunto:"></textarea>
				<input type="submit" value="Enviar">
			</form>
		</div>
	</div>
</section>
