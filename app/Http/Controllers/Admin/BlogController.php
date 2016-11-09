<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog;
use Auth;
use Carbon\Carbon;
use DB;
use File;
use Crypt;
use Session;
use App\Helpers\Helper;

class BlogController extends Controller
{
    public function __construct(Request $request)
    {
        $url = $request->path();
        Helper::sessionReload();
        $sess= Helper::shout($url);
        $this->read=$sess['r'];
        $this->update=$sess['u'];
        $this->add=$sess['a'];
        $this->delete=$sess['d'];
        $this->sess=$sess;
    }
    public function index(){
        if($this->read==0){
            return redirect()->action('Admin\HomeController@index');
        }
        /*die(Session::get('deneme'));*/
    	$blogs = Blog::all();
    	/*$emc_blog_table = DB::getSchemaBuilder()->getColumnListing('emc_blog');
    	return view('admin.blog.index',['blogs' => $blogs, 'emc_blog_table' => $emc_blog_table]);	*/
    	return view('admin.blog.index', ['blogs' => $blogs, 'deleg' => $this->sess]);
    }
    public function attachment_index(Request $request)
    {
        $data['type']=$request->input('blogType');
        $data['id']=$request->input('blogId');
        $konumlar[0] = str_replace("\\", "/", public_path());
        $konumlar[1] = "/uploads";
        $konumlar[2] = $data['type']; 
        $konumlar[3] = $data['id'];
        
        $dizin= $konumlar[0]."/".$konumlar[1]."/".$konumlar[2]."/".$konumlar[3];
        
        $data['dosyalar']=null;
        $data['bilgiler']=null;
        if(file_exists($dizin)){
            $dosya = File::allFiles($dizin);
            foreach ($dosya as $file)
            { 
                $ad =  basename($file);
                $konum=$konumlar[1]."/".$konumlar[2]."/".$konumlar[3]."/".$ad;
                $data['dosyalar'].="'".$konum."',"; 
            }
            $data['dosyalar']= rtrim($data['dosyalar'],",");
            $syc=0;
            foreach ($dosya as $file)
            { 
                $syc++;
                $ad1=  basename($file);
                $boyut=  filesize($file);
                $konum1=$konumlar[1]."/".$konumlar[2]."/".$konumlar[3]."/".$ad1;
                $url="/admin/attachment-delete/".Crypt::encrypt($konum1);
                $data['bilgiler'].='{url: "'.$url.'", caption: "'.$ad1.'", size: '.$boyut.', height: "100px", key: '.$syc.'},'; // Yazdır
            }
            $data['bilgiler']= rtrim($data['bilgiler'],",");
        } 
        return view('admin.blog.attachment',['dosya'=>$data]);
    }

    public function create(){
        if($this->read==0 || $this->add==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	return view('admin.blog.create');
    }

    public function save(Request $request){	
    	$degerler = $request->all();
        $degerler['slug'] = str_slug($request->input('name'));
    	Blog::create($degerler);   	 	
    }

    public function edit(Request $request){
        if($this->read==0 || $this->update==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	$id = $request->id;
    	$blogs = Blog::find($id);
    	return view('admin.blog.edit')->with(['blogs' => $blogs]);
    }

    public function update(Request $request){

    	$id = $request->input("id");
    	$blogsData = Blog::find($id);
    	$blogsData->name = $request->input("name");
        $blogsData->description = $request->input("description");
        $blogsData['slug'] = str_slug($request->input('name'));
        $blogsData->content = $request->input("content");
		$blogsData->save();
		return redirect()->action('Admin\BlogController@index');
    }

    public function delete(Request $request){
        if($this->read==0 || $this->delete==0){
            return redirect()->action('Admin\HomeController@index');
        }
    	$id = $request->id;
    	$blogsData = Blog::find($id);
    	$blogsData->status = 0;
		$blogsData->save();
		return redirect()->action('Admin\BlogController@index');
    }


    public function attachment_upload(Request $request)
    {
        $konumlar[0]=null; // oluşturulacak dizin
        $konumlar[1]="/uploads"; // sabit konum
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
        if (isset($_FILES['files'])) {
            if(count($konumlar)>0){
                for ($i=1;$i<count($konumlar);$i++){
                    $konumlar[0].= $konumlar[$i]."/";
                }                
            }            
            klasor_olustur($konumlar[0]);            
            $konum =str_replace("\\", "/", public_path()).$konumlar[0];
            $imageTempName = $request->file('files')[0]->getPathname();
            $current_time = time();
            $imageName = replace_tr($current_time."_".$request->file('files')[0]->getClientOriginalName());
            if($request->file('files')[0]->move($konum , $imageName)){
                echo "Başarılı ->";
            }else{
                echo "Başarısiz ->";
            }
            echo " Dosya : $imageName <br>";
        }
        
    }
    public function attachment_delete($url=null)
    {
        $url = Crypt::decrypt($url);
        $url1 = str_replace("\\", "/", public_path()).$url;
        if(File::exists($url1)){
            if(File::delete($url1)){
                echo "Silindi -> ".basename($url);
            }else{
                echo "Silinemedi -> ".basename($url);
            }
        }else{
            echo "Geçerli dizinde bulunamadı -> ".$url;
        }
        
    }
}
