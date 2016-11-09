<?php
/*
Description         : Tüm dosyaların galeri sistemini yöneten controller
Create Author       : Volkan Arslan
Last Update Author  : Volkan Arslan
Create Date         : 14.10.2016 - Cuma 11:25
Last Update Date    : 14.10.2016 - Cuma 11:25
Version             : 1.0 
*/
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use File;
use Crypt;
class GalleryController extends Controller
{
    public function index(Request $request)
    {
        function mime_typeBul($filetomime){
            //Dosyanın tipini bulmaya yarayan fonksiyon
            /* Dosya formatları */
             $r_format = array ("image/jpeg","image/pjpeg","image/jpg","image/png","image/gif","image/bmp"); 
             $word_format = array ( "application/vnd.openxmlformats-officedocument.wordprocessingml.template",
             "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword"
             );
             $excel_format = array ("application/excel","application/vnd.ms-excel",
                 "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.openxmlformats-officedocument.spreadsheetml.template"    
             );
             $powerpoint_format = array (
                 "application/mspowerpoint","application/vnd.ms-powerpoint","application/vnd.openxmlformats-officedocument.presentationml.template",
                 "application/vnd.openxmlformats-officedocument.presentationml.slideshow", "application/vnd.openxmlformats-officedocument.presentationml.presentation"
             );
             $pdf_format = array ("application/pdf");
             $txt_format = array ("text/plain");
             $access_format = array ("application/x-msaccess","application/msaccess");
             $y_format = array ("application/x-msdownload", "application/exe", "application/x-exe", "application/dos-exe", "vms/exe", "application/x-winexe", "application/msdos-windows", "application/x-msdos-program");
             $v_format = array ("video/avi","video/mp4","video/mpeg","video/x-flv","video/mpeg","video/x-mpeg");
             $m_format = array ("audio/mp4","audio/mpeg","audio/vnd.wave","audio/mpeg3","audio/x-mpeg-3","audio/mp3");
             $a_format = array ("application/zip",'application/rar','rar',"application/x-zip-compressed", "multipart/x-zip","application/x-compressed","application/octet-stream","application/x-rar-compressed","compressed/rar","application/x-rar");
             /* dosya formatları */
             /* dosyanın mime type'ni bul  */
             $arg=null;
             $tip= finfo_file(finfo_open(FILEINFO_MIME_TYPE), $filetomime); // mime type al
             if (in_array ($tip, $r_format)) { $arg ='height: "100px",';}
             else if (in_array ($tip, $m_format)) {$arg ='type: "audio", filetype: "'.$tip.'",';}
             else if (in_array ($tip, $v_format)) {$arg ='type: "video", filetype: "'.$tip.'",';}
             else if (in_array ($tip, $pdf_format)) {$arg ='type: "pdf",';}
             else if (in_array ($tip, $txt_format)) {$arg ='type: "text",';}
             /* dosyanın mime type'ni bul  */
             return $arg;
        }
        
        $data['type']=$request->input('galleryType'); // post ile gelen üst dizin
        $data['id']=$request->input('galleryId'); // post ile gelen alt dizin
        $konumlar[0] = str_replace("\\", "/", public_path()); // public dizinini ters slushları düzelterek al
        $konumlar[1] = "/finder/upload/files/gallery"; //sabit dizin
        $konumlar[2] = $data['type']; // gelen üst dizin
        $konumlar[3] = $data['id']; // gelen alt dizin
        $dizin= $konumlar[0]."/".$konumlar[1]."/".$konumlar[2]."/".$konumlar[3]; // gelen bilgilere göre dizin oluştur
        $data['dosyalar']=null;
        $data['bilgiler']=null;
        
        if(file_exists($dizin)){ // dizin varsa
            $dosya = File::allFiles($dizin); // dizini tara ve dosya dizisine yaz
            foreach ($dosya as $file)
            { // dosya adresilerini diziye yaz
                if(mime_typeBul($file)!=null){
                    // belirlenen dosya tipinde ise dosyanın bilgilerini yaz
                    $ad =  basename($file);
                    $konum=$konumlar[1]."/".$konumlar[2]."/".$konumlar[3]."/".$ad;
                }else{
                     // belirlenen dosya tipinde değilse ise varsayılan resim yaz
                    $konum="/img/no-image.png";
                }
                $data['dosyalar'].="'".$konum."',"; 
            }
            $data['dosyalar']= rtrim($data['dosyalar'],","); //dizinin sağından virgülü temizle
            
            $syc=0;
            foreach ($dosya as $file)
            { // dosya bilgilerini diziye yaz
                $arg=mime_typeBul($file);
                $syc++;
                if($arg==null){ // belirlenen dosya tipinde değilse
                    $arg ='height: "100px",'; 
                }
                $ad1=  basename($file); // dosyanın uzantılı ismi
                $boyut=  filesize($file); // dosya boyutu, byte cinsinden
                $konum1=$konumlar[1]."/".$konumlar[2]."/".$konumlar[3]."/".$ad1; // konumu oluştur
                $url="/admin/gallery-delete/".Crypt::encrypt($konum1); //url içinde url gönderileceği için gönderilecek url'yi şifrele
                $data['bilgiler'].='{url: "'.$url.'", caption: "'.$ad1.'", '.$arg.' size: '.$boyut.', key: '.$syc.'},'; // diziye yazdır
            }
            $data['bilgiler']= rtrim($data['bilgiler'],","); //dizinin sağından virgülü temizle        
        } 
        
        return view('admin.gallery.gallery',['dosya'=>$data]); // sonuçları view dosyasına aktar
    }
    
    public function upload(Request $request)
    {
        $konumlar[0]=null; // oluşturulacak dizin
        $konumlar[1]="/finder/upload/files/gallery"; // sabit konum
        $konumlar[2]= $request->input('dizin'); // ilgili dizin
        $konumlar[3]= $request->input('altDizin'); // ilgili içerik id

        $konumlar[2]=stripslashes($konumlar[2]);
        $konumlar[3]=stripslashes($konumlar[3]);
        // Ters slash varsa temizle

        $konumlar[2] = ltrim($konumlar[2], "/");
        $konumlar[2] = rtrim($konumlar[2], "/");
        // soldaki slashları temizle

        $konumlar[3] = ltrim($konumlar[3], "/");
        $konumlar[3] = rtrim($konumlar[3], "/");
        // sağdaki slashları temizle
       
        function klasor_olustur($klasor){
            // Oluşturulacak Dizin için gerekli fonksiyon
            if(!file_exists($klasor)){
                if(File::makeDirectory(str_replace("\\", "/", public_path()).$klasor,0777, true,true)){ // dizini oluştur
                    return "2";
                }else{return "0";}
            }else{return "1";}
        } 
        
        
        function replace_tr($text) {
            // türkçe karakterleri ingilizceye çevir
            $text = trim($text); // sağdan soldan boşlukları temizle
            $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');// TR
            $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','_'); // En
            $new_text = str_replace($search,$replace,$text); // düzelt
            return $new_text;
        }  
        
        if (isset($_FILES['files'])) {
            // dosya varsa işlemleri başlat
            if(count($konumlar)>0){ // post ile gelen konum bilgisi gelmiş mi
                for ($i=1;$i<count($konumlar);$i++){ // post ile gelen konum bilgilerini doğru sırayla birleştir
                    $konumlar[0].= $konumlar[$i]."/";
                }
                
            }            
            klasor_olustur($konumlar[0]); // istenen dizin yoksa oluştur           
            $konum =str_replace("\\", "/", public_path()).$konumlar[0]; // public dizininin ters slushlarını düzelterek konumlar ile birleştir
            $imageName = replace_tr(time()."_".$request->file('files')[0]->getClientOriginalName()); // rastegele ön isim oluştur
            if($request->file('files')[0]->move($konum , $imageName)){ // dosyayı yükle
                echo "Başarılı ->";
            }else{
                echo "Başarısiz ->";
            }
            echo " Dosya : $imageName <br>";
        }
        
    }
    
    public function delete($url=null)
    { // silme fonksiyonu
        $url = Crypt::decrypt($url); // url içinde url gönderildiği için şifrelenmiş url çözüldü
        $url1 = str_replace("\\", "/", public_path()).$url;// public dizininin ters slushlarını düzelterek url ile birleştir
        if(File::exists($url1)){ // dizinde dosya varmı
            if(File::delete($url1)){ // dosyayı sil
                echo "Silindi -> ".basename($url);
            }else{
                echo "Silinemedi -> ".basename($url);
            }
        }else{ // dosya yoksa uyar
            echo "Geçerli dizinde bulunamadı -> ".$url;
        }
        
    }
}
