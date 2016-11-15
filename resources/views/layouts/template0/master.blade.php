<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>{{$allSetting->name}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/template0/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/img/template0/img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/plugins/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="/plugins/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/plugins/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/plugins/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/css/template0/theme.css">
    <link rel="stylesheet" href="/css/template0/theme-elements.css">
    <link rel="stylesheet" href="/css/template0/theme-blog.css">
    <link rel="stylesheet" href="/css/template0/theme-shop.css">
    <link rel="stylesheet" href="/css/template0/theme-animate.css">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="/plugins/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="/plugins/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="/plugins/rs-plugin/css/navigation.css">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/css/template0/skins/skin-corporate-6.css">
    

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/css/template0/custom.css">
    <!-- Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="/plugins/sweetalert/dist/sweetalert.css">

    <!-- Head Libs -->
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
   
   <div class="body">
      <header id="header" class="header-narrow" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": false}'>
        <div class="header-body">
          <div class="header-top header-top-style-4">
            <div class="container">
              <div class="header-search hidden-xs">
                <form id="searchForm" action="http://preview.oklerthemes.com/porto/4.9.2/page-search-results.html" method="get">
                  <div class="input-group">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Search..." required>
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </form>
              </div>
              <p class="pull-right">
                <span class="mr-xs"><i class="icon-call-end icons mr-xs"></i> {{$allSetting->phone}}</span><span class="hidden-xs"></span>
              </p>
            </div>
          </div>
          <div class="header-container container">
            <div class="header-row">
              <div class="header-column">
                <div class="header-logo">
                  <a href="/">
                    <img alt="{{$allSetting->name}}" width="100" height="48" src="{{$allSetting->logo}}">
                  </a>
                </div>
              </div>
              <div class="header-column">
                <div class="header-row">
                  <div class="header-nav">
                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                      <i class="fa fa-bars"></i>
                    </button>
                    <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                      <nav>
                        <ul class="nav nav-pills" id="mainNav">
                          <li class="">
                            <a href="/">
                              Anasayfa
                            </a>
                          </li>
                          <?php foreach ($mainMenu as $key => $menu): ?>
                            <li class="">
                              <a href="/<?=$menu->slug?>">
                                <?=$menu->title?>
                              </a>
                            </li>
                          <?php endforeach ?>
                          <li class="">
                            <a href="/iletisim">
                              İletişim
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      @yield('content')
 
      <footer id="footer" class="color color-secondary">
        <div class="container">
          <div class="row">
            <div class="footer-ribbon">
              <span><?=$allSetting->name;?></span>
            </div>
            <div class="col-md-3">
              <div class="newsletter">
                <h4>Haberdar Olun</h4>
                <p>Kampanya ve bildirimlerimizden haberdar olmak için mail adresinizi yazınız</p>
      
                <div class="alert alert-success hidden" id="newsletterSuccess">
                  <strong>Başarılı !</strong>
                </div>
      
                <div class="alert alert-danger hidden" id="newsletterError"></div>
      
                <form id="newsletterForm" action="http://preview.oklerthemes.com/porto/4.9.2/php/newsletter-subscribe.php" method="POST">
                  <div class="input-group">
                    <input class="form-control" placeholder="E Mail" name="newsletterEmail" id="newsletterEmail" type="text">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Gönder!</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-3">
              <h4>Son Tweetler</h4>
              <div id="tweet" class="twitter" data-plugin-tweets data-plugin-options='{"username": "oklerthemes", "count": 2}'>
                <p>İstediğiniz Alanı Yerleştirin</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="contact-details">
                <h4>İletişim</h4>
                <ul class="contact">
                  <li><p><i class="fa fa-map-marker"></i> <strong>Adres:</strong> {{ $allSetting->address }} <p></li>
                  <li><p><i class="fa fa-phone"></i> <strong>Telefon:</strong> {{ $allSetting->phone }}</p></li>
                  <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?=$allSetting->email?>">{{ $allSetting->email }}</a></p></li>
                </ul>
              </div>
            </div>
            <div class="col-md-2">
              <h4>Follow Us</h4>
              <ul class="social-icons">
                <li class="social-icons-facebook"><a href="<?=$allSetting->facebook?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="social-icons-twitter"><a href="<?=$allSetting->twitter?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="social-icons-instagram"><a href="<?=$allSetting->instagram?>" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                <li class="social-icons-google_plus"><a href="<?=$allSetting->google_plus?>" target="_blank" title="instagram"><i class="fa fa-google-plus"></i></a></li>
                <li class="social-icons-youtube"><a href="<?=$allSetting->youtube?>" target="_blank" title="instagram"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-1">
                <a href="index.html" class="logo">
                  <img alt="{{$allSetting->name}}" width="90" height="48" src="{{$allSetting->logo}}">
                </a>
              </div>
              <div class="col-md-7">
                <p style="line-height:48px;">{{$allSetting->name}} © Copyright 2016. Tüm Hakları Saklıdır.</p>
              </div>
              <!--<div class="col-md-4">
                <nav id="sub-menu">
                  <ul>
                    <li><a href="page-faq.html">FAQ's</a></li>
                    <li><a href="sitemap.html">Sitemap</a></li>
                    <li><a href="contact-us.html">Contact</a></li>
                  </ul>
                </nav>
              </div>-->
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!-- Vendor -->
    <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="/plugins/jquery.appear/jquery.appear.min.js"></script>
    <script src="/plugins/jquery.easing/jquery.easing.min.js"></script>
    <script src="/plugins/jquery-cookie/jquery-cookie.min.js"></script>
    <!--<script src="/plugins/master/style-switcher/style.switcher.js"></script>-->
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/plugins/common/common.min.js"></script>
    <script src="/plugins/jquery.validation/jquery.validation.min.js"></script>
    <script src="/plugins/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
    <script src="/plugins/jquery.gmap/jquery.gmap.min.js"></script>
    <script src="/plugins/jquery.lazyload/jquery.lazyload.min.js"></script>
    <script src="/plugins/isotope/jquery.isotope.min.js"></script>
    <script src="/plugins/owl.carousel/owl.carousel.min.js"></script>
    <script src="/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/plugins/vide/vide.min.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="/js/template0/theme.js"></script>
    
    <!-- Current Page Vendor and Views -->
    <script src="/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>    
    <script src="/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    
    <!-- Theme Custom -->
    <script src="/js/template0/custom.js"></script>
    <!-- Sweet Alert -->
    <script src="/plugins/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="/js/template0/theme.init.js"></script>
    <script src="/plugins/modernizr/modernizr.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDku0gpV-9R-e3cVlcy7FW9wbrcb6oNwwg"></script>
    <script src="/plugins/master/style-switcher/style.switcher.localstorage.js"></script>
    <script type="text/javascript">
      function addContact()
      {
          var name = document.getElementById('name').value;
          var email = document.getElementById('email').value;
          var subject = document.getElementById('subject').value;
          var phone = document.getElementById('phone').value;
          var message = document.getElementById('message').value;
          $.ajax({
              url: '/admin/contacts/add',
              type: 'POST',
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              cache: false,
              data: {name: name,email: email, subject: subject, phone: phone, message: message},
              success: function(data){
                  /*location.href = "/";*/
                  swal("Mesajınız Tarafımıza Başarıyla Ulaştı", "En Kısa Sürede Sizinle İletişime Geçeceğiz!", "success")
              },
              error: function(jqXHR, textStatus, err){}
          });
      }

    var map, marker;
    var markers = [];
    var inputLat = '#lat';
    var inputLng = '#lng';
      var beginLat = {{$allSetting->latitude}};
      var beginLng =  {{$allSetting->longitude}};
    var contMap = '#my_map';
    var geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(beginLat, beginLng);
      var myOptions =
          {
          zoom: 14,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
          };

      var map = new google.maps.Map(document.getElementById("my_map"), myOptions);
    placeMarker(latlng);


    function placeMarker(location)
      {
      // clear previous markers
      if(markers)
      {
        for(i in markers)
        {
        markers[i].setMap(null);
        }
      }
      // create a new marker
      var marker = new google.maps.Marker({
        position : location,
        map : map,
        draggable : true
      });

      // add created marker to a global array to be tracked and removed later
      markers.push(marker);

      map.setCenter(location);

      // extract lat and lng from LatLng location and put values in form
      $(inputLat).val(location.lat());
      $(inputLng).val(location.lng());

      /*
       * when marker is dragged, extract coordinates,
       * change form values and proceed with geocoding
       */
      google.maps.event.addListener(marker, 'dragend', function(){
        var coords = marker.getPosition();
        $(inputLat).val(coords.lat());
        $(inputLng).val(coords.lng());

        geocodeCoords(coords);
        map.setCenter(coords);

         if($(inputLat).val().trim() == '' ||
        $(inputLng).val().trim() == '')
        {
        alert('No coordinates or incomplete coordinates specified');
        }
        else
        {
        var lat = $(inputLat).val();
        var lng = $(inputLng).val();
        var location = new google.maps.LatLng(lat, lng);


        }
      });
           }
        function geocodeLocation(address)
        {
        geocoder.geocode({'address' : address}, function(result, status){
          // this returns a latlng
          var location = result[0].geometry.location;
          map.setCenter(location);

          // replace markers
          placeMarker(location);
        });
        }
</script>
  </body>
</html>
