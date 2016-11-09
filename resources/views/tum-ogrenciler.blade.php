<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>EMC Bilişim</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.css">
    <link rel="stylesheet" href="/css/main.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/select2.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>EMC</b>EMC</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>EMC</b>Bilişim</span>
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
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="/mesajlar">Tüm Mesajlar</a></li>
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
                  <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ $user=Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
                      <a href="#" class="btn btn-default btn-flat">Profil</a>
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
              <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
            </li>
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

    <!-- jQuery 2.1.4 -->
    <script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
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
    <!-- AdminLTE App -->
    <script src="/js/app.js"></script>
    <script>
      /*$(window).load(function(){
        $('#modalIlkMesaj').modal('show');
      });*/
      $("#calendar").datepicker({
        language: 'tr'
      });
      $("[data-mask]").inputmask();
        function addStudent()
         {
            var inputOgrenciNo = document.getElementById('inputOgrenciNo').value;
            var inputTcNo = document.getElementById('inputTcNo').value;
            var inputEngelTipi = document.getElementById('inputEngelTipi').value;
            var inputAdi = document.getElementById('inputAdi').value;
            var inputSoyadi = document.getElementById('inputSoyadi').value;
            var inputCinsiyeti = document.getElementById('inputCinsiyeti').value;
            var inputDogumTarihi = document.getElementById('inputDogumTarihi').value;
            var inputDogumYeri = document.getElementById('inputDogumYeri').value;
            var inputOkulunAdi = document.getElementById('inputOkulunAdi').value;
            var inputBabaAdi = document.getElementById('inputBabaAdi').value;
            var inputBabaTel = document.getElementById('inputBabaTel').value;
            var inputKayitTarihi = document.getElementById('inputKayitTarihi').value;
            var inputAnneAdi = document.getElementById('inputAnneAdi').value;
            var inputAnneTel = document.getElementById('inputAnneTel').value;
            var inputAyrilisTarihi = document.getElementById('inputAyrilisTarihi').value;
            var inputEgitimSekli = document.getElementById('inputEgitimSekli').value;
            var inputDigerTel = document.getElementById('inputDigerTel').value;
            var inputIl = document.getElementById('inputIl').value;
            var inputIlce = document.getElementById('inputIlce').value;
            var inputAdres = document.getElementById('inputAdres').value;
            $.ajax({
              url: '/addOgrenci',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: {inputOgrenciNo: inputOgrenciNo, inputTcNo:  inputTcNo, inputEngelTipi:  inputEngelTipi, inputAdi:  inputAdi, inputSoyadi:  inputSoyadi, inputCinsiyeti:  inputCinsiyeti, inputDogumTarihi:  inputDogumTarihi, inputDogumYeri:  inputDogumYeri, inputOkulunAdi:  inputOkulunAdi, inputBabaAdi:  inputBabaAdi, inputBabaTel:  inputBabaTel, inputKayitTarihi:  inputKayitTarihi, inputAnneAdi:  inputAnneAdi, inputAnneTel:  inputAnneTel, inputAyrilisTarihi:  inputAyrilisTarihi, inputEgitimSekli:  inputEgitimSekli, inputDigerTel:  inputDigerTel, inputIl:  inputIl, inputIlce:  inputIlce, inputAdres:  inputAdres },
              success: function(data){
              location.href = "/";
              alert("Öğrenci Başarıyla Eklendi");
              },
              error: function(jqXHR, textStatus, err){}
            });
         }
      function saveStudentImage()
      {
        var inputPresim = document.getElementById('profilResim').value;
        var inputPresimOgrenciId = document.getElementById('presim_ogrenci_id').value;
        $.ajax({
          url: '/saveOgrenciResim',
          type: 'POST',
          beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
          },
          cache: false,
          data: {ogrenci_id: inputPresimOgrenciId, resim: inputPresim },
          success: function(data){
            /*location.href = "/";
            location.reload();
            alert("Öğrenci Resim Başarıyla Eklendi");*/
          },
          error: function(jqXHR, textStatus, err){}
        });
      }
        function saveStudent()
         {
            var inputOgrenciId = document.getElementById('inputOgrenciId').value;
            var inputOgrenciNo = document.getElementById('inputOgrenciNo').value;
            var inputTcNo = document.getElementById('inputTcNo').value;
            var inputEngelTipi = document.getElementById('inputEngelTipi').value;
            var inputAdi = document.getElementById('inputAdi').value;
            var inputSoyadi = document.getElementById('inputSoyadi').value;
            var inputCinsiyeti = document.getElementById('inputCinsiyeti').value;
            var inputDogumTarihi = document.getElementById('inputDogumTarihi').value;
            var inputDogumYeri = document.getElementById('inputDogumYeri').value;
            var inputOkulunAdi = document.getElementById('inputOkulunAdi').value;
            var inputBabaAdi = document.getElementById('inputBabaAdi').value;
            var inputBabaTel = document.getElementById('inputBabaTel').value;
            var inputKayitTarihi = document.getElementById('inputKayitTarihi').value;
            var inputAnneAdi = document.getElementById('inputAnneAdi').value;
            var inputAnneTel = document.getElementById('inputAnneTel').value;
            var inputAyrilisTarihi = document.getElementById('inputAyrilisTarihi').value;
            var inputEgitimSekli = document.getElementById('inputEgitimSekli').value;
            var inputDigerTel = document.getElementById('inputDigerTel').value;
            var inputIl = document.getElementById('inputIl').value;
            var inputIlce = document.getElementById('inputIlce').value;
            var inputAdres = document.getElementById('inputAdres').value;
            $.ajax({
              url: '/saveOgrenci',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: {id: inputOgrenciId, ogrenci_no: inputOgrenciNo, tcno:  inputTcNo, engel_tipi:  inputEngelTipi, ad:  inputAdi, soyad:  inputSoyadi, cinsiyet:  inputCinsiyeti, dogum_tarihi:  inputDogumTarihi, dogum_yeri:  inputDogumYeri, okul:  inputOkulunAdi, baba:  inputBabaAdi, baba_tel:  inputBabaTel, kayit_tarihi:  inputKayitTarihi, anne:  inputAnneAdi, anne_tel:  inputAnneTel, ayrilis_tarihi:  inputAyrilisTarihi, egitim:  inputEgitimSekli, diger_tel:  inputDigerTel, il:  inputIl, ilce:  inputIlce, adres:  inputAdres },
              success: function(data){
              /*location.href = "/";*/
                location.reload();
              alert("Öğrenci Başarıyla Eklendi");
              },
              error: function(jqXHR, textStatus, err){}
            });
         }
        function addPersonel()
         {
            var inputYetkiSeviyesi = document.getElementById('inputYetkiSeviyesi').value;
            var inputTcNo = document.getElementById('inputTcNo').value;
            var inputAdi = document.getElementById('inputAdi').value;
            var inputSoyadi = document.getElementById('inputSoyadi').value;
            var inputCinsiyeti = document.getElementById('inputCinsiyeti').value;
            var inputDogumTarihi = document.getElementById('inputDogumTarihi').value;
            var inputDogumYeri = document.getElementById('inputDogumYeri').value;
            var inputBabaAdi = document.getElementById('inputBabaAdi').value;
            var inputKayitTarihi = document.getElementById('inputKayitTarihi').value;
            var inputAnneAdi = document.getElementById('inputAnneAdi').value;
            var inputAyrilisTarihi = document.getElementById('inputAyrilisTarihi').value;
            var inputTelefon = document.getElementById('inputTelefon').value;
            var inputIsTelefon = document.getElementById('inputIsTelefon').value;
            var inputDigerTelefon = document.getElementById('inputDigerTelefon').value;
            var inputIl = document.getElementById('inputIl').value;
            var inputIlce = document.getElementById('inputIlce').value;
            var inputAdres = document.getElementById('inputAdres').value;
            var inputEmail = document.getElementById('inputEmail').value;
            var inputPass = document.getElementById('inputPass').value;
            $.ajax({
              url: '/addPersonel',
              type: 'POST',
              beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');

                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
              cache: false,
              data: {password: inputPass,email: inputEmail,yetki: inputYetkiSeviyesi, tcno:  inputTcNo, ad:  inputAdi, soyad:  inputSoyadi, cinsiyet:  inputCinsiyeti, dogum_tarihi:  inputDogumTarihi, dogum_yeri:  inputDogumYeri, baba:  inputBabaAdi, kayit_tarihi:  inputKayitTarihi, anne:  inputAnneAdi, ayrilis_tarihi:  inputAyrilisTarihi, telefon:  inputTelefon, is_telefon:  inputIsTelefon, diger_telefon:  inputDigerTelefon, il:  inputIl, ilce:  inputIlce, adres:  inputAdres },
              success: function(data){
              location.href = "/";
              alert("Personel Başarıyla Eklendi");
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
      });
      $(".select2").select2();
      function silOnayla()
      {
        return confirm("Silmek istediğinizden emin misiniz?");
      }
    </script>

  </body>
</html>
