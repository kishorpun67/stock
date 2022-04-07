<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purchase;
use App\Supplier;
use App\IngredientUnit;
use App\IngredientItem;
use App\IngredientCart;
use App\IngredientCategory;
use Session;

class PurchaseController extends Controller
{
    public function purchase()
    {
        $purchase = Purchase::with('ingredientCategory','ingredientItem','ingredientUnit','supplierName')->get();
        Session::flash('page', 'purchase');
        return view('admin.purchase.view_purchase', compact('purchase'));
    }

    public function addEditPurchase(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Purchase";
            $button ="Submit";
            $purchase = new Purchase;
            $purchasedata = array();
            $message = "Purchase has been added sucessfully";
        }else{
            $title = "Edit Purchase";
            $button ="Update";
            $purchasedata = Purchase::where('admin_id',auth('admin')->user()->id)->where('id',$id)->first();
            $purchasedata= json_decode(json_encode($purchasedata),true);
            $purchase = Purchase::find($id);
            $message = "purchase has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
        //dd($data);
            if(empty($data['supplier_id'])){
                return redirect()->back()->with('error_message', 'Supplier id is required !');
            }

            
            if(empty($data['date']))
            {
                $data['date'] = "";
            }

            if(empty($data['ingredient_id']))
            {
                $data['ingredient_id'] = "";
            }
            if(empty($data['item_id']))
            {
                $data['item_id'] = "";
            }
            if(empty($data['unit_id']))
            {
                $data['unit_id'] = "";
            }
            if(empty($data['code']))
            {
                $data['code'] = "";
            }
            if(empty($data['amount']))
            {
                $data['amount'] = "";
            }
            // if(empty($data['user_id']))
            // {
            //     $data['user_id'] = "";
            // }
            // if(empty($data['parent_id']))
            // {
            //     $data['parent_id'] = "";
            // }
            $purchase->admin_id = auth('admin')->user()->id;
            $purchase->supplier_id = $data['supplier_id'];
            $purchase->date = $data['date'];
            $purchase->ingredient_id = $data['ingredient_id'];
            $purchase->item_id = $data['item_id'];
            $purchase->unit_id = $data['unit_id'];
            $purchase->code = $data['code'];
            $purchase->amount = $data['amount'];
            $purchase->save();
            Session::flash('success_message', $message);
            return redirect('admin/purchase');
        }
        $supplier = Supplier::get();
        $ingredientCategory = IngredientCategory::get();
        $ingredientItem = IngredientItem::get();
        $ingredientUnit = IngredientUnit::get();
        $ingredientcart = IngredientCart::get();
        Session::flash('page', 'purchase');
        return view('admin.purchase.add_edit_purchase', compact('title','button','purchasedata','ingredientCategory','ingredientItem','ingredientUnit','supplier','ingredientcart'));
    }

    public function ajaxPurchaseTable(Request $request)
    {
        $data = $request->all();
        $ingredientItem = IngredientItem::where('id', $data['purchase_id'])->first();
        $ingredientcart = new IngredientCart;
        // $ingredientcart->item_id = $data['item_id'];
        $ingredientcart->admin_id = auth('admin')->user()->id;
        $ingredientcart->ingredient_id =  $ingredientItem->id;
        $ingredientcart->name =  $ingredientItem->name;
        $ingredientcart->price =$ingredientItem->purchase_price;
        $ingredientcart->quantity =$ingredientItem->alert_qty;
        $ingredientcart->save();
        $ingredientcart  = IngredientCart::get();
       return view('admin.purchase.ajax_purchase_table',compact('ingredientcart'));
    }

    public function deletePurchaseCart(Request $request)
    {
        
      $data = $request->all();
      IngredientCart::where('id', $data['ingredient_id'])->delete();
      $ingredientcart  = IngredientCart::get();
      return view('admin.purchase.ajax_purchase_table',compact('ingredientcart'));
    }

    //ajax check current amount
    public function chkCurrentAmount(Request $request){
        $data= $request->all();
        IngredientCart::where('id', $data['ingredientCart_id'])->update(['quantity'=>$data['quantity']]);
        $ingredientcart  = IngredientCart::get();
        return view('admin.purchase.ajax_purchase_table',compact('ingredientcart'));
    }


    public function purchaseReport()
    {
        $purchase = Purchase::get();
        return view('admin.purchase.purchase_report',compact('purchase'));
    }


    public function deletePurchase($id)
    {
      $id =Purchase::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Purchase has been deleted successfully!');

    }
}
