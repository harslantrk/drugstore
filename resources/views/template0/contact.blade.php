
@extends('layouts.template0.master')

@section('content')
<div role="main" class="main">
	<!--<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Contact Us</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h1>Contact Us</h1>
				</div>
			</div>
		</div>
	</section>
	-->
	<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
	<!--<div id="googlemaps" class="google-map">-->
	<div id="my_map" style="height:320px;"></div>
		
	</div>

	<div class="container">

		<div class="row">
			<div class="col-md-6">

				<div class="alert alert-success hidden mt-lg" id="contactSuccess">
					<strong>Tebrikler !</strong> Mesajınız Başarıyla Gönderilmiştir.
				</div>

				<div class="alert alert-danger hidden mt-lg" id="contactError">
					<strong>Hata!</strong> Mesajınızı Kontrol Ettikten Sorna Tekrar Deneyiniz.
					<span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
				</div>

				<h2 class="mb-sm mt-sm"><strong>İletişim Formu</strong></h2>
				
					<div class="row">
						<div class="form-group">
							<div class="col-md-6">
								<label>Adınız *</label>
								<input type="text" value="" data-msg-required="Lütfen Adınızı Giriniz.." maxlength="100" class="form-control" name="name" id="name" required>
							</div>
							<div class="col-md-6">
								<label>Mail Adresiniz *</label>
								<input type="email" value="" data-msg-required="Lütfen Email Adresinizi Giriniz." data-msg-email="Lütfen Email Adresinizi Giriniz.." maxlength="100" class="form-control" name="email" id="email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Konu</label>
								<input type="text" value="" data-msg-required="Lütfen Mesajınızın Konusunu Giriniz." maxlength="100" class="form-control" name="subject" id="subject" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Telefon *</label>
								<input type="text" value="" data-msg-required="Lütfen Telefon Numaranızı Giriniz.." maxlength="100" class="form-control" name="phone" id="phone" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Mesajınız *</label>
								<textarea maxlength="5000" data-msg-required="Lütfen Mesaj Alanını Doldurun.." rows="10" class="form-control" name="message" id="message" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-lg mb-xlg" onclick="addContact()" data-loading-text="Gönderiliyor...">Gönder</button>
						</div>
					</div>
				
			</div>
			<div class="col-md-6">

				<!--<h4 class="heading-primary mt-lg">Get in <strong>Touch</strong></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				-->
				<hr>

				<h4 class="heading-primary"><strong>Ofisimiz</strong></h4>
				<ul class="list list-icons list-icons-style-3 mt-xlg">
					<li><i class="fa fa-map-marker"></i> <strong>Adres:</strong><?=$allSetting->address;?></li>
					<li><i class="fa fa-phone"></i> <strong>Telefon:</strong> <?=$allSetting->phone;?></li>
					<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?=$allSetting->email;?>"><?=$allSetting->email;?></a></li>
				</ul>

				<hr>

				<!--<h4 class="heading-primary"><strong>Çalışma Saatlerimiz</strong></h4>
				<ul class="list list-icons list-dark mt-xlg">
					<li><i class="fa fa-clock-o"></i> Monday - Friday - 9am to 5pm</li>
					<li><i class="fa fa-clock-o"></i> Saturday - 9am to 2pm</li>
					<li><i class="fa fa-clock-o"></i> Sunday - Closed</li>
				</ul>
				-->
			</div>

		</div>

	</div>

</div>
@endsection