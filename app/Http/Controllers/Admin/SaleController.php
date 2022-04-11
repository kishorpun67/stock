<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sale;
use App\FoodCategory;
use App\FoodMenu;
use App\Cart;
use App\Waiter;
use App\Customer;
use Image;
use Session;
use App\Order;
use App\OrderDetail;
use DB;
use App\Table;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;
use App\Admin\Admin;
use View;


class SaleController extends Controller
{
    public function Sale()
    {
        $sale = Order::get();
        Session::flash('page', 'sale');
        return view('admin.sale.view_sale', compact('sale'));
    }

    public function addEditSale(Request $request, $id=null)
    {
        // return $id;
        $foodCategories = FoodCategory::get();
        $carts = Cart::where('admin_id',auth('admin')->user()->id)->get();
        $foodMenus = FoodMenu::get();
        $waiter = Admin::where('role_id',6)->get();
        $customer = Customer::get();
        Session::flash('page', 'sale');
        return view('admin.sale.table_room', compact('foodCategories','foodMenus','carts','waiter','customer'));
    }

    public function ajaxGetItem()
    {
        $category_id = request('category_id');
        if($category_id =="all")
        {
            $foodMenus = FoodMenu::get();

        }else{
            $foodMenus = FoodMenu::where('category_id', $category_id)->get();

        }

        return view('admin.sale.ajaxitem',compact('foodMenus'));
        // return $foodMenus;

    }

    public function ajaxFoodTable(Request $request)
    {
        $data = $request->all();
        $newcarts = new Cart;
        // $newcarts->item_id = $data['item_id'];
        $newcarts->admin_id = auth('admin')->user()->id;
        $newcarts->price = $data['price'];
        $newcarts->item = $data['name'];
        $newcarts->quantity =1;
        // $newcarts->total = $data['price'] ;
        $newcarts->is_caffe = $data['is_caffe'];
        $newcarts->is_bar = $data['is_bar'];
        $newcarts->is_kitchen = $data['is_kitchen'];
        $newcarts->save();
        $carts = Cart::where('admin_id',auth('admin')->user()->id)->get();
        $waiter = Admin::where('role_id',6)->get();
        $customer = Customer::get();
        // $table = Table::where('id',$data['table'])->first();

       return view('admin.sale.ajax_food_table',compact('carts','waiter', 'customer'));
    }
    public function updateCart(Request $request)
    {
        $data = $request->all();
        if($data['qty']=="qtyMinus"){
            $cart =  Cart::where(['admin_id'=>auth('admin')->user()->id, 'id'=>$data['cart_id']])->decrement('quantity',1);
        }elseif($data['qty']=="qtyPlus")
        {
            $cart =  Cart::where(['admin_id'=>auth('admin')->user()->id, 'id'=>$data['cart_id']])->increment('quantity',1);
        }
        $carts = Cart::where(['admin_id' => auth('admin')->user()->id])->get();
        $waiter = Admin::where('role_id',6)->get();
        $customer = Customer::get();
        return response()->json(['view'=>(String)View::make('admin.sale.ajax_food_table')->with(compact('carts', 'waiter', 'customer'))]);
   
    }


    public function deleteCart()
    {
      Cart::where('id', request('cart_id'))->delete();
      $carts = Cart::where(['admin_id' => auth('admin')->user()->id])->get();
      $waiter = Admin::where('role_id',6)->get();
      $customer = Customer::get();
      return response()->json(['view'=>(String)View::make('admin.sale.ajax_food_table')->with(compact('carts', 'waiter', 'customer'))]);
     }

    public function deleteSale($id)
    {
      $id =Order::where('id', $id)->delete();
      return redirect()->back()->with('success_message', 'sale has been deleted successfully!');
    }

    public function table($url=null)
    {
        // return $url;
        return view('admin.sale.table',compact('url'));
    }
    public function addTable($table=null)
    {
        $table = Table::where('id',$table)->first();
        // return $table;
        $foodCategories = FoodCategory::get();
        $carts = Cart::get();
        $foodMenus = FoodMenu::with('foodCategory')->get();
        $waiter = Admin::where('role_id',6)->get();
        $customer = Customer::get();
        $order = Order::orderBy('id','Desc')->where('status', '!=', 'Cancel')->get();

        Session::flash('page', 'sale');
        return view('admin.sale.add_edit_sale', compact('order','foodCategories','foodMenus','carts','waiter','customer', 'table'));
    }
    public function placeOrder()
    {
      $data = request()->all();
        if(empty($data['waiter_id']) || empty($data['customer_id'])){
            return redirect()->back();
        }
        $carts = Cart::get();
        $new  = new Order();
        $new->waiter_id = $data['waiter_id'];
        $new->admin_id = auth('admin')->user()->id;
        $new->customer_id = $data['customer_id'];
        $new->table_id = $data['table_id'];
        $new->payment = $data['payment'];
        $new->total = $data['total'];
        $new->number_of_customer =4;
        $new->status = "New";
        $new->save();
        $order_id= DB::getPdo()->lastInsertId();

        foreach($carts as $cart)
        {
            // return $cart->is_kitchen;
            $newOrder = new OrderDetail();
            $newOrder->order_id = $order_id;
            $newOrder->item = $cart->item;
            $newOrder->price = $cart->price;
            $newOrder->quantity = $cart->quantity;
            $newOrder->is_bar = $cart->is_bar;
            $newOrder->is_kitchen = $cart->is_kitchen;
            $newOrder->is_caffe = $cart->is_caffe;
            $newOrder->status = 'New';
            // $newOrder->message = $cart->message;
            $newOrder->total = ($cart->quantity*$cart->price);
            $newOrder->save();
            Cart::where('id', $cart->id)->delete();
            if(!empty($cart->is_caffe))
            {
                $caffe = collect(['title' => "Order :", "order_id"=>$order_id, 'body'=>"has benn modified"]);
                $caffe = json_decode(json_encode($caffe), true);
            }
            if(!empty($cart->is_kitchen))
            {
                $kitchen = collect(['title' => "Order :", "order_id"=>$order_id, 'body'=>"has benn modified"]);
                $kitchen = json_decode(json_encode($kitchen), true);
            }
            if(!empty($cart->is_bar))
            {
                $bar = collect(['title' => "Order :", "order_id"=>$order_id, 'body'=>"has benn modified"]);
                $bar = json_decode(json_encode($bar), true);
            }
        }
        $kitchen_staff = Admin::where('role_id',7)->get();
        $bar_staff = Admin::where('role_id',8)->get();
        $caffe_staff = Admin::where('role_id',9)->get();
        if(!empty($kitchen))
        {
            foreach($kitchen_staff as $kitchen_staff){
                Notification::send($kitchen_staff, new OrderNotification($kitchen));
            }
        }
        if(!empty($caffe))
        {
            foreach($caffe_staff as $caffe_staff){
                Notification::send($caffe_staff, new OrderNotification($caffe));
            }
        }
        if(!empty($bar))
        {
            foreach($bar_staff as $bar_staff){
                Notification::send($bar_staff, new OrderNotification($bar));
            }
        }
        return redirect()->back();
    }
    public function ajaxGetModifyOrder()
    {
        $orderDetails  = Order::with('ordrDetails')->where('id', request('order_id'))->first();
        return view('admin.sale.ajaxOderModify', compact('orderDetails'));
    }
    public function ajaxOrderDetails()
    {
        $orderDetails  = Order::with('ordrDetails')->where('id', request('order_id'))->first();
        return view('admin.sale.ajax_order_details', compact('orderDetails'));
    }
    public function ajaxKotOrderDetails(){
        $orderDetails =  Order::with('kitchen', 'customer', 'waiter')->where('id', request('order_id'))->first();
        return view('admin.sale.ajax_kot', compact('orderDetails'));

    }
    public function ajaxBotOrderDetails(){
        $orderDetails =  Order::with('bar', 'customer', 'waiter')->where('id', request('order_id'))->first();
        return view('admin.sale.ajax_bot', compact('orderDetails'));

    }
    
    public function orderInnovice()
    {
        $orderDetails  = Order::with('ordrDetails')->where('id', request('order_id'))->first();
        return view('admin.sale.ajax_checkout', compact('orderDetails'));
    }
    public function orderBill(){
        $orderDetails  = Order::with('ordrDetails', 'customer')->where('id', request('order_id'))->first();
        return view('admin.sale.innovice', compact('orderDetails'));
    }
    public function cancelOrder(){
        Order::where('id' , request('order_id'))->update(['status'=>'Cancel']);
        return redirect()->back();
    
    }
    public function kitchenStatus()
    {
        $orderDetails =  Order::with('kitchen', 'customer', 'waiter')->where('id', request('order_id'))->first();
        return view('admin.sale.ajax_kitchen_status', compact('orderDetails'));

    }
    public function billPrint()
    {
        $orderbill = Order::with('ordrDetails', 'customer')->where('id', request('order_id'))->first();
        return view('admin.sale.bill_print', compact('orderbill'));
    }
    
   public function ajaxSearchFood(Request $request)
   {
       $data = $request->all();
       $foodMenus = FoodMenu::where('name','like', '%'.$data['searchItem'].'%')->get();
       return view('admin.sale.ajaxItem', compact('foodMenus'));
   }

    
}
