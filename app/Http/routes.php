<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::auth();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index');

});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
 * Ön Sayfalar
 */
Route::get('/','HomeController@index');
Route::get('/iletisim','ContactController@index');
Route::get('/hakkimizda','AboutController@index');
Route::get('/hizmetlerimiz','ServicesController@index');
Route::get('/referanslarimiz','ReferenceController@index');
/*F
 * Admin Sayfaları
 */
Route::auth();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin', 'Admin\HomeController@index');

	/*Üyelik Modülü Başlangıcı*/
	Route::get('/admin/users','Admin\UserController@index');//listeleme sayfası
	Route::get('/admin/users/create','Admin\UserController@create');//yeni üye ekleme sayfası
	Route::get('/admin/users/edit/{id}','Admin\UserController@edit');//var olan üyenin bilgilerini gösteren sayfa
	Route::get('/admin/users/delete/{id}','Admin\UserController@delete');//var olan üyenin bilgilerini silen fonksiyon

	Route::post('/admin/users/save','Admin\UserController@save');//yeni üye kayıt eden fonksiyon
	Route::post('/admin/users/update','Admin\UserController@update');//var olan üyenin bilgilerini güncelleyen fonksiyon
	/*Üyelik Modülü Bitişi*/

    /*Galeri Modülü Başlangıç*/
    Route::post('/admin/gallery','Admin\GalleryController@index');//Galeri load
    Route::post('/admin/gallery/upload','Admin\GalleryController@upload');//Galeri upload
    Route::post('/admin/gallery/delete/{url}','Admin\GalleryController@delete');//Galeri delete
    /*Galeri Modülü Bitiş*/
    
    /*Dosya Yöneticisi Modülü*/
    Route::get('/admin/files','Admin\FilesController@index'); // Tüm Dosyalar
    Route::post('/admin/files/single-upload','Admin\FilesController@singleUpload');

    /*Blog Modülü Başlangıç*/
    Route::get('/admin/blog','Admin\BlogController@index');//blog listeleme    
    Route::get('/admin/blog/create','Admin\BlogController@create');//yeni blog oluşturma
    Route::get('/admin/blog/edit/{id}','Admin\BlogController@edit');//blog düzenleme
    Route::get('/admin/blog/delete/{id}','Admin\BlogController@delete');//var olan blog'un bilgilerini silen fonksiyon
    Route::get('/admin/blog/comment/edit/{id}','Admin\CommentController@edit');//blog yorum düzenleme
    Route::get('/admin/blog/comment/delete/{id}','Admin\CommentController@delete');//var olan blog'un yorum silen fonksiyon
    Route::get('/admin/blog/comment/{id}','Admin\CommentController@index');//blog yorum listeleme
    Route::get('/admin/blog/comment/create','Admin\CommentController@create');//yeni üye ekleme sayfası

    Route::post('/admin/blog/save','Admin\BlogController@save');//yeni üye kayıt eden fonksiyon
    Route::post('/admin/blog/update','Admin\BlogController@update');//var olan blog'un bilgilerini güncelleyen fonksiyon
    Route::post('/admin/blog/attachment','Admin\BlogController@attachment_index');//Eklenti load
    Route::post('/admin/blog/attachment/upload','Admin\BlogController@attachment_upload');//Eklenti upload
    Route::post('/admin/blog/attachment/delete/{url}','Admin\BlogController@attachment_delete');//Eklenti delete
    Route::post('/admin/blog/comment/update','Admin\CommentController@update');//var olan blog'un bilgilerini güncelleyen fonksiyon

    /*Blog Modülü Bitiş*/

    /*Hizmetler Modülü Başlangıç*/

    Route::get('/admin/services','Admin\ServiceController@index');
    Route::get('/admin/services/create','Admin\ServiceController@create');
    Route::get('/admin/services/edit/{id}','Admin\ServiceController@edit');
    Route::get('/admin/services/delete/{id}','Admin\ServiceController@delete');
    Route::post('/admin/services/save','Admin\ServiceController@save');
    Route::post('/admin/services/update','Admin\ServiceController@update');

    /*Hizmetler Modülü Bitiş*/

    /*Müşteri Yorumları Modülü Başlangıç*/

    Route::get('/admin/our-client','Admin\OurClientsController@index');

    Route::get('/admin/our-client/create','Admin\OurClientsController@create');
    Route::get('/admin/our-client/edit/{id}','Admin\OurClientsController@edit');
    Route::get('/admin/our-client/delete/{id}','Admin\OurClientsController@delete');
    Route::post('/admin/our-client/save','Admin\OurClientsController@save');
    Route::post('/admin/our-client/update','Admin\OurClientsController@update');

    /*Müşteri Yorumları Modülü Bitiş*/

    /*Referanslarımız Modülü Başlangıç*/

    Route::get('/admin/reference','Admin\ReferenceController@index');

    Route::get('/admin/reference/create','Admin\ReferenceController@create');
    Route::get('/admin/reference/edit/{id}','Admin\ReferenceController@edit');
    Route::get('/admin/reference/delete/{id}','Admin\ReferenceController@delete');
    Route::post('/admin/reference/save','Admin\ReferenceController@save');
    Route::post('/admin/reference/update','Admin\ReferenceController@update');

    /*Referanslarımız Modülü Bitiş*/

    /*İletişim Modülü Başlangıç*/

    Route::get('/admin/contacts','Admin\ContactController@index');
    Route::get('/admin/contacts/delete/{id}','Admin\ContactController@delete');
    Route::post('/admin/contacts/add','Admin\ContactController@save');
    Route::post('/admin/contacts/read','Admin\ContactController@read');

    /*İletişim Modülü Bitiş*/

    /*Slider Modülü Başlangıç*/

    Route::get('/admin/slider','Admin\SliderController@index');

    Route::get('/admin/slider/create','Admin\SliderController@create');
    Route::get('/admin/slider/edit/{id}','Admin\SliderController@edit');
    Route::get('/admin/slider/delete/{id}','Admin\SliderController@delete');
    Route::post('/admin/slider/save','Admin\SliderController@save');
    Route::post('/admin/slider/update','Admin\SliderController@update');

    /*İletişim Modülü Bitiş*/

	/*Reklam Modülü Başlangıcı*/
	// Google Analytics Kodu ekleme alanı
	Route::get('/admin/advertise/google-analytics','Admin\SettingsController@googleAnalytics');
	Route::post('/admin/advertise/advertise-analytics','Admin\SettingsController@googleAnalyticsSave');
	// Intro Reklam Sayfası oluşturma alanı
	Route::get('/admin/advertise/intro','Admin\AdvertiseController@introIndex');
	Route::get('/admin/advertise/intro/create','Admin\AdvertiseController@introCreate');
	Route::get('/admin/advertise/intro/edit/{id}','Admin\AdvertiseController@introEdit');
	Route::get('/admin/advertise/intro/delete/{id}','Admin\AdvertiseController@introDelete');
    
    Route::post('/admin/advertise/intro/save','Admin\AdvertiseController@introSave');
    Route::post('/admin/advertise/intro/update','Admin\AdvertiseController@introUpdate');
    //Popup Yönetimi oluşturma alanı
    Route::get('/admin/advertise/popup','Admin\AdvertiseController@popupIndex');
    Route::get('/admin/advertise/popup/create','Admin\AdvertiseController@popupCreate');
    Route::get('/admin/advertise/popup/edit/{id}','Admin\AdvertiseController@popupEdit');
    Route::get('/admin/advertise/popup/delete/{id}','Admin\AdvertiseController@popupDelete');

    Route::post('/admin/advertise/popup/save','Admin\AdvertiseController@popupSave');
    Route::post('/admin/advertise/popup/update','Admin\AdvertiseController@popupUpdate');
    //Sayfa İçi Reklamları oluşturma alanı
    Route::get('/admin/advertise/page-in','Admin\AdvertiseController@pageInIndex');
    Route::get('/admin/advertise/page-in/create','Admin\AdvertiseController@pageInCreate');
    Route::get('/admin/advertise/page-in/edit/{id}','Admin\AdvertiseController@pageInEdit');
    Route::get('/admin/advertise/page-in/delete/{id}','Admin\AdvertiseController@pageInDelete');

    Route::post('/admin/advertise/page-in/save','Admin\AdvertiseController@pageInSave');
    Route::post('/admin/advertise/page-in/update','Admin\AdvertiseController@pageInUpdate');
    /*Reklam Modülü Bitişi*/

    /*Kategori Modülü Başlangıç*/
    Route::get('/admin/categories','Admin\CategoriesController@index');//Sayfa Kategorilerini listeleme sayfası
    Route::get('/admin/categories/create','Admin\CategoriesController@create');//YeniKategori ekleme sayfası
    Route::get('/admin/categories/blog','Admin\CategoriesController@blog');//Blog Kategorilerini listeleme sayfası
    Route::get('/admin/categories/gallery','Admin\CategoriesController@gallery');//Blog Kategorilerini listeleme sayfası
    Route::get('/admin/categories/edit/{id}','Admin\CategoriesController@edit');// Kategorileri düzenleme sayfası
    Route::get('/admin/categories/delete/{id}','Admin\CategoriesController@delete');// Kategorileri silme sayfası
    Route::get('/admin/test','Admin\CategoriesController@test');// Kategorileri silme sayfası
    Route::post('/admin/categories/save','Admin\CategoriesController@save');//yeni kategori ekleyen fonksiyon
    Route::post('/admin/categories/update','Admin\CategoriesController@update');//yeni kategori ekleyen fonksiyon
    /*Kategori Modülü Bitiş*/

    /*Sayfalar Modülü Başlangıç*/
    Route::get('/admin/pages','Admin\PageController@index');// Aktif Sayfaları listeleme sayfası
    Route::get('/admin/pages/create','Admin\PageController@create');//Yeni Sayfa ekleme sayfası
    Route::get('/admin/pages/drafts','Admin\PageController@draft');// Statusu 2 olan taslak sayfaları listeleme sayfası
    Route::get('/admin/pages/deleted','Admin\PageController@deleted');// Statusu 0 olan silinen sayfaları listeleme sayfası
    Route::get('/admin/pages/edit/{id}','Admin\PageController@edit');// Sayfaları düzenleme sayfası
    Route::get('/admin/pages/delete/{id}','Admin\PageController@delete');// Sayfaları silme sayfası
    Route::get('/admin/pages/active/{id}','Admin\PageController@active');// Sayfaları silme sayfası

    Route::post('/admin/pages/save','Admin\PageController@save');//yeni sayfa ekleyen fonksiyon
    Route::post('/admin/pages/update','Admin\PageController@update');//yeni sayfa ekleyen fonksiyon
    /*Sayfalar Modülü Bitiş*/

	/*Ayarlar Modülü Başlangıcı*/
	Route::get('/admin/settings','Admin\SettingsController@index');
	Route::post('/admin/settings/save','Admin\SettingsController@save');
	/*Ayarlar Modülü Bitişi*/

    /*Ürünler Modülü Başlangıcı*/
    Route::get('/admin/product/','Admin\ProductController@index'); //Tüm Ürünler Sayfası
    Route::get('/admin/product/tum-urunler','Admin\ProductController@index'); //Tüm Ürünler Sayfası
    Route::get('/admin/product/urun-ekle','Admin\ProductController@create'); //Yeni Ürün Ekleme
    Route::get('/admin/product/edit-product/{id}','Admin\ProductController@edit');//var olan Ürünün bilgilerini gösteren sayfa
    Route::get('/admin/product/delete-product/{id}','Admin\ProductController@delete'); //var olan ürünü silen fonksiyon
    
    Route::post('/admin/product/update-product','Admin\ProductController@update');//var olan ürünün bilgilerini güncelleyen fonksiyon
    Route::post('/admin/product/product-save','Admin\ProductController@save');//yeni ürün ekleyen fonksiyon
    Route::post('/admin/product/draft','Admin\ProductController@draft');//yeni taslak ürün ekleyen fonksiyon
    Route::post('/admin/product/update/draft','Admin\ProductController@updateDraft');//var olan ürünün bilgilerini güncelleyen fonksiyon
    /*Ürünler Modülü Bitiş*/

    /*TEKNİK-TALEP MODÜLÜ*/

    /* ANA SAYFA (GELEN KUTUSU) */
    Route::get('/admin/supports','Admin\SupportsController@index');//Destek sayfası. Default olarak Gelen kutusunu yükler

    /* LİSTELEME SAYFALARI */
    Route::get('/admin/supports/inbox/','Admin\SupportsController@showInbox');               //Gelen mesajları gösterir
    Route::get('/admin/supports/sents/','Admin\SupportsController@showSent');               //Gönderilen mesajları gösterir
    Route::get('/admin/supports/drafts/','Admin\SupportsController@showDraft');             //Taslak'a kaydedilen mesajları gösterir
    Route::get('/admin/supports/junks/','Admin\SupportsController@showJunk');               //Önemsiz mesajları gösterir
    Route::get('/admin/supports/trashes/','Admin\SupportsController@showTrash');            //Silinen mesajları gösterir
    Route::get('/admin/supports/show-message/{id}','Admin\SupportsController@showMessage');//Gelen kutusunda tıklanan mesajın içeriğini gösterir
    Route::get('/admin/supports/show-sentMessage/{id}','Admin\SupportsController@showSentMessage');//Giden kutusunda tıklanan mesajın içeriğini gösterir
    Route::get('/admin/supports/replyMessage/{id}','Admin\SupportsController@showReply');//Gelen mesaja cevap yazma formu
    Route::get('/admin/supports/compose','Admin\SupportsController@showCompose');           //Yeni mesaj oluşturma formunu yükler
    Route::get('/admin/supports/conversation','Admin\SupportsController@showConversation'); //Konuşmayı görüntüler

    /* İŞLEM SAYFALARI */
    Route::post('/admin/supports/send-message','Admin\SupportsController@doCompose');//Mesaj Gönderme işlemini Yapar
    Route::post('/admin/supports/send-reply','Admin\SupportsController@doReply');//Cevap mesajını yollar
    Route::get('/admin/supports/searchedMail/{keyword}','Admin\SupportsController@doSearch');//Arama işlemini Yapar
    Route::get('/admin/supports/junkMessage/{val}','Admin\SupportsController@doJunk');//Mesajı Önemsiz yapar
    Route::get('/admin/supports/deleteMessage/{val}','Admin\SupportsController@doDelete');//Gelen kusutundan Mesajı Siler
    Route::get('/admin/supports/undoDeleteMessage/{val}','Admin\SupportsController@doUndoDelete');//Gelen ktsundan Mesajı Siler
    Route::get('/admin/supports/undoJunkMessage/{val}','Admin\SupportsController@doUndoJunk');//Mesajı Önemsiz yapar
    Route::get('/admin/supports/deleteSentMessage/{val}','Admin\SupportsController@doSentDelete');//Gnd. kututundan Mesajı Siler
    Route::get('/admin/supports/draftMessage/{val}','Admin\SupportsController@doDraft');//Gnd kutusundaki Mesajı taslak yapar
    Route::post('/front/sendMessage','Front\SupportsController@doSend');//Destek Mesajı Oluşturma işlemini yapar
    /* TEKNİK TALEP MODÜLÜ BİTİŞ */

    // Yetkilendirme Modülü
    Route::get('/admin/delegations','Admin\UserDelegationController@index');
    Route::get('admin/delegations/create','Admin\UserDelegationController@create_file');
    Route::get('admin/delegations/edit/{id}','Admin\UserDelegationController@update_file');
    Route::post('admin/delegations/ajaxDelegationAdd','Admin\UserDelegationController@ajax_createFile');
    Route::post('/admin/delegations/ajaxDelegationEdit','Admin\UserDelegationController@ajax_editFile');
    Route::get('/admin/delegations/delegationDelete','Admin\UserDelegationController@ajax_deleteFile');
    //Yetkilendirme Modülü Son

    //Kullanıcılar Modülü
    Route::get('/admin/customers','Admin\UserCustomersController@index');
    Route::get('/admin/customers/create','Admin\UserCustomersController@create_file');
    Route::get('/admin/customers/edit/{id}','Admin\UserCustomersController@update_file');

    Route::post('admin/customers/ajaxCustomersCreate','Admin\UserCustomersController@ajax_createFile');
    Route::post('/admin/customers/ajaxCustomersEdit','Admin\UserCustomersController@ajax_editFile');
    Route::get('/admin/customers/customerDelete','Admin\UserCustomersController@get_deleteFile');
    //Kullanıcılar Modülü Son

    // Modüller Modülü
    Route::get('/admin/modules','Admin\ModulesController@index');
    Route::get('admin/modules/create','Admin\ModulesController@create_file');
    Route::get('/admin/modules/edit/{id}','Admin\ModulesController@edit_file');

    Route::post('/admin/modules/ajaxModulesCreate','Admin\ModulesController@ajax_createFile');
    Route::post('/admin/modules/ajaxModulesEdit','Admin\ModulesController@ajax_editFile');
    Route::get('/admin/modules/delete','Admin\ModulesController@ajax_deleteFile');

    // Modüller Modülü Son

    //Hastalar Modülü Başlangıç
    Route::get('/admin/patient','Admin\PatientController@index'); //Tüm Hastalar Sayfası
    Route::get('/admin/patient/create','Admin\PatientController@create'); //Yeni Hasta Ekleme
    Route::get('/admin/patient/edit/{id}','Admin\PatientController@edit');//Hasta Düzenleme
    Route::get('/admin/patient/delete/{id}','Admin\PatientController@delete'); //Hasta Silme

    Route::post('/admin/patient/save','Admin\PatientController@save'); //Hastayı Kaydetme
    Route::post('/admin/patient/update','Admin\PatientController@update'); //Hastayı Güncelleme
    //Hastalar Modülü Bitiş

    //Sms Modülü Başlangıç
    Route::get('/admin/sms','Admin\SmsController@index'); //Tüm Hastalar Sayfası
    Route::get('/admin/sms/create','Admin\SmsController@create'); //Yeni Hasta Ekleme
    Route::get('/admin/sms/edit/{id}','Admin\SmsController@edit');//Hasta Düzenleme
    Route::get('/admin/sms/delete/{id}','Admin\SmsController@delete'); //Hasta Silme

    Route::post('/admin/sms/create','Admin\SmsController@createPost'); //Sms Atma Tablodan Seçerek
    Route::post('/admin/sms/elle','Admin\SmsController@createElle'); //Sms Atma Elle Numara Girerek
    Route::post('/admin/sms/save','Admin\SmsController@save'); //Hastayı Kaydetme
    //Sms Modülü Bitiş

    Route::post('/admin/users/resizeImagePost','Admin\UserController@resizeImagePost');

    //Bez Raporlar Başlangıc
    Route::get('/admin/bez/reports','Admin\BezController@index'); //Bez Kullananları Cekme
    Route::get('/admin/bez/reports/show/{id}','Admin\BezController@show'); //Kullanıcının Raporlarını Listeleme
    Route::get('/admin/bez/reports/show/receipt/{report_id}/{patient_id}','Admin\BezController@receiptShow'); //Rapor İçindeki Reçeteleri Listeleme
    Route::get('/admin/bez/reports/show/receipt/payment/{receipt_id}/{patient_id}','Admin\BezController@paymentShow'); //Reçete İçindeki Ödemeleri Listeleme
    Route::get('/admin/bez/reports/ExcelReport/{patient_id}','Admin\BezController@ExcelReport'); //Kullanıcının Raporlarını Listeleme

    Route::post('/admin/bez/reports/Reportsave','Admin\BezController@BezReportSave'); //Bez İçin Rapor Kaydetme
    Route::post('/admin/bez/reports/ReceiptSave','Admin\BezController@BezReceiptSave'); //Bez İçin Reçete Kaydetme
    Route::post('/admin/bez/reports/Paymentsave','Admin\BezController@Paymentsave'); //Reçete İçin Ödeme Kaydetme
    Route::post('/admin/bez/reports/reportGetir','Admin\BezController@reportGetir'); //Reçete İçin Raporları Getirme Ajax
    Route::post('/admin/bez/reports/PaymentGetir','Admin\BezController@PaymentGetir'); //Ödeme İçin Reçete Getirme Ajax

    //Bez  Raporlar Bitiş
});



