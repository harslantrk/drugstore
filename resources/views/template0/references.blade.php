@extends('layouts.template0.master')

@section('content')

<div role="main" class="main">

	<section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="/">Anasayfa</a></li>
						<li class="active">{{$pageReference[0]['title']}}</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h1>{{$pageReference[0]['title']}}</h1>
				</div>
			</div>
		</div>
	</section>

	<div class="container">

		<!--<ul class="nav nav-pills sort-source" data-sort-id="portfolio" data-option-key="filter" data-plugin-options='{"layoutMode": "fitRows", "filter": "*"}'>
			<li data-option-value="*" class="active"><a href="#">Show All</a></li>
			<li data-option-value=".websites"><a href="#">Websites</a></li>
			<li data-option-value=".logos"><a href="#">Logos</a></li>
			<li data-option-value=".brands"><a href="#">Brands</a></li>
			<li data-option-value=".medias"><a href="#">Medias</a></li>
		</ul>
	-->
		<hr>

		<div class="row">
		<style type="text/css">
			.sort-destination-loader.sort-destination-loader-showing {
				height:auto !important;
				overflow:visible;
			}
			.sort-destination-loader.sort-destination-loader-showing ul {
				overflow:visible;
			}
			.sort-destination {
				overflow:visible;
			}
			.thumb-info .thumb-info-title {
				bottom:0;
			}
			html.webkit .thumb-info .thumb-info-wrapper {
				height:150px;
			}
			html.webkit .thumb-info .thumb-info-wrapper img {
				top:25%;
			}
		</style>
			<div class="sort-destination-loader sort-destination-loader-showing">
				<ul class="portfolio-list sort-destination popup-gallery-ajax" data-sort-id="portfolio">
				<?php foreach ($references as $key => $reference): ?>				
					<li class="col-md-3 col-sm-6 col-xs-12 isotope-item brands">
						<div class="portfolio-item">
							<a href="{{$reference->link}}" target="_blank"  data-ajax-on-modal>
								<span class="thumb-info thumb-info-lighten">
									<span class="thumb-info-wrapper">
										<img src="{{$reference->image}}" class="img-responsive" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">{{$reference->name}}</span>
										</span>
										<span class="thumb-info-action">
											<span class="thumb-info-action-icon"><i class="fa fa-plus-square"></i></span>
										</span>
									</span>
								</span>
							</a>
						</div>
					</li>
				<?php endforeach ?>
				</ul>
			</div>
		</div>

	</div>

</div>


@endsection