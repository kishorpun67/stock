<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'API\Admin', 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::post('login', 'AdminController@login');
    Route::group(['middleware'=>'auth:sanctum'], function(){
        
        //  route for view staff 
        Route::get('view-saff', 'AdminController@staff');

        // route for ingredients 
        Route::get('view-ingredient-categories', 'IngredientCategoryController@ingredientCategories');
        Route::post('add-ingredient-category', 'IngredientCategoryController@addIngredientCategory');
        Route::post('edit-ingredient-category', 'IngredientCategoryController@editIngredientCategory');

        // route for ingredients  units 
        Route::get('view-ingredient-unit', 'IngredintUnitController@ingredientUnit');
        Route::post('add-ingredient-unit', 'IngredintUnitController@addIngredientUnit');
        Route::post('edit-ingredient-unit', 'IngredintUnitController@editIngredientUnit');

         // route for ingredients  item 
         Route::get('view-ingredient-item', 'IngredintItemController@ingredientItem');
         Route::post('add-ingredient-item', 'IngredintItemController@addIngredientItem');
         Route::post('edit-ingredient-item', 'IngredintItemController@editIngredientItem');

        // route for food category 
        Route::get('view-food-categories', 'FoodCategoryController@foodCategory');
        Route::post('add-food-category', 'FoodCategoryController@addFoodCategory');
        Route::post('edit-food-category', 'FoodCategoryController@editFoodCategory');
        Route::post('delete-food-category', 'FoodCategoryController@deleteFoodCategory');

        // route all customer   
        Route::get('view-customer', 'CustomerController@customer');
        Route::post('add-customer', 'CustomerController@addCustomer');
        Route::post('edit-customer', 'CustomerController@editCustomer');
        Route::post('delete-customer', 'CustomerController@deleteCustomer');

        // route all table   
        Route::get('view-table', 'TableController@table');
        Route::post('add-table', 'TableController@addTable');
        Route::post('edit-table', 'TableController@editTable');
        Route::post('delete-table', 'TableController@deleteTable');

        // route all foodmenu   
        Route::get('view-foodMenu', 'FoodMenuController@foodMenu');
        Route::get('singleFoodMenu/{id}', 'FoodMenuController@singleFoodMenu');
        Route::post('add-foodMenu', 'FoodMenuController@addFoodMenu');
        Route::post('edit-foodMenu', 'FoodMenuController@editFoodMenu');
        Route::post('delete-foodMenu', 'FoodMenuController@deleteFoodMenu');

        //  route for supplier 
        Route::get('view-supplier', 'SupplierController@supplier');
        Route::get('single-supplier/{id}', 'SupplierController@singleSupplier');
        Route::post('add-supplier', 'SupplierController@addSupplier');
        Route::post('edit-supplier', 'SupplierController@editSupplier');
        Route::post('delete-supplier', 'SupplierController@deleteSupplier');

        //  route for paymentmethod 
        Route::get('view-payment', 'PaymentMethodController@payment');
        Route::get('single-payment/{id}', 'PaymentMethodController@singlePayment');
        Route::post('add-payment', 'PaymentMethodController@addPayment');
        Route::post('edit-payment', 'PaymentMethodController@editPayment');
        Route::post('delete-payment', 'PaymentMethodController@deletePayment');

        //  route for purchase 
        Route::get('view-purchase', 'PurchaseController@purchase');
        Route::get('single-purchase/{id}', 'PurchaseController@singlePurchase');
        Route::post('add-purchase', 'PurchaseController@addPurchase');
        Route::post('edit-purchase', 'PurchaseController@editPurchase');
        Route::post('delete-purchase', 'PurchaseController@deletePurchase');

    } );

});