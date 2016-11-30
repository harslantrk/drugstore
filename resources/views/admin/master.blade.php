<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>Çözüm Lazım</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{URL::to('/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{URL::to('/css/main.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{URL::to('/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{URL::to('/plugins/iCheck/flat/blue.css')}}">
     <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{URL::to('/plugins/iCheck/all.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{URL::to('/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{URL::to('/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{URL::to('/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{URL::to('/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{URL::to('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{URL::to('/plugins/select2/select2.min.css')}}">
      <link href="{{URL::to('/css/file/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
      <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <script src="/plugins/file/fileinput.js" type="text/javascript"></script>
      <!-- DataTables Bootstrap-->
      <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
      <!-- Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="/plugins/sweetalert/dist/sweetalert.css">
      <!-- blog  CK Editor -->
      <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
      <script src="/js/custom.js"></script>
      <!-- SlimScroll -->
      <script type="text/javascript">
          /*
           Start GalleryImport
           Description         : Çoklu dosya yönetimi js kodları
           Create Author       : Volkan Arslan
           Last Update Author  : Volkan Arslan
           Create Date         : 14.10.2016 - Cuma 11:25
           Last Update Date    : 14.10.2016 - Cuma 13:55
           Version             : 1.0
           Parameters          : 1-> üst dizin, 2-> alt dizin.

           */
          function galleryImport(galleryType, galleryId)
          {
              var galleryUrl='/admin/gallery';
              if(galleryId==null){
                  galleryId = galleryType + new Date().getTime();
              }
              $.ajax({
                  url: galleryUrl,
                  type: 'POST',
                  beforeSend: function (xhr) {
                      var token = $('meta[name="csrf_token"]').attr('content');

                      if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                      }
                  },
                  cache: false,
                  data: {galleryType: galleryType, galleryId: galleryId },
                  success: function(data){
                      $('.kv-main').html(data);
                      $('.gallery_id').val(galleryId);
                      $('#gallery_id').val(galleryId);
                  },
                  error: function(jqXHR, textStatus, err){
                      alert(err);
                  }
              });
          }
          /*
           End GalleryImport

           --------------------------------------------------------

           Start SingleFileUpload
           Description         : Tekli dosya yönetimi js kodları
           Create Author       : Volkan Arslan
           Last Update Author  : Volkan Arslan
           Create Date         : 14.10.2016 - Cuma 11:25
           Last Update Date    : 14.10.2016 - Cuma 11:25
           Version             : 1.0
           */

          $(document).ready(function (e) {
              $( "#image_preview" ).click(function() {
                  $("#selectSingleFile #file").trigger("click");
              });
              $("#uploadSingleFile").on('submit',(function(e) {
                  e.preventDefault();
                  $("#singleFileReturn").val("0");
                  $('.loadingSingleFile').show();
                  $.ajax({
                      url: "/admin/files/single-upload",
                      type: "POST",
                      data: new FormData(this),
                      contentType: false,
                      cache: false,
                      processData:false,
                      beforeSend: function (xhr) {
                          var token = $('meta[name="csrf_token"]').attr('content');

                          if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                          }
                      },
                      success: function(data)
                      {
                          $('.loadingSingleFile').hide();
                          $("#singleFileReturn").val(data);
                          $('#deleteReturn').val(data);
                          $('.singleFileBtn').hide();
                      },
                      error: function(jqXHR, textStatus, err){
                          $('.loadingSingleFile').hide();
                          $("#singleFileReturn").val("0");
                          alert(textStatus+"<br>"+err);
                          console.debug(jqXHR);
                      }
                  });
              }));

              $(function() {
                  $("#file").change(function() {
                      $("#singleFileReturn").val("0");
                      var file = this.files[0];
                      var reader = new FileReader();
                      reader.onload = imageIsLoaded;
                      reader.readAsDataURL(this.files[0]);
                  });
              });

              function imageIsLoaded(e) {
                  $("#file").css("color","green");
                  $('#image_preview').css("display", "block");
                  $('#previewing').attr('src', e.target.result);
                  $('.singleFileBtn').show();
              };

          });
          /*
           End singleFileImport

           --------------------------------------------------------

           Start kcFinderImageUpload
           Description         : Tekli dosya yönetimi js kodları
           Create Author       : Volkan Arslan
           Last Update Author  : Volkan Arslan
           Create Date         : 14.10.2016 - Cuma 14:03
           Last Update Date    : 14.10.2016 - Cuma 14:03
           Version             : 1.0
           Parameters          : 1-> parent div, 2-> gösterilecek dizin, boş ise null atanır.
           */
          function openKCFinder(div,dir) {
              window.KCFinder = {
                  callBack: function(url) {
                      window.KCFinder = null;
                      div.innerHTML = '<div style="margin:5px">Yükleniyor...</div>';
                      var img = new Image();
                      img.src = url;
                      img.onload = function() {
                          div.innerHTML = '<img id="imgsrc" src="' + url + '" />';
                          $(div).append('<input type="hidden" id="img" value="' + url + '" />');
                          var img = document.getElementById('imgsrc');
                          var o_w = img.offsetWidth;
                          var o_h = img.offsetHeight;
                          var f_w = div.offsetWidth;
                          var f_h = div.offsetHeight;
                          if ((o_w > f_w) || (o_h > f_h)) {
                              if ((f_w / f_h) > (o_w / o_h))
                                  f_w = parseInt((o_w * f_h) / o_h);
                              else if ((f_w / f_h) < (o_w / o_h))
                                  f_h = parseInt((o_h * f_w) / o_w);
                              img.style.width = f_w + "px";
                              img.style.height = f_h + "px";
                          } else {
                              f_w = o_w;
                              f_h = o_h;
                          }
                          img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                          img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                          img.style.visibility = "visible";
                      }
                  }
              };
              window.open('/finder/browse.php?dir='+dir,
                      'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                      'directories=0, resizable=1, scrollbars=0, width=800, height=600'
              );
          }
          /* End kcFinderImageUpload  */
      </script>
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Çözüm Lazım</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Çözüm Lazım</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo count($allContact); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"><?php echo count($allContact); ?> Yeni Mesajınız Var</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php foreach ($allContact as $key => $contacts): ?>
                        <li><!-- start message -->
                        <a href="/admin/contacts">
                          <div class="pull-left">
                            <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            {{$contacts->name}}
                            <small><i class="fa fa-clock-o"></i>
                            <?php 
                            $date1 = new DateTime($contacts->created_at);
                             $date2 = \Carbon\Carbon::now();
                             $diff=date_diff($date2,$date1);
                             if($diff->d>1)
                             {
                                 $result=$diff->d." Gün";
                             }
                             elseif($diff->h==0){
                                 $result=$diff->i." Dakika";
                             }
                             else{
                                 $result=$diff->h." Saat";
                             }
                             echo $result;
                              ?> Önce
                            </small>
                          </h4>
                          <p>{{$contacts->subject}}</p>
                        </a>
                      </li><!-- end message -->
                      <?php endforeach ?>
                      
                    </ul>
                  </li>
                  <li class="footer"><a href="/admin/contacts">Tüm Mesajlar</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(Auth::user()->picture != '')
                    <img src="{{Auth::user()->picture}}" class="user-image" alt="User Image">
                  @else
                    <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  @endif
                  <span class="hidden-xs">{{ $user=Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    @if(Auth::user()->picture != '')
                      <img src="{{Auth::user()->picture}}" class="img-circle" alt="User Image">
                    @else
                      <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    @endif
                    <p>
                      {{$user=Auth::user()->name}} - Admin
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/admin/users/edit/{{Auth::user()->id}}" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="/logout" class="btn btn-default btn-flat">Çıkış</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              @if(Auth::user()->picture != '')
                <img src="{{Auth::user()->picture}}" class="img-circle" alt="User Image">
                @else
                <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Ara">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÜ</li>
            @foreach($modules as $key=>$value)
            <?php
            $sess=Session::get($value->name);

            if($sess['r']==1){
              if($value->parent==1){
                echo ' <li class="treeview">
              <a href="#">
                <i class="fa '.$value->icon.'"></i>
                <span>'.$value->name.'</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              ';
              foreach ($par_modules as $ky => $val) {
                $ses=Session::get($val->name);

                if($ses['r']==1 && $val->parent_id==$value->id){
                  echo '<li><a href="'.$val->url.'"><i class="fa '.$val->icon.'"></i> '.$val->name.'</a></li>';
                }
              }
                 echo '               
              </ul>
            </li>';
              }else{
              echo '<li class="treeview">
                <a href="'.$value->url.'">
                  <i class="fa '.$value->icon.'"></i> <span>'.$value->name.'</span> </a>
                    
            </li>';}

            }
            ?>

            @endforeach
<?php /* ?>
            <li class="active treeview">
              <a href="/admin">
                <i class="fa fa-dashboard"></i> <span>Anasayfa</span>
              </a>
            </li>
            <li class="treeview">
                <a href="/admin/users">
                  <i class="fa fa-circle-o"></i> <span>Üyeler</span>
                </a>
            </li>
             <li class="treeview">
                <a href="/admin/delegations">
                  <i class="fa fa-circle-o"></i> <span>Yetkilendirme İşlemleri</span>
                </a>
            </li><li class="treeview">
                <a href="/admin/customers">
                  <i class="fa fa-circle-o"></i> <span>Kullanıcılar</span>
                </a>
            </li>
            <li class="treeview">
              <a href="/admin/modules"><i class="fa fa-company"></i> Modüller</a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Öğrenci</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/tum-ogrenciler"><i class="fa fa-circle-o"></i> Tüm Öğrenciler</a></li>
                <li><a href="/ogrenci-ekle"><i class="fa fa-circle-o"></i> Öğrenci Ekle</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Personel</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/tum-personeller"><i class="fa fa-users"></i> Tüm Personeller</a></li>
                <li><a href="/personel-ekle"><i class="fa fa-user-plus"></i> Personel Ekle</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-info"></i>
                <span>Tanımlamalar</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/ogrenci-islemleri"><i class="fa fa-info"></i> Öğrenci İşlemleri</a></li>
                <li><a href="/engel-tipleri"><i class="fa fa-user-plus"></i> Engel Tipleri</a></li>
              </ul>
            </li><?php */ ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      @yield('content')
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://cozumlazim.com">ÇözümLazım.com</a>.</strong> Tüm Hakları Saklıdır.
      </footer>


      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- Modal Alanı -->

    <div class="modal modal-success fade" id="modalIlkMesaj" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <form role="form">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Bilgilendirme</h4>
          </div>
          <div class="modal-body">
              <div class="box-body">
                1-	Öğrenci işlemleri (ekleme, arama, silme, listeleme, misafir öğrenci) --- Tamamlandı<br>
                2-	Personel İşlemleri (ekleme, arama, silme, listeleme)---- Tamamlandı<br>
                3-	Personeller arası mesajlaşma ---- Tamamlandı Fakat whatsapp şeklinde tekrar yapılıyor. Testleri bittikten sonra yayınlanacak<br>
                4-	SMS Modülü (Kontür satın alınması gerekecek. Kontür fiyatları ayrıca bildirelecektir.) --- Ekranları hazır fakat sms firmasının api göndermesi bekleniyor<br>
                5-	Personel Yetkilendirme Sistemi (yetkileri ayrıca gruplandırma)--- Ekranı hazır  fakat yayınlanması için diğer sayfaların bitmesi gerekiyor.<br>
                6-	Danışman Bilgi Modülü--- Testleri yapılıyor<br>
                7-	Öğrenci İşlem Modülü --- Testleri yapılıyor<br>
                8-	Muhasebe Modülü--- İşlem modülleri bittikten sonra danışman firmayla görüşülüp isteklerine bağlı olarak düzenlenecek.<br>
                9-	Öğrenci Planlama Modülü--- Tasarımı yapılıyor.<br>

              </div><!-- /.box-body -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
          </div>
        </div><!-- /.modal-content -->
        </form>
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- /Modal Alanı -->

    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/select2.full.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <!-- CKEditor -->
    <script src="/plugins/ckeditor/ckeditor.js"></script>    
    <!-- DataTables -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
    <script src="/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- Slimscroll -->
    <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/plugins/fastclick/fastclick.min.js"></script>

    <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDku0gpV-9R-e3cVlcy7FW9wbrcb6oNwwg"></script>
    <!-- Sweet Alert -->
    <script src="/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Delegation radio button'lar İçin gerekli' -->
    <script src="/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="/plugins/iCheck/icheck.min.js"></script>
    <!--AJAX-->
    <script src="/js/ajax.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/app.js"></script>
    <script>
      if(window.location.pathname.split('/')[2] == 'sms'){
        var kalan_karakter_1 = 160 - document.getElementById('sms_mesaj_secerek').value.length;
        document.getElementById('kalan_karakter').innerHTML = kalan_karakter_1;
        var kalan_karakter_2 = 160 - document.getElementById('sms_mesaj_elle').value.length;
        document.getElementById('kalan_karakter_2').innerHTML = kalan_karakter_2;
      }
      function sms_gonder_elle() {
        var kalan_karakter = 160 - document.getElementById('sms_mesaj_secerek').value.length;
        document.getElementById('kalan_karakter').innerHTML = kalan_karakter;
        if(kalan_karakter > 0){
          document.getElementById('kalan_karakter').innerHTML = kalan_karakter;
        }else{
          document.getElementById('sms_mesaj_secerek').value = document.getElementById('sms_mesaj_secerek').value.substring(0,160);
          console.log('substr')
          document.getElementById('kalan_karakter').innerHTML = kalan_karakter;
        }
      }
      function sms_gonder_elle_2() {
        var kalan_karakter = 160 - document.getElementById('sms_mesaj_elle').value.length;
        document.getElementById('kalan_karakter_2').innerHTML = kalan_karakter;
        if(kalan_karakter > 0){
          document.getElementById('kalan_karakter_2').innerHTML = kalan_karakter;
        }else{
          document.getElementById('sms_mesaj_elle').value = document.getElementById('sms_mesaj_elle').value.substring(0,160);
          console.log('substr')
          document.getElementById('kalan_karakter_2').innerHTML = kalan_karakter;
        }
      }

      $("#calendar").datepicker({
        language: 'tr'
      });
      $('#flash-overlay-modal').modal();

      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

      $('.phone_mask').inputmask('0(999)999-9999');

      $("#users_table, #intro_table, #popup_table, #pagein_table,#hastalar_table").DataTable({
          "language": {
              "emptyTable": "Hiç bir veri bulunamadı",
              "info": "Gösterim _START_ ile _END_ arası _TOTAL_ toplam veri",
              "infoEmpty": "Gösterim 0 ile 0 arası 0 toplam veri",
              "infoFiltered": "(filtrelenen _MAX_ toplam veri)",
              "lengthMenu": "Gösterim _MENU_ veri",
              "loadingRecords": "Yükleniyor...",
              "processing": "İşleniyor...",
              "search": "Arama:",
              "zeroRecords": "Eşleşen kayıt bulunamadı.",
              "paginate": {
                  "first": "İlk",
                  "last": "Son",
                  "next": "İleri",
                  "previous": "Geri"
              },
              "aria": {
                  "sortAscending":  ": aktif sıralama azdan çok",
                  "sortDescending": ": aktif sıralama çoktan az"
              }
          }
      });

      function deleteApprove(link) {
          swal({
                      title: "Silmek istediğinize emin misiniz?",
                      text: "Eğer silerseniz, sildiğiniz veriye bir daha ulaşamayacağınızı onaylamış olursunuz!",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Evet, veriyi sil!",
                      cancelButtonText: "Hayır, veriyi silme!",
                      closeOnConfirm: false,
                      closeOnCancel: false
                  },
                  function(isConfirm){
                      if (isConfirm) {
                          swal("Silindi!", "Veriniz başarılı bir şekilde silindi.", "success");
                          location.href = link;
                      } else {
                          swal("İptal Edildi", "Verinize herhangi bir işlem yapılmadı.", "error");
                      }
                  });
      }


      $("[data-mask]").inputmask();
      function addCategories()
      {
          var inputKategoriAdi = document.getElementById('inputKategoriAdi').value;
          var inputKategoriTuru = document.getElementById('inputKategoriTuru').value;
          var inputKategoriAciklama = document.getElementById('inputKategoriAciklama').value;
          var inputUstKategori = document.getElementById('inputUstKategori').value;
          var inputKategoriOnceligi = document.getElementById('inputKategoriOnceligi').value;

          $.ajax({
              url: '/admin/categories/save',
              type: 'POST',
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              cache: false,
              data: {title: inputKategoriAdi, type:  inputKategoriTuru, description:  inputKategoriAciklama, parent:  inputUstKategori, priority:  inputKategoriOnceligi, status: 1 },
              success: function(data){
                  location.reload();
              },
              error: function(jqXHR, textStatus, err){}
          });
      }
      function readingChange(id)
      {
          
          $.ajax({
              url: '/admin/contacts/read',
              type: 'POST',
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              cache: false,
              data: {id: id, status: 1 },
              success: function(data){
                  
              },
              error: function(jqXHR, textStatus, err){}
          });
      }
      function addBlogContentLive()
      {
          var blog_name = document.getElementById('blog_name').value;
          var blog_description = document.getElementById('blog_description').value;
          var blog_content = document.getElementById('blog_content').value;
          $.ajax({
              url: '/admin/blog/save',
              type: 'POST',
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              cache: false,
              data: {name: blog_name, description:  blog_description, content:  blog_content, author: {{ $user=Auth::user()->id }}, status:  1 },
              success: function(data){
                  /*location.href = "/";*/
                  alert("Blog eklendi başarılı...");
                  location.href = "/admin/blog"
              },
              error: function(jqXHR, textStatus, err){}
          });
      }
      function addBlogContentDraft()
      {
          var blog_name = document.getElementById('blog_name').value;
          var blog_description = document.getElementById('blog_description').value;
          var blog_content = document.getElementById('blog_content').value;
          $.ajax({
              url: '/admin/blog/save',
              type: 'POST',
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              cache: false,
              data: {name: blog_name, description:  blog_description, content:  blog_content, author: {{ $user=Auth::user()->id }}, status:  2 },
              success: function(data){
                  /*location.href = "/";*/
                  alert("Blog taslağa eklendi...");
                  location.href = "/admin/blog"
              },
              error: function(jqXHR, textStatus, err){}
          });
      }
      function addPages()
      {
          var inputSayfaAdi = document.getElementById('inputSayfaAdi').value;
          var inputSayfaOnceligi = document.getElementById('inputSayfaOnceligi').value;
          var inputUstSayfa = document.getElementById('inputUstSayfa').value;
          var inputSayfaAciklama = document.getElementById('inputSayfaAciklama').value;
          var inputKategori = document.getElementById('inputKategori').value;
          var inputSayfaKeyword = document.getElementById('inputSayfaKeyword').value;
          var inputIcerik = document.getElementById('inputIcerik').value;
          $.ajax({
              url: '/admin/pages/save',
              type: 'POST',
              beforeSend: function (xhr) {
                  var token = $('meta[name="csrf_token"]').attr('content');

                  if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                  }
              },
              cache: false,
              data: {title: inputSayfaAdi,priority: inputSayfaOnceligi, parent: inputUstSayfa, description: inputSayfaAciklama, cat_id: inputKategori, keyword: inputSayfaKeyword, content: inputIcerik },
              success: function(data){
                  /*location.href = "/";*/
                  location.reload();
                  alert("Sayfa Başarıyla Eklendi");
              },
              error: function(jqXHR, textStatus, err){}
          });
      }
      
        $(function () {
          $('#ogrenci-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
          });
        });
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
          $(".product-text").wysihtml5();
      });
      $(".select2").select2();
      function silOnayla()
      {
        return confirm("Silmek istediğinizden emin misiniz?");
      }
    /*Data Table Scripts*/
     $(function () {
        $("#delegationtable").DataTable();

        $('.phone_mask').inputmask('0(999)999-9999');

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
             checkboxClass: 'icheckbox_minimal-blue',
              radioClass: 'iradio_minimal-blue'
        });
        });
      <!--/Data Table Scripts-->
    </script>

  </body>
</html>
