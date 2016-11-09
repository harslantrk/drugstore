@extends('layouts.template0.master')

@section('content')


<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="/">Anasayfa</a></li>
									<li class="active">Hizmetlerimiz</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h1>Hizmetlerimiz</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<h2>EMC Bilişim<strong> Hizmetleri</strong></h2>

					<div class="row">
						<div class="col-md-10">
							<p class="lead">
								<?=$pageService[0]['content']?>
							</p>
						</div>
						<div class="col-md-2">
							<a href="/iletisim" class="btn btn-lg btn-primary mt-xl pull-right">Hemen İletişime Geç!</a>
						</div>
					</div>

					<hr>

					<div class="featured-boxes">
						<div class="row">
							<?php foreach ($services as $key => $service): ?>						
							<div class="col-md-3 col-sm-6">
								<div class="featured-box featured-box-primary featured-box-effect-1 mt-xlg">
									<div class="box-content">
										<i class="icon-featured fa {{$service->icons}}"></i>
										<h4 class="text-uppercase">{{$service->title}}</h4>
										<p>{{$service->short_content}}</p>
										<p><a href="{{$service->slug}}/{{$service->id}}" class="lnk-primary learn-more">İncele <i class="fa fa-angle-right"></i></a></p>
									</div>
								</div>
							</div>
							<?php endforeach ?>
						</div>
					</div>

					<hr>
				</div>

			</div>


@endsection