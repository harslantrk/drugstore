@extends('layouts.template0.master')

@section('content')

<div role="main" class="main">

                <section class="page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="breadcrumb">
                                    <li><a href="/">Anasayfa</a></li>
                                    <li class="active">Hakkımızda</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Hakkımızda</h1>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="word-rotator-title">
                                EMC Bilişim <strong>
                                    <span class="word-rotate" data-plugin-options='{"delay": 2000}'>
                                        <span class="word-rotate-items">
                                            <span>hızlı.</span>
                                            <span>güvenilir.</span>
                                            <span>işinin ehli.</span>
                                        </span>
                                    </span>
                                </strong>
                            </h2>
                        </div>
                    </div>

                    <!--<div class="row">
                        <div class="col-md-10">
                            <p class="lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non <span class="alternative-font">metus.</span> pulvinar. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh.
                            </p>
                        </div>
                        <div class="col-md-2">
                            <a href="#" class="btn btn-lg btn-primary mt-xl">Join Our Team!</a>
                        </div>
                    </div>-->

                    <div class="row">
                        <div class="col-md-12">
                            <hr class="tall">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="heading-primary">Hakkımızda</h3>
                            <p><?=$aboutus[0]['content']?></p>
                            
                        </div>
                        <!--<div class="col-md-4">
                            <div class="featured-box featured-box-primary">
                                <div class="box-content">
                                    <h4 class="text-uppercase">Behind the scenes</h4>
                                    <ul class="thumbnail-gallery" data-plugin-lightbox data-plugin-options='{"delegate": "a", "type": "image", "gallery": {"enabled": true}}'>
                                        <li>
                                            <a title="Benefits 1" href="img/benefits/benefits-1.jpg">
                                                <span class="thumbnail mb-none">
                                                    <img src="img/benefits/benefits-1-thumb.jpg" alt="">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Benefits 2" href="img/benefits/benefits-2.jpg">
                                                <span class="thumbnail mb-none">
                                                    <img src="img/benefits/benefits-2-thumb.jpg" alt="">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Benefits 3" href="img/benefits/benefits-3.jpg">
                                                <span class="thumbnail mb-none">
                                                    <img src="img/benefits/benefits-3-thumb.jpg" alt="">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Benefits 4" href="img/benefits/benefits-4.jpg">
                                                <span class="thumbnail mb-none">
                                                    <img src="img/benefits/benefits-4-thumb.jpg" alt="">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Benefits 5" href="img/benefits/benefits-5.jpg">
                                                <span class="thumbnail mb-none">
                                                    <img src="img/benefits/benefits-5-thumb.jpg" alt="">
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Benefits 6" href="img/benefits/benefits-6.jpg">
                                                <span class="thumbnail mb-none">
                                                    <img src="img/benefits/benefits-6-thumb.jpg" alt="">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr class="tall">
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="heading-primary mt-xl">Our <strong>History</strong></h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <ul class="history">
                                <li class="appear-animation" data-appear-animation="fadeInUp">
                                    <div class="thumb">
                                        <img src="img/office/office-4.jpg" alt="" />
                                    </div>
                                    <div class="featured-box">
                                        <div class="box-content">
                                            <h4 class="heading-primary"><strong>2012</strong></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="appear-animation" data-appear-animation="fadeInUp">
                                    <div class="thumb">
                                        <img src="img/office/office-3.jpg" alt="" />
                                    </div>
                                    <div class="featured-box">
                                        <div class="box-content">
                                            <h4 class="heading-primary"><strong>2010</strong></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="appear-animation" data-appear-animation="fadeInUp">
                                    <div class="thumb">
                                        <img src="img/office/office-2.jpg" alt="" />
                                    </div>
                                    <div class="featured-box">
                                        <div class="box-content">
                                            <h4 class="heading-primary"><strong>2005</strong></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="appear-animation" data-appear-animation="fadeInUp">
                                    <div class="thumb">
                                        <img src="img/office/office-1.jpg" alt="" />
                                    </div>
                                    <div class="featured-box">
                                        <div class="box-content">
                                            <h4 class="heading-primary"><strong>2000</strong></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus,</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>-->

                </div>

            </div>
@endsection