<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use Illuminate\Routing\Controller;

class ShoeController extends Controller
{
    public function index(){
        $shoes = Shoe::all();
        return response()->json(['shoes' => $shoes]);
        return view ('products',compact('shoes'));
    }

    public function indexx(){
        $shoes = Shoe::all();
        return view ('products',compact('shoes'));
    }

    public function shoes(){
        return view ('create');
    }
    public function store(Request $request){
           $shoes = new Shoe();
           Shoe::create([
            'name' => $request-> name,
            'image' => $request -> image,
            'description' => $request-> description,
            'price' => $request -> price,
           ]);
           return redirect('dashboard')->with('success','Product successfully Added');
    }
    public function show($id){
        $shoes = Shoe::find($id);
        return view('show',compact('shoes'));
    }

    public function edit($id){
        $shoes = Shoe::find($id);
        return view('edit',compact('shoes'));
    }

    public function update(Request $request, $id){
        $shoes = Shoe::find($id);
        $shoes->name=$request->name;
        $shoes->image=$request->image;
        $shoes->description=$request->description;
        $shoes->price=$request->price;
        $shoes->save();
        return redirect('dashboard')->with('success','Product successfully Updated');
    }

    public function destroy($id){
        Shoe::find($id)->delete();
        return redirect('dashboard')->with('success','Product successfully Deleted');
    }

    public function mainindex(){
        $shoes = Shoe::get();
        return view('index',compact('shoes'));
    }

    public function addtocart($id){
        $shoes = Shoe::find($id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id] = [
                'name' => $shoes->name,
                'quantity' => 1,
                'image' => $shoes->image,
                'description' => $shoes->description,
                'price' => $shoes->price,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product has been added to cart!');
    }
    public function mycart(){
        return view('mycart');
    }

    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted.');
        }
    }
}
