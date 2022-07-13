<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categoryview(){
        $category = Category::all();
        return view('Admin.category.category' , compact('category'));
    }

    public function store(Request $a){
        // echo "hello";
        // echo "<pre>";
        // print_r($a->all());
        // die;
        $this->validate($a, [
            'name' => 'required|max:255|unique:categories',
            'slug' => 'required|max:255',
            'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
            // 'category' => 'required',
            // 'tags' => 'required',
            // 'body' => 'required',
            'description' => 'max:255'
        ]);
        $files = $a->file('image');
        $filename = 'image'.time().'.'.$a->image->extension();
        $files->move("upload/category/" , $filename);
        $data = new Category();
        $data->name = $a->name;
        $data->slug = Str::slug($a->name , '-');
        $data->description = $a->description;
        $data->image = $filename;
        $data->save();
        Toastr::success('Data updated successfully :)');
        return redirect()->back();
    }
        public function update(Request $data,$id){
            // echo"<pre>";
            // print_r($data->all());
            // die;
            if($data->name == category::find($id)->name){
                $this->validate($data, [
                    'name' => 'required|max:255',
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
                    'name' => 'required|max:255|unique:categories',
                    // 'slug' => 'required|max:255',
                    'description' => 'required|max:255',
                    'image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                    // 'category' => 'required',
                    // 'tags' => 'required',
                    // 'body' => 'required',
                    ]);
                }

            $Categary = category::find($id);
            if(isset($data->image)){
                $file =$data->file('image');
                $filename = 'image'. time().'.'.$data->image->extension();
                // dd($filename);
                $file->move("upload/category/",$filename);
                $destination="uplode/category/".$Categary->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }
            }
            else{
                $filename =$Categary->image;
            }
            $Categary->name=$data->name;
            $Categary->description=$data->description;
            $Categary->image=$filename;
            $Categary->save();
            //  Toastr::success('Data update successfully :)');
            return redirect()->back();
        }
    public function delete($id){

        $category = Category::find($id);
        $destination = "upload/category/".$category->image;
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

}


