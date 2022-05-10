<?php
require_once './controlador/visitas.controlador.php';
$ip = new VisitasControlador();
$reg = $ip->CtrVisitas();
?>
<!-- Start header -->
<header class="top-header">
	<nav class="navbar header-nav navbar-expand-lg">
		<div class="container">
			<i class="hidden"> <?php echo $reg ?></i>
			<a class="navbar-brand" href="index"><img src="<?php echo SERVERURL ?>/vista/img/logo.png" alt="image"></a>
			<button class="navbar-toggler psd" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<div class="collapse navbar-collapse navbar-right" id="navbar-wd">
				<ul class="navbar-nav">
					<li><a class="nav-link" href="#home">Inicio</a></li>
					<li><a class="nav-link" href="#about">Acerca de Nosotros</a></li>
					<li><a class="nav-link" href="#services">Nuestros Servicios </a></li>
					<li><a class="nav-link" href="#appointment">Citas</a></li>
					<li><a class="nav-link" href="#gallery">Galeria</a></li>
					<li><a class="nav-link" href="#team">Doctor</a></li>
					<li><a class="nav-link" href="login">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!-- End header -->

<!-- Start Banner -->
<div id="home" class="ulockd-home-slider">
	<div class="container-fluid">
		<div class="row">
			<div class="pogoSlider" id="js-main-slider">
				<div class="pogoSlider-slide" data-transition="fade" data-duration="1400" style="background-image:url(<?php echo SERVERURL ?>/vista/img/slider-01.jpg);">
					<div class="lbox-caption pogoSlider-slide-element">
						<div class="lbox-details">
							<h1>Bienvenido a Cruz Medi Dental </h1>
							<p>Cuidando la sonrisa de los más pequeños</p>
							<a href="#contact" class="btn">Contactactanos</a>
						</div>
					</div>
				</div>
				<div class="pogoSlider-slide" data-transition="fade" data-duration="1400" style="background-image:url(<?php echo SERVERURL ?>/vista/img/inicio1.jpg);">
					<div class="lbox-caption pogoSlider-slide-element">
						<div class="lbox-details">
							<h1>Somos expertos en el campo del cuidado dental</h1>
							<p>Fusce convallis ante id purus sagittis malesuada. Sed erat ipsum</p>
							<a href="#appointment" class="btn">Agenda una cita</a>
						</div>
					</div>
				</div>
				<div class="pogoSlider-slide" data-transition="fade" data-duration="1400" style="background-image:url(<?php echo SERVERURL ?>/vista/img/inicio3.jpg);">
					<div class="lbox-caption pogoSlider-slide-element">
						<div class="lbox-details">
							<h1>Con todas las normas de bioseguridad</h1>
							<p>Pensamos en tu salud y en la de nosotros</p>
							<a href="#contact" class="btn">Contactactanos</a>
						</div>
					</div>

				</div>
			</div><!-- .pogoSlider -->
		</div>
	</div>
</div>
<!-- End Banner -->

<!-- Start About us -->
<div id="about" class="about-box">
	<div class="about-a1">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title-box">
						<h2>Acerca de nosotros</h2>
						<p>La satisfacción total de sus pacientes es nuestro principal objetivo</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row align-items-center about-main-info">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2> CRUZ MEDI DENTAL </h2>
							<p>Es la clínica creada especialmente para ti. Somos tu mejor opción en el sur de Quito y contamos con un equipo de profesionales que cuidan de tu salud en general.
								Esta clínica nace para brindar un servicio de salud bucodental de calidad y atención personalizada, con un equipo de profesionales altamente capacitados.</p>
							<p>Contamos con Tecnología de punta, cómodas instalaciones y un equipo de Odontólogos, Médicos y de servicio al cliente entrenado para ofrecer a sus pacientes un trato preferencial y de calidad.

								Adicionalmente nos especializamos en brindar todos los servicios en un mismo lugar.</p>

						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="about-m">
								<ul id="banner">
									<li>
										<img src="<?php echo SERVERURL ?>/vista/img/acerca1.jpg" alt="">
									</li>
									<li>
										<img src="<?php echo SERVERURL ?>/vista/img/acerca2.jpg" alt="">
									</li>
									<li>
										<img src="<?php echo SERVERURL ?>/vista/img/acerca3.jpg" alt="">
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End About us -->

<!-- Start Services -->
<div id="services" class="services-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>¿Qué nos hace diferentes?</h2>

				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="owl-carousel owl-theme">
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-h-square" aria-hidden="true"></i></div>
							<h3 class="title">Atención personalizada</h3>
							<p class="description">
								Partimos de la premisa que cada paciente es único. Es por ello, que llevamos un estricto control para recuperar tu bienestar, tu salud bucodental y lograr estéticamente la sonrisa de tus sueños.
							</p>

						</div>
					</div>
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
							<h3 class="title">Diagnóstico integral</h3>
							<p class="description">
								Siempre haremos una evaluación integral. Esto se realiza mediante radiografías para identificar cualquier daño oculto que pueda causarte molestia o daños estéticos en el futuro.
							</p>

						</div>
					</div>
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></div>
							<h3 class="title">Control y seguimiento</h3>
							<p class="description">
								Nuestros especialistas y personal de apoyo logístico, estarán muy pendiente de tu caso, hacemos un seguimiento cercano, con el fin de que culmines tus tratamientos de acuerdo a la planificación acordada.
							</p>

						</div>
					</div>
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-stethoscope" aria-hidden="true"></i></div>
							<h3 class="title">Como atendemos</h3>
							<p class="description">
								Consideramos que el centro de nuestra atención siempre sera los pacientes. Nos comprometemos con ayudar a la sociedad a través de nuestra profesión, tenemos un buen trabajo en equipo.
							</p>

						</div>
					</div>
					<!--<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-wheelchair" aria-hidden="true"></i></div>
							<h3 class="title">Lorem ipsum dolor</h3>
							<p class="description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
							</p>

						</div>
					</div>
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
							<h3 class="title">Lorem ipsum dolor</h3>
							<p class="description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
							</p>

						</div>
					</div>
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>
							<h3 class="title">Lorem ipsum dolor</h3>
							<p class="description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
							</p>

						</div>
					</div>
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-user-md" aria-hidden="true"></i></div>
							<h3 class="title">Lorem ipsum dolor</h3>
							<p class="description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
							</p>

						</div>
					</div>
					<div class="item">
						<div class="serviceBox">
							<div class="service-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></div>
							<h3 class="title">Lorem ipsum dolor</h3>
							<p class="description">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequuntur.
							</p>

						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Services -->

<!-- Start Appointment -->
<div id="appointment" class="appointment-main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>Agenda una cita </h2>
					<p>Que estas esperando y agenda una cita con nosotros. </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="well-block">
					<div class="well-title">
						<h2>Libro de citas</h2>
					</div>
					<form>
						<!-- Form start -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="name">Nombre</label>
									<input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
								</div>
							</div>
							<!-- Text input-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="email">Email</label>
									<input id="email" name="email" type="text" placeholder="test@mail.com" class="form-control input-md">
								</div>
							</div>
							<!-- Text input-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="date">Fecha preferida</label>
									<input type="date" name="date" type="text" placeholder="Preferred Date" class="form-control input-md">
								</div>
							</div>
							<!-- Select Basic -->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label" for="time">Hora preferida</label>
									<select id="time" name="time" class="form-control">
										<option value="8:00 to 9:00">8:00 a 9:00</option>
										<option value="9:00 to 10:00">9:00 a 10:00</option>
										<option value="10:00 to 1:00">10:00 a 1:00</option>
									</select>
								</div>
							</div>
							<!-- Select Basic -->
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="appointmentfor">Departmento</label>
									<select id="appointmentfor" name="appointmentfor" class="form-control">
										<option value="Gynacology">Consulta General</option>
									</select>
								</div>
							</div>
							<!-- Button -->
							<div class="col-md-12">
								<div class="form-group">
									<button id="singlebutton" name="singlebutton" class="new-btn-d br-2">AGENDAR</button>
								</div>
							</div>
						</div>
					</form>
					<!-- form end -->
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="well-block">
					<div class="well-title">
						<h2>¿Porque agendar una cita con nosotros?</h2>
					</div>
					<div class="feature-block">
						<div class="feature feature-blurb-text">
							<h4 class="feature-title">Disponibilidad</h4>
							<div class="feature-content">
								<p>De Lunes a Viernes de 8:00 a 17:00</p>
								<p>Sabados 10:00 a 14:00</p>
							</div>
						</div>
						<div class="feature feature-blurb-text">
							<h4 class="feature-title">Personal experimentado disponible</h4>

						</div>
						<div class="feature feature-blurb-text">
							<h4 class="feature-title">Precios Accesibles</h4>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Appointment -->

<!-- Start Gallery -->
<div id="gallery" class="gallery-box">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>Galeria</h2>
					<p>Echa un vistaso a nuestras mejores fotos. </p>
				</div>
			</div>
		</div>

		<div class="popup-gallery row clearfix">
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/gallery-01.jpg" alt="">
					<div class="box-content">

						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/gallery-01.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/gallery-02.jpg" alt="">
					<div class="box-content">

						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/gallery-02.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/gallery-06.jpg" alt="">
					<div class="box-content">
						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/gallery-06.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/galeria1.jpg" alt="">
					<div class="box-content">

						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/galeria1.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/galeria2.jpg" alt="">
					<div class="box-content">

						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/galeria2.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/galeria6.jpg" alt="">
					<div class="box-content">

						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/galeria6.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/galeria7.jpg" alt="">
					<div class="box-content">

						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/galeria7.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="box-gallery">
					<img src="<?php echo SERVERURL ?>/vista/img/gallery-08.jpg" alt="">
					<div class="box-content">

						<ul class="icon">
							<li><a href="<?php echo SERVERURL ?>/vista/img/gallery-08.jpg"><i class="fa fa-picture-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Gallery -->

<!-- Start Team -->
<div id="team" class="team-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					<h2>Nuestros Doctores</h2>
				</div>
			</div>
		</div>

		<!--<div class="row">
			<div class="col-md-4 col-sm-6">
				<div class="our-team">
					<div class="pic">
						<img src="<?php echo SERVERURL ?>/vista/img/img-1.jpg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Williamson</h3>
						<span class="post">web developer</span>
						<ul class="social">
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>-->

			<div class="col-md-4 col-sm-6">
				<div class="our-team">
					<div class="pic">
						<img src="<?php echo SERVERURL ?>/vista/img/perfil/Dr01.jpg">
					</div>
					<div class="team-content">
						<h3 class="title">kristina</h3>
						<span class="post">Web Designer</span>
						<ul class="social">
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<!--<div class="col-md-4 col-sm-6">
				<div class="our-team">
					<div class="pic">
						<img src="<?php echo SERVERURL ?>/vista/img/img-3.jpg" alt="">
					</div>
					<div class="team-content">
						<h3 class="title">Steve Thomas</h3>
						<span class="post">web developer</span>
						<ul class="social">
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>-->
		</div>

	</div>
</div>

<!-- End Team -->



<!-- Start Contact -->
<div id="contact" class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="title-box">
					
					<h2><i class="fa fa-location-arrow" aria-hidden="true"></i>Ubicanos</h2>
					<div id="map"></div>
				</div>
			</div>
			<div class="left-contact">
				<div class="media cont-line col-lg-1 hidden">

				</div>

				<div class="media cont-line">
					<div class="media-left icon-b">
						<i class="fa fa-location-arrow" aria-hidden="true"></i>
					</div>
					<div class="media-body dit-right">
						<h4>La dirección</h4>
						<p>Panamericana sur km 0 y Av. Atacazo frente a la entrada del INIAP - Barrio Central de Cutuglagua.</p>
					</div>
				</div>
				<div class="media cont-line">
					<div class="media-left icon-b">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
					<div class="media-body dit-right">
						<h4>Email</h4>
						<p>demoinfo@gmail.com</p>

					</div>
				</div>
				<div class="media cont-line">
					<div class="media-left icon-b">
						<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
					</div>
					<div class="media-body dit-right">
						<h4>Phone Number</h4>
						<a href="#">098 375 9008</a><br>
						<a href="#">12345 67890</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">





</div>
<!-- End Contact -->


<!-- Start Footer -->
<footer class="footer-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p class="footer-company-name">All Rights Reserved. &copy; 2018 Jhony Patin e Ismael Pineida Design By : <a href="https://html.design/">html design</a></p>

			</div>
		</div>
	</div>
</footer>
<!-- End Footer -->

<a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>