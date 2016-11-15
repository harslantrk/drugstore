@extends('layouts.template0.master')

@section('content')

<div role="main" class="main">
                <div class="slider-container rev_slider_wrapper">
                    <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"delay": 9000, "gridwidth": 1170, "gridheight": 500}'>
                        <ul>
                            <?php foreach ($sliders as $key => $slider): ?>
                                
                            
                            <li data-transition="fade">
                                <a href="{{ $slider->link }}">
                                <img style="width:100%; height:100%;" src="{{ $slider->image }}"  
                                    alt=""
                                    data-bgposition="center center" 
                                    data-bgfit="cover" 
                                    data-bgrepeat="no-repeat" 
                                    class="rev-slidebg">

                                <div class="tp-caption featured-label"
                                    data-x="center"
                                    data-y="210"
                                    data-start="500"
                                    style="z-index: 5"
                                    data-transform_in="y:[100%];s:500;"
                                    data-transform_out="opacity:0;s:500;">{{ $slider->title }}</div>

                                <div class="tp-caption bottom-label"
                                    data-x="center"
                                    data-y="270"
                                    data-start="1000"
                                    data-transform_idle="o:1;"
                                    data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:600;e:Power4.easeInOut;"
                                    data-transform_out="opacity:0;s:500;"
                                    data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                    data-splitin="chars" 
                                    data-splitout="none" 
                                    data-responsive_offset="on"
                                    style="font-size: 23px; line-height: 30px;"
                                    data-elementdelay="0.05">{{ $slider->subtitle }}</div>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="home-intro home-intro-secondary" id="home-intro">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-8">
                                <p>
                                    EMC Bilgi <em>Teknolojileri</em>
                                    <span>Yaptıklarımız Yapacaklarımızın Teminatıdır.</span>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="get-started">
                                    <a href="/iletisim" class="btn btn-lg btn-primary">Şimdi Dene</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="container">
                    <div class="row mb-xl">
                        <div class="col-md-12 center">

                            <h2 class="mb-xl"><strong>Hakkımızda</strong></h2>
                            <p></p>

                            <a class="btn btn-borders btn-default mr-xs mb-sm" href="/">Devamı</a>
                        </div>
                    </div>
                </div></div>
                <section class="section section-tertiary section-no-border mb-none">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 center">
                                <h2 class="heading-dark"><strong>Hizmetlerimiz</strong></h2>
                            </div>
                        </div>

                        <div class="row">
                            <?php foreach ($services as $key => $service): ?>
                                <div class="col-md-4">
                                    <div class="feature-box feature-box-style-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <div class="feature-box-icon" align="center">
                                            <i class="fa <?=$service->icons?>"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-sm">{{ $service->title }}</h4>
                                            <p class="mb-lg">{{ $service->short_content }}</p>
                                        </div>
                                    </div>
                                </div>  
                            <?php endforeach ?>
                        </div>
                    </div>
                </section>
                <section class="section section-quaternary section-no-border mt-none">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 center">
                                <h2 class="heading-dark"><strong>Müşteri Yorumları</strong></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="owl-carousel owl-theme mb-none" data-plugin-options='{"items": 1, "margin": 0, "loop": false}'>
                                <?php foreach ($comment as $key => $client): ?>
                                    <div class="col-md-12">
                                        <div class="testimonial testimonial-style-4 testimonial-no-borders appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                                            <div class="testimonial-author" style="max-width: 220px;margin: 0 auto;text-align: center;">
                                                <div class="testimonial-author-thumbnail">
                                                    <?php if ($client->image): ?>
                                                        <img style="height:60px !important;" src="{{$client->image}}" class="img-responsive img-circle" alt="">
                                                    <?php else: ?>
                                                        <img style="height:60px !important;" src="/img/icon-person.png" class="img-responsive img-circle" alt="">
                                                    <?php endif ?>
                                                </div>
                                                <p><strong>{{ $client->name }}</strong><span>{{ $client->position }}</span></p>
                                            </div>
                                            <blockquote style="text-align:center;max-width:650px; margin:0 auto;">
                                                <p><?=$client->comment?></p>
                                            </blockquote>
                                            <div class="testimonial-arrow-down"></div>
                                           
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                
                            </div>
                        </div>
                    </div>
                </section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 center mb-xl">
                            <h2 class="mt-xl"><strong>Galeri Resimlerimiz</strong></h2>

                            <div class="owl-carousel owl-theme mb-none" data-plugin-options='{"items": 4, "margin": 0, "loop": false}'>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-22.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-19.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-20.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-17.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-18.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-16.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-15.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-21.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-17.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div>
                                    <a href="portfolio-single.html">
                                        <img src="/img/template0/img/projects/project-22.jpg" class="img-responsive" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <section class="section section-tertiary section-no-border mb-xl">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 center">
                                <h2 class="mt-xl"><strong>Haberler</strong></h2>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($blog as $key => $blogs): ?>
                            <div class="col-md-4">
                                <div class="recent-posts mt-xl">
                                    <article class="post">
                                        <div class="date">
                                            <span class="day"><?=substr($blogs->created_at,8,2) ?></span>
                                            <span class="month"><?php
                                            $month = substr($blogs->created_at,5,2);
                                            $monthName= Helper::MonthNameConverter($month);
                                            echo $monthName; 
                                            ?></span>
                                        </div>
                                        <h4><a href="blog-post.html">{{ substr($blogs->name,0,60)}}..</a></h4>
                                        <p><?= substr($blogs->description,0,80)?>..</p>
                                        <a class="btn btn-borders btn-dark mt-md mb-xl" href="/<?=$blogs->slug.'/'.$blogs->id?>">Devamı</a>
                                    </article>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </section>
                <style type="text/css">
                    .owl-dots {
                        display: block !important;
                    }
                </style>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 center">
                            <h2 class="mt-xl"><strong>Referanslarımız</strong></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 center">
                            <div class="owl-carousel owl-theme mt-xl" data-plugin-options='{"items": 4, "autoplay": true, "autoplayTimeout": 3000}'>
                                <?php foreach ($reference as $key => $ref): ?>                           
                                <div>
                                    <a href="{{ $ref->link }}"><img style="padding:10px; height:80px;" class="img-responsive" src="<?=$ref->image?>" alt="">
                                    </a>
                                    <!--<?php if ($ref->image): ?>
                                        <a href="{{$ref->link}}"><img style="padding:10px;" class="img-responsive" src="<?=$ref->image?>" alt=""></a>
                                    <?php else: ?>
                                        <h1> {{$ref->name}} </h1>
                                    <?php endif ?>-->
                                </div>
                            <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection
