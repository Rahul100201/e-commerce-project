<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\productimage;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function producttable(){
        $product = Product::all();
        $cat = Category::all();
        return view('Admin.product.product_table' , compact('product' , 'cat'));
    }


    public function productstore(Request $a){
        $file =$a->file('product_image');
         $filename = 'product_image'. time().'.'.$a->product_image->extension();
         $file->move("upload/product/",$filename);
       $data =new product();
       $data->product_name=$a->product_name;
       $data->product_description=$a->product_description;
       $data->product_image="$filename";
       $data->product_price=$a->product_price;
       $data->quantity=$a->quantity;
       $data->category_id=$a->category_id;
    //    if(isset($a->status)){
    //     $data->status =1;
    //  }
       $data->save();
       return redirect()->back();
    }

    public function add_image($id){
        // $img=Productimage::find($id);
        $image=productimage::where('product_id',$id)->get();
        $a=$id;
        return view('Admin.product.add_image',compact('a','image'));

    }
    public function store(Request $a){
        // echo"<pre>";
        // print_r($a->all());
        $this->validate($a, [
            'product_image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
            // 'category' => 'required',
            // 'tags' => 'required',
            // 'body' => 'required',
            // 'product_description' => 'max:255'
        ]);
        $files = $a->file('image');
        $filename = 'image'.time().'.'.$a->image->extension();
        $files->move("upload/product/product_image/" , $filename);
        $data = new productimage();
        $data->product_id = $a->id;
        $data->product_image = $filename;
        $data->save();
        return redirect('admin/product/add_image/'.$a->id);


    }
    public function delete($id){

        $category = Product::find($id);
        $destination = "upload/product/".$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $category->delete();
        Toastr::success('Data deleted successfully :)');
        return redirect()->back();
    }
    public function update(Request $data,$id){
        // echo"<pre>";
        // print_r($data->all());
        // die;
        if($data->name == Product::find($id)->name){
            $this->validate($data, [
                'category_id' =>'required |max:255',
                'product_name' => 'required|max:255',
                'product_description' => 'required|max:255',
                'product_image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                'product_price' => 'required|max:255',
                'product_quantity' => 'required|max:255',
                'status' => 'required|max:255',
                 ]);
        }
        else{
            $this->validate($data, [
                'category_id' =>'required |max:255',
                'product_name' => 'required|max:255',
                'product_description' => 'required|max:255',
                'product_image' => 'sometimes|mimes:jpg,png,bmp,jpeg',
                'product_price' => 'required|max:255',
                'quantity' => 'required|max:255',
                'status' => 'required|max:255',
                 ]);
              }

        $data = Product::find($id);
        if(isset($data->image)){
            $file =$data->file('image');
            $filename = 'image'. time().'.'.$data->image->extension();
            // dd($filename);
            $file->move("upload/product/",$filename);
            $destination="uplode/product/".$data->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
         }
         else{
             $filename =$data->image;
         }
         $data->product_name = $data->product_name;
         $data->product_price = $data->product_price;
         $data->product_description = $data->product_description;
         $data->quantity = $data->quantity;
         $data->category_id = $data->category_id;
         $data->product_image = $filename;
         $data->save();
         Toastr::success('Data update successfully :)');
         return redirect()->back();
    }
}
