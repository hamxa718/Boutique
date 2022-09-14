<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\product_attribute;
use App\Models\product_attribute_variant;
class productController extends Controller
{


    public function destroyProductAttribute($id)
    {
      $delete = product_attribute::find($id);

      $delete->delete();
      return redirect('productAttribute')->with('success','Product Deleted Successfull');
    }

    public function storeProductAttribute(Request $request)
    {
        $productdetails = product_attribute::where('product_id',$request->product_id)
        ->get();
        if($request->attribute_type == 'size'){
            if($request->variant_name == 'small' || $request->variant_name == 'medium' || $request->variant_name == 'large'){
                $this->validate($request,[
                    'attribute_type'=>'required',
                    'variant_name'=>'required',
                    'variant_name'=>'required',
                    'price'=>'required|max:6',
                    
                 ]);
                $product_attribute = new product_attribute;
                $product_attribute->product_id = $request->product_id;
                $product_attribute->variation = $request->attribute_type;
                $product_attribute->variation_title = $request->variant_name;
                $product_attribute->variation_price =  $request->price;
                
                $product_attribute->save();
                return redirect('productAttribute')->with('success','Product Attribute Added Successfull');

        }
        else{
            return back()->with('delete','Enter Valid Value For Size');
        }
    }

        if($request->attribute_type == 'color'){
           
                if($request->variant_name == 'black' || $request->variant_name == 'white' || $request->variant_name == 'silver'){
                    $this->validate($request,[
                        'attribute_type'=>'required',
                        'variant_name'=>'required',
                        'variant_name'=>'required',
                        'price'=>'required|max:6',
                        
                     ]);
                    $product_attribute = new product_attribute;
                    $product_attribute->product_id = $request->product_id;
                    $product_attribute->variation = $request->attribute_type;
                    $product_attribute->variation_title = $request->variant_name;
                    $product_attribute->variation_price =  $request->price;
                    
                    $product_attribute->save();
                    return redirect('productAttribute')->with('success','Product Attribute Added Successfull');
    
            }

            else{
                return back()->with('delete','Enter Valid Value For Color');
            }
        }
        else{
            $this->validate($request,[
                'attribute_type'=>'required',
                'variant_name'=>'required',
                'variant_name'=>'required',
                'price'=>'required|max:6',
                
             ]);

        }


      
    }
    public function addproductAttribute($id)
    {
        $productdetails = product_attribute::where('product_id',$id)
        ->get();
        // dd($productdetails);
        
        $product = product::find($id);
        // dd($product);
        return view('admin.products.addproductAttribute',compact('product','productdetails'));
    }
    public function productAttribute()
    {
        $product = product::all();
        
        return view('admin.products.productattribute',compact('product'));
    }
    public function index()
    {
        $allCategory = category::all();
        
        return view('admin.products.addproduct',compact('allCategory'));
    }
    public function store(Request $request)
    {
        
        // dd($request->all());
        $this->validate($request,[
            'category_name'=>'required',
            'category_type'=>'required',
            'product_name'=>'required|regex:/(([a-zA-Z]+)(\d+)?$)/u|max:256',
            'descrip'=>'required|regex:/(([a-zA-Z]+)(\d+)?$)/u|max:256',
            'price'=>'required|max:6',
            'image'=>'required|image|mimes:jpeg,png,jpg',
            'stock'=>'required|max:2',
         ]);
        // dd($request->file('image'));
        $request->file('image');
        
        $product_image = time() . '_' . $request->file('image')->getClientOriginalName();
        
        $request->file('image')->move(public_path() . '/uploads/products/', $product_image);
        
        $product = new product;
        $product->category_id = $request->category_name;
        $product->category_type = $request->category_type;
        $product->product_name = $request->product_name;
        $product->description = $request->descrip;
        $product->price = $request->price;
        $product->image = $product_image;
        $product->stock = $request->stock;
        $product->save();
       
        
        return redirect('viewProduct')->with('success','Product Added Successfull');
    }
    public function allProduct()
    {
        
        $product = product::all();
        
        return view('admin.products.viewproduct',compact('product'));
    }
    public function deleteProduct($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect('viewProduct')->with('success','Product Deleted Successfull');
    }
    public function editProduct($id)
    {
        $allCategory = category::all();
        $product = product::find($id);
      
        return view('admin.products.addproduct',compact('product','allCategory'));
    }
    public function productUpdate(Request $request ,$id)
    {
        // dd($request->all());
        
       
        $this->validate($request,[
            'product_name'=>'required|regex:/(([a-zA-Z]+)(\d+)?$)/u|max:256',
            'descrip'=>'required|regex:/(([a-zA-Z]+)(\d+)?$)/u|max:256',
            'price'=>'required|max:6',
            'image'=>'image|mimes:jpeg,png,jpg',
            'stock'=>'required|max:2',
         ]);
        $product = product::find($id);
       
        $product->category_id = $request->category_name;
        $product->category_type = $request->category_type;
        $product->product_name = $request->product_name;
        $product->description = $request->descrip;
        $product->price = $request->price;
        
        $product->stock = $request->stock;
        
        if($request->image != ''){        
            $path = public_path().'/uploads/products/';
  
            //code for remove old file
            // if($product->image != ''  && $product->image != null){
            //      $file_old = $path.$product->image;
            //      unlink($file_old);
            // }
  
            //upload new file
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);
  
            //for update in table
            $product->update(['image' => $filename]);
       }  
    
    else{
           $product->image = $product->image;   
    }

        $product->save();
      
        return redirect('viewProduct')->with('success','Product Updated Successfull');
    }
}
