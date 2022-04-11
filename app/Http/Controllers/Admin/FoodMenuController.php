<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FoodMenu;
use App\IngredientItem;
// use App\IngredientUnit;
use App\FoodCategory;
use App\foodTable;
use Image;
use Session;
use DB;
use App\Consumption;

class FoodMenuController extends Controller
{
    public function foodMenus()
    {
        $foodMenus = FoodMenu::with('foodCategory','ingredientItem')->get();
        Session::flash('page', 'foodMenu');
        return view('admin.foodMenus.view_food_menus', compact('foodMenus'));
    }

    public function addEditFoodMenu(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Food Menu";
            $button ="Submit";
            $foodMenu = new FoodMenu;
            $foodMenusData = array();
            $message = "food menus has been added sucessfully";
        }else{
            $title = "Edit Food Menu";
            $button ="Update";
            $foodMenusData = FoodMenu::with('consumption')->where('admin_id',auth('admin')->user()->id)->where('id',$id)->first();
            $foodMenusData= json_decode(json_encode($foodMenusData),true);
            $foodMenu = FoodMenu::find($id);
            $message = "Food Menus has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);
            if(empty($data['name'])){
                return redirect()->back()->with('error_message', 'food menu name is required !');
            }
                   
            if(empty($data['sale_price']))
            {
                $data['sale_price'] = "";
            }
               
            if(empty($data['category_id']))
            {
                $data['category_id'] = "";
            }
            if(empty($data['item_id']))
            {
                $data['item_id'] = "";
            }
               
            if(empty($data['description']))
            {
                $data['description'] = "";
            }
            if(empty($data['ingredient_id']))
            {
                $data['ingredient_id'] = "";
            }
            if(empty($data['code']))
            {
                $data['code'] = "";
            }
            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'image/menu'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $foodMenu->image =$imagePath;
    
                }
            }
            // if(empty($data['user_id']))
            // {
            //     $data['user_id'] = "";
            // }
            // if(empty($data['parent_id']))
            // {
            //     $data['parent_id'] = "";
            // }
            $foodMenu->admin_id = auth('admin')->user()->id;
            $foodMenu->name = $data['name'];
            $foodMenu->sale_price = $data['sale_price'];
            $foodMenu->category_id = $data['category_id'];
            $foodMenu->item_id = $data['item_id'];
            $foodMenu->description = $data['description'];
            // $foodMenu->ingredient_id = $data['ingredient_id'];
            $foodMenu->code = $data['code'];
            $foodMenu->is_kitchen = $data['is_kitchen'];
            $foodMenu->is_bar = $data['is_bar'];
            $foodMenu->is_caffe = $data['is_caffe'];
            $foodMenu->save();
            
            if(empty($id)){
                $id = DB::getPdo()->lastInsertId();
                foreach($data['id'] as $key=> $val)
                {
                    $newConsumption = new Consumption;
                    $newConsumption->ingredient_id = $data['ingredient_id'][$key];
                    $newConsumption->foodMenu_id = $id;
                    $newConsumption->ingredient_name = $data['ingredient_name'][$key];
                    $newConsumption->consumption_quantity = $data['consumption_quantity'][$key];
                    $newConsumption->save();
                    foodTable::where('id', $val)->delete();
                }
                
            }else{
                foreach($data['id'] as $key=> $val)
                {
                    $newConsumption =  Consumption::find($val);
                    $newConsumption->ingredient_id = $data['ingredient_id'][$key];
                    $newConsumption->foodMenu_id = $id;
                    $newConsumption->ingredient_name = $data['ingredient_name'][$key];
                    $newConsumption->consumption_quantity = $data['consumption_quantity'][$key];
                    $newConsumption->save();
                }

            }



            Session::flash('success_message', $message);
            return redirect('admin/food-menus');
        }
        $foodCategory = FoodCategory::get();
        $ingredientItem = IngredientItem::get();
        // $ingredientUnit = IngredientUnit::get();
        $foodTable = foodTable::get();
        Session::flash('page', 'foodMenu');
        return view('admin.foodMenus.add_edit_food_menus', compact('title','button','foodMenusData','foodCategory','ingredientItem','foodTable'));
    }


    //ajax food menu table
    public function ajaxfoodMenuTable(Request $request)
    {
        $data = $request->all();
        $ingredientItem = IngredientItem::where('id', $data['foodTable_id'])->first();
        $foodTable = new foodTable;
        // $foodTable->item_id = $data['item_id'];
        $foodTable->admin_id = auth('admin')->user()->id;
        $foodTable->ingredient_id =  $ingredientItem->id;
        $foodTable->ingredient =  $ingredientItem->name;
        $foodTable->save();
        $foodTable  = foodTable::get();
        return view('admin.foodMenus.ajax_foodMenu_table',compact('foodTable'));
    }

    //ajax food menu delete
    public function deletefoodMenuTable(Request $request)
    {
        
      $data = $request->all();
      foodTable::where('id', $data['ingredient_id'])->delete();
      $foodTable  = foodTable::get();
      return view('admin.foodMenus.ajax_foodMenu_table',compact('foodTable'));
    }
    public function deleteFoodMenu($id)
    {
      $id =FoodMenu::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Food menus has been deleted successfully!');

    }
}