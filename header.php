<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width" />
	<title>Nuño Arquitectos</title>
	<link rel="shortcut icon" href="img/favicon.ico" />
	<meta name="keywords" content=" ">
	<meta name="author" content="Raidho Aesthetics">

	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="js/responsiveslides.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script type="text/javascript">
		$(function () {
			$("#slider1").responsiveSlides({
				pager: false,
				auto: false,
				nav: false,
				manualControls: '#slider3-pager'
			});
			$("#slider2").responsiveSlides({
				pager: false,
				auto: true,
				nav: false,
				manualControls: '#slider2-pager'
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(window).scroll( function(){
				$('.hide_half').each( function(i){
		            var bottom_of_object = $(this).offset().top + 100;
		            var bottom_of_window = $(window).scrollTop() + $(window).height();
					if( bottom_of_window > bottom_of_object ){
						$(this).animate({'opacity':'1'},500);
					}
		        }); 
		    });
			$(window).scroll( function(){
				$('.white_title').each( function(i){
		            var bottom_of_object = $(this).offset().top + 300;
		            var bottom_of_window = $(window).scrollTop() + $(window).height();
					if( bottom_of_window > bottom_of_object ){
						$(this).addClass( "display_title" );
					}
		        }); 
		    });
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$window = $(window);
			$('.slide .img[data-type="background"]').each(function(){
				var $bgobj = $(this);
				$(window).scroll(function() {					
					var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
					var coords = '50% '+ yPos + 'px';
					$bgobj.css({ backgroundPosition: coords });
				});
			});	
		}); 
	</script>

</head>

<body>
	<header>
		<div class="logo">
			<a href="index.php"><img src="img/logo_black.svg"></a>
		</div>
		
		<a href="javascript:void(0)" class="burger">
			<div></div><div></div><div></div>
		</a>

		<nav>
			<ul class="st-menu">
				<li>
					<a href="proyectos.php">proyectos</a>
				</li>
				<li>
					<a href="nosotros.php">nosotros</a>
				</li>
				<li>
					<a href="servicios.php">servicios/proceso</a>
				</li>
				<li>
					<a href="contacto.php">contacto</a>
				</li>
			</ul>
		</nav>
	</header>
