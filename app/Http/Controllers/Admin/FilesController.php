<?php
/*
Description         : Herhangi bir içeriğe tek bir dosya eklenmesini sağlayan controller
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

class FilesController extends Controller
{
    public function index()
    {
        return view('admin.files.index');
    }
    
    public function singleUpload(Request $request){
        $silinecekveri = $request->input("deleteReturn");
        if ($silinecekveri!="0" || $silinecekveri!=0){
            $url1 = str_replace("\\", "/", public_path()).$silinecekveri;// public dizininin ters slushlarını düzelterek url ile birleştir
            if(File::exists($url1)){ // dizinde dosya varmı
                File::delete($url1); // varsa sil
            }
        }
        
        if(isset($_FILES["file"]["type"])){
            if (($_FILES["file"]["size"] < 2000000)) { /* 2MB */ 
                function klasor_olustur($klasor){
                    // Oluşturulacak Dizin için gerekli fonksiyon
                    if(!file_exists($klasor)){
                        if(File::makeDirectory(str_replace("\\", "/", public_path()).$klasor,0777, true,true)){
                            return "2";
                        }else{return "0";}
                    }else{return "1";}
                }
                    
                function replace_tr($text) {
                    $text = trim($text);
                    $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
                    $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','_');
                    $new_text = str_replace($search,$replace,$text);
                    return $new_text;
                }

                $dizin="/finder/upload/files/others/";
                klasor_olustur($dizin);
                $imageTempName = $request->file('file')->getPathname();
                $imageName = replace_tr(time()."_".$request->file('file')->getClientOriginalName());

                if($request->file('file')->move(str_replace("\\", "/", public_path()).$dizin , $imageName)){
                    echo $dizin.$imageName;
                }else{
                    echo 0;
                }
            }
        }else{
            echo "Dosya boyutu çok büyük";
        }
    }
    
    
}
