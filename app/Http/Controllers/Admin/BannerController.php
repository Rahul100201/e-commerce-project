<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Brian2694\Toastr\Facades\Toastr;

class BannerController extends Controller
{
    public function bannertable(){
        $banner = Banner::all();
        return view('Admin.banner.banner' , compact('banner'));
    }

    public function bannerstore(Request $a){
        $this->validate($a, [
            'title' => 'required|max:255',
            'status' => 'required|max:255',
            'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
            // 'category' => 'required',
            // 'tags' => 'required',
            // 'body' => 'required',
            'description' => 'max:255'
        ]);
        $files = $a->file('image');
        $filename = 'image'.time().'.'.$a->image->extension();
        $files->move("upload/banner/" , $filename);
        $data = new Banner();
        $data->title = $a->title;
        if(isset($a->status)){
            $data->status=1;
        }
        $data->description = $a->description;
        $data->image = $filename;
        $data->save();
        // Toastr::success('Data updated successfully :)');
        return redirect()->back();
    }
    public function delete($id){

        $category = Banner::find($id);
        $destination = "upload/banner/".$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $category->delete();
        Toastr::success('Data deleted successfully :)');
        return redirect()->back();

        // echo $id;
        // $user = Category::find($id);
        // $user->delete();
        // Toastr::success('Data deleted successfully :)');
        // return redirect()->back();
    }
    public function update(Request $data,$id){
        // echo"<pre>";
        // print_r($data->all());
        // die;
        if($data->name == Banner::find($id)->name){
            $this->validate($data, [
                'title' => 'required|max:255',
                // 'slug' => 'required|max:255',
                'description' => 'required|max:255',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                // 'category' => 'required',
                // 'tags' => 'required',
                // 'body' => 'required',
                 ]);
        }
        else{
            $this->validate($data, [
                'title' => 'required|max:255|unique:categories',
                // 'slug' => 'required|max:255',
                'description' => 'required|max:255',
                'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                // 'category' => 'required',
                // 'tags' => 'required',
                // 'body' => 'required',
                 ]);
              }

        $Categary = Banner::find($id);
        if(isset($data->image)){
            $file =$data->file('image');
            $filename = 'image'. time().'.'.$data->image->extension();
            // dd($filename);
            $file->move("upload/banner/",$filename);
            $destination="uplode/banner/".$Categary->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
         }
         else{
             $filename =$Categary->image;
         }
         $Categary->title=$data->title;
         $Categary->description=$data->description;
         $Categary->image=$filename;
         $Categary->save();
         Toastr::success('Data update successfully :)');
         return redirect()->back();
    }

}
