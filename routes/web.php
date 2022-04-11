<?php

use App\Admin\Banner;
use App\Admin\Category;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;
// use Mail;
use App\Mail\SendMail;
use App\Jobs\ProcessPodcast;
use Carbon\Carbon;


// use Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['namespace' => 'SuperAdmin', 'prefix' => 'superAdmin', 'as' => 'superAdmin.'],function() {
    Route::match(['get', 'post'], '/', 'SuperAdminController@login')->name('login');
    Route::group(['middleware' => ['superAdmin']], function() {
        Route::get('dashboard', 'SuperAdminController@dashboard')->name('dashboard');
        Route::get('logout', 'SuperAdminController@logout')->name('logout');
        Route::get('settings', 'SuperAdminController@settings')->name('settings');
        Route::post('check-current-password', 'SuperAdminController@checkCurrentPassword');
        Route::post('update-current-password', 'SuperAdminController@updateCurrentPassword')->name('update.current.password');
        Route::match(['get', 'post'], 'update-admin-details', 'SuperAdminController@updateAdminDetails')->name('update.admin.details');

        // route for  admin 
        Route::get('all-admins', 'SuperAdminController@admin')->name('details');
        Route::post('add-edit-admin/{id?}', 'SuperAdminController@addEditAdmin')->name('add.edit.admin');
        Route::post('add-edit-access/{id?}', 'SuperAdminController@access')->name('add.edit.access');


        // Category
        Route::get('categories', 'CategoryController@categories')->name('categories');
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory')->name('add.edit.category');
        Route::post('append-categories-level', 'CategoryController@appendCategoryLevel');
        Route::get('delete-category/{id?}', 'CategoryController@deleteCategory')->name('delete-category');

        // banner 
        Route::get('banner', 'BannerController@banner')->name('banner');
        Route::post('update-banner-status', 'BannerController@updateBannerStatus');
        Route::post('add-banner', 'BannerController@add')->name('add.banner');
        Route::post('edit-banner/{id}', 'BannerController@edit')->name('edit.banner');
        Route::get('delete-banner/{id}', 'BannerController@delete')->name('delete.banner');

         // testimonial 
         Route::get('tesimonial', 'TestimonialController@testimonial')->name('testimonial');
         Route::match(['get', 'post'], 'add-edit-testimonial/{id?}', 'TestimonialController@addEditTestimonail')->name('add.edit.testimonial');
         Route::get('delete-testimonial/{id?}', 'TestimonialController@deleteTestimonail')->name('delete.testimonial');


        //  route for post 
        Route::get('post-request', 'PostController@showPostRequest')->name('post.request');
        Route::get('post-detail/{id}', 'PostController@showPostDetail')->name('post.detail');
        Route::post('post-update-status/{id}', 'PostController@updateStatus')->name('post.update.status');


 
    });
});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::match(['get', 'post'], '/', 'AdminController@login')->name('login');
    Route::match(['get', 'post'], '/register', 'AdminController@register')->name('register'); 
    Route::group(['middleware' => ['admin']], function() {
        Route::get('dialy-report', 'ChartsController@dailyReport')->name('dialy.report');
        Route::post('/daily_report', 'ChartsController@ajaxDaily');

        Route::get('dialy-monthly', 'ChartsController@monthlyReport')->name('monthly.report');
        Route::post('/monthly_report', 'ChartsController@ajaxMonthly');
        
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('logout', 'AdminController@logout')->name('logout');
        Route::get('settings', 'AdminController@settings')->name('settings');
        Route::post('check-current-password', 'AdminController@checkCurrentPassword');
        Route::post('update-current-password', 'AdminController@updateCurrentPassword')->name('update.current.password');
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails')->name('update.admin.details');

        Route::get('order', 'OrderController@orderView')->name('order');
        Route::get('kitchen-update/{id}', 'OrderController@kitchenUpdate')->name('kitchen.update');
        Route::get('kitchen-innovice/{id}', 'OrderController@kitchenInnovice')->name('kitchen.innovice');
        Route::post('update-kitchen-status', 'OrderController@updateKitchenStatus');
        Route::get('bar', 'OrderController@bar')->name('bar');
        Route::get('bar-update/{id}', 'OrderController@barUpdate')->name('bar.update');
        Route::get('bar-innovice/{id}', 'OrderController@barInnovice')->name('bar.innovice');
        Route::get('bar-detail/{id}', 'OrderController@orderDetails')->name('order.detail');
        Route::post('update-cancel-status', 'OrderController@updateOrderCancel');
        Route::post('update-order-status/{id?}', 'OrderController@updateOrderStatus')->name('update.order.status');
        Route::get('order-innovice/{id}', 'OrderController@orderInnovice')->name('order.innovice');
        Route::get('delete-order/{id}', 'OrderController@delete');
        Route::post('update-order', 'OrderController@updateOrder')->name('update.order');
        Route::get('view-cancel-order', 'OrderController@viewCancelOrder')->name('cancel.order');

            // user route 
        // Route::group(['middleware'=>['ChekcRole:Admin', 'ChekcRole:add']], function(){
            Route::get('user', 'AdminController@viewUser')->name('user');
            Route::match(['get','post'],'add-edit-user/{id?}', 'AdminController@addEditUser')->name('add.edit.user');
            Route::get('delete-user/{id}', 'AdminController@deleteUser');
    
                  //routes for admin
            Route::get('all-admins', 'AdminController@admin')->name('details');
            Route::post('add-edit-admin/{id?}', 'AdminController@addEditAdmin')->name('add.edit.admin');
            Route::get('delete-admin/{id?}', 'AdminController@delete');

            Route::post('add-edit-access/{id?}', 'AdminController@access')->name('add.edit.access');
    
               //routes for banner
            Route::get('banner', 'BannerController@banner')->name('banner');
            Route::post('update-banner-status', 'BannerController@updateBannerStatus');
            Route::post('add-banner', 'BannerController@add')->name('add.banner');
            Route::post('edit-banner/{id}', 'BannerController@edit')->name('edit.banner');
            Route::get('delete-banner/{id}', 'BannerController@delete')->name('delete.banner');
    
             //routes for category
            Route::get('categories', 'CategoryController@categories')->name('categories');
            Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
            Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory')->name('add.edit.category');
            Route::post('append-categories-level', 'CategoryController@appendCategoryLevel');
            Route::get('delete-category/{id?}', 'CategoryController@deleteCategory')->name('delete-category');
            Route::get('add-edit-category/delete-category-image/{id?}', 'CategoryController@deleteCategoryImage');

             //routes for testimonial
            Route::get('tesimonial', 'TestimonialController@testimonial')->name('testimonial');
            Route::match(['get', 'post'], 'add-edit-testimonial/{id?}', 'TestimonialController@addEditTestimonail')->name('add.edit.testimonial');
            Route::get('delete-testimonial/{id?}', 'TestimonialController@deleteTestimonail')->name('delete.testimonial');
    
                 //routes for ingredientCategory
             Route::get('ingredient-categories', 'ingredientCategoryController@ingredientCategories')->name('ingredientCategory');
             Route::match(['get', 'post'], 'add-edit-ingredientCategory/{id?}', 'ingredientCategoryController@addEditIngredientCategory')->name('add.edit.ingredient.category');
             Route::get('delete-ingredientCategory/{id?}', 'ingredientCategoryController@deleteIngredientCategory')->name('delete.ingredient.category');
    
               //routes for ingredientUnit
            Route::get('ingredient-units', 'ingredientUnitsController@ingredientUnits')->name('ingredientUnit');
            Route::match(['get', 'post'], 'add-edit-ingredientUnit/{id?}', 'ingredientUnitsController@addEditIngredientUnit')->name('add.edit.ingredient.unit');
            Route::get('delete-ingredientUnit/{id?}', 'ingredientUnitsController@deleteIngredientUnit')->name('delete.ingredient.unit');

               //routes for ingredientItem
            Route::get('ingredient-items', 'IngredientItemsController@ingredientItems')->name('ingredientItem');
            Route::match(['get', 'post'], 'add-edit-ingredientItem/{id?}', 'IngredientItemsController@addEditIngredientItem')->name('add.edit.ingredient.item');
            Route::get('delete-ingredientItem/{id?}', 'IngredientItemsController@deleteIngredientItem')->name('delete.ingredient.item');

                    //routes for foodCategory
            Route::get('food-categories', 'FoodCategoryController@foodCategories')->name('foodCategory');
            Route::match(['get', 'post'], 'add-edit-foodCategory/{id?}', 'FoodCategoryController@addEditFoodCategory')->name('add.edit.food.category');
            Route::get('delete-foodCategory/{id?}', 'FoodCategoryController@deleteFoodCategory')->name('delete.food.category');

                //routes for foodMenu
            Route::get('food-menus', 'FoodMenuController@foodMenus')->name('foodMenu');
            Route::match(['get', 'post'], 'add-edit-foodMenu/{id?}', 'FoodMenuController@addEditFoodMenu')->name('add.edit.food.menu');
            Route::get('delete-foodMenu/{id?}', 'FoodMenuController@deleteFoodMenu')->name('delete.food.menu');

               //routes for purchase
            Route::get('purchase', 'PurchaseController@purchase')->name('purchase');
            Route::match(['get', 'post'], 'add-edit-purchase/{id?}', 'PurchaseController@addEditPurchase')->name('add.edit.purchase');
            Route::get('delete-purchase/{id?}', 'PurchaseController@deletePurchase')->name('delete.purchase');

              //routes for customer
            Route::get('customer', 'CustomerController@customer')->name('customer');
            Route::match(['get', 'post'], 'add-edit-customer/{id?}', 'CustomerController@addEditCustomer')->name('add.edit.customer');
            Route::get('delete-customer/{id?}', 'CustomerController@deleteCustomer')->name('delete.customer');

              //routes for supplier
            Route::get('supplier', 'SupplierController@Supplier')->name('supplier');
            Route::match(['get', 'post'], 'add-edit-supplier/{id?}', 'SupplierController@addEditSupplier')->name('add.edit.supplier');
            Route::get('delete-supplier/{id?}', 'SupplierController@deleteSupplier')->name('delete.supplier');


               //routes for waste

            //kishor i am ending route here.

            Route::get('waste', 'WasteController@Waste')->name('waste');
            Route::match(['get', 'post'], 'add-edit-waste/{id?}', 'WasteController@addEditWaste')->name('add.edit.waste');
            Route::get('delete-waste/{id?}', 'WasteController@deleteWaste')->name('delete.waste');

               //routes for table.
            Route::get('table', 'TableController@table')->name('table');
            Route::match(['get', 'post'], 'add-edit-table/{id?}', 'TableController@addEditTable')->name('add.edit.table');
            Route::get('delete-table/{id?}', 'TableController@deleteTable')->name('delete.table');

            // route  for all screen?
            Route::get('kitchen', 'AllScreenController@kitchen')->name('kitchen');
            Route::get('caffe', 'AllScreenController@caffe')->name('caffe');
            Route::get('bar', 'AllScreenController@bar')->name('bar');
            Route::post('update-food-status', 'AllScreenController@updateFoodStatus')->name('update.food.status');
            Route::get('waiter-collect-food', 'AllScreenController@waiterCollectFood')->name('waiter.collect.food');
            Route::post('collect-food', 'AllScreenController@collectFood')->name('collect.food');

            //routes for sale and  ajax used in sale
            Route::get('sale', 'SaleController@Sale')->name('sale');
            Route::match(['get', 'post'], 'sale-food/{id?}', 'SaleController@addEditSale')->name('add.edit.sale');
            Route::get('food/{url}', 'SaleController@table')->name('food');
            Route::post('ajax-search-food', 'SaleController@ajaxSearchFood');
            Route::get('add-table/{id}', 'SaleController@addTable')->name('add.table');
            Route::get('delete-sale/{id?}', 'SaleController@deleteSale')->name('delete.sale');
            Route::post('update-cart-item-quantity', 'SaleController@updateCart');
            Route::get('ajax-get-item', 'SaleController@ajaxGetItem');
            Route::post('ajax-food-table', 'SaleController@ajaxFoodTable');
            Route::post('/delete-cart-item','SaleController@deleteCart')->name('delete.cart');
            Route::post('place-order', 'SaleController@placeOrder')->name('place.order');
            Route::get('ajax-get-modify-order', 'SaleController@ajaxGetModifyOrder');
            Route::get('ajax-order-details', 'SaleController@ajaxOrderDetails');
            Route::get('ajax-order-details', 'SaleController@ajaxOrderDetails');
            Route::get('ajax-kit-order-details', 'SaleController@ajaxKotOrderDetails');
            Route::get('ajax-bot-order-details', 'SaleController@ajaxBotOrderDetails');
            Route::get('oder-innovice', 'SaleController@orderInnovice')->name('sale.innovice');
            Route::get('oder-bill', 'SaleController@orderBill')->name('sale.bill');
            Route::post('cancel-order', 'SaleController@cancelOrder')->name('cancel.order');
            Route::get('kitchen-status', 'SaleController@kitchenStatus');
            Route::post('bill-print', 'SaleController@billPrint')->name('bill.print');

                  //routes for expense
            Route::get('expense', 'ExpenseController@Expense')->name('expense');
            Route::match(['get', 'post'], 'add-edit-expense/{id?}', 'ExpenseController@addEditExpense')->name('add.edit.expense');
            Route::get('delete-expense/{id?}', 'ExpenseController@deleteExpense')->name('delete.expense');
            
               //routes for waiter
            Route::get('waiter', 'WaiterController@Waiter')->name('waiter');
            Route::match(['get', 'post'], 'add-edit-waiter/{id?}', 'WaiterController@addEditWaiter')->name('add.edit.waiter');
            Route::get('delete-waiter/{id?}', 'WaiterController@deleteWaiter')->name('delete.waiter');

              //routes for order
            Route::get('order', 'OrderController@Order')->name('order');
            Route::match(['get', 'post'], 'add-edit-order/{id?}', 'OrderController@addEditOrder')->name('add.edit.order');
            Route::get('delete-order/{id?}', 'OrderController@deleteOrder')->name('delete.order');

               //routes for paymentMethod
            Route::get('paymentMethod', 'PaymentMethodController@paymentMethod')->name('paymentMethod');
            Route::match(['get', 'post'], 'add-edit-paymentMethod/{id?}', 'PaymentMethodController@addEditpaymentMethod')->name('add.edit.paymentMethod');
            Route::get('delete-paymentMethod/{id?}', 'PaymentMethodController@deletepaymentMethod')->name('delete.paymentMethod');

              //routes for attendance
            Route::get('attendance', 'AttendanceController@Attendance')->name('attendance');
            Route::match(['get', 'post'], 'add-edit-attendance/{id?}', 'AttendanceController@addEditAttendance')->name('add.edit.attendance');
            Route::get('delete-attendance/{id?}', 'AttendanceController@deleteAttendance')->name('delete.attendance');

             //routes for task
            Route::get('task', 'TaskController@Task')->name('task');
            Route::match(['get', 'post'], 'add-edit-task/{id?}', 'TaskController@addEditTask')->name('add.edit.task');
            Route::get('delete-task/{id?}', 'TaskController@deleteTask')->name('delete.task');

             //routes for leave
            Route::get('leave', 'LeaveController@Leave')->name('leave');
            Route::match(['get', 'post'], 'add-edit-leave/{id?}', 'LeaveController@addEditLeave')->name('add.edit.leave');
            Route::get('delete-leave/{id?}', 'LeaveController@deleteLeave')->name('delete.leave');
            
              //routes for miscellaneous
            Route::get('miscellaneous', 'MiscellaneousController@Miscellaneous')->name('miscellaneous');
            Route::match(['get', 'post'], 'add-edit-miscellaneous/{id?}', 'MiscellaneousController@addEditMiscellaneous')->name('add.edit.miscellaneous');
            Route::get('delete-miscellaneous/{id?}', 'MiscellaneousController@deleteMiscellaneous')->name('delete.miscellaneous');

            //routes for tax and vat
            Route::get('taxVat', 'TaxVatController@taxVat')->name('taxVat');
            Route::match(['get', 'post'], 'add-edit-taxVat/{id?}', 'TaxVatController@addEditTaxVat')->name('add.edit.taxVat');
            Route::get('delete-taxVat/{id?}', 'TaxVatController@deleteTaxVat')->name('delete.taxVat');

            //routes for bank Deposit
            Route::get('bankDeposit', 'BankDepositController@bankDeposit')->name('bankDeposit');
            Route::match(['get', 'post'], 'add-edit-bankDeposit/{id?}', 'BankDepositController@addEditBankDeposit')->name('add.edit.bankDeposit');
            Route::get('delete-bankDeposit/{id?}', 'BankDepositController@deleteBankDeposit')->name('delete.bankDeposit');
   
            //routes for bank 
            Route::get('bank', 'BankController@bank')->name('bank');
            Route::match(['get', 'post'], 'add-edit-bank/{id?}', 'BankController@addEditBank')->name('add.edit.bank');
            Route::get('delete-bank/{id?}', 'BankController@deleteBank')->name('delete.bank');


            //routes for Cash hand
            Route::get('cashHand', 'CashHandController@cashHand')->name('cashHand');
            Route::match(['get', 'post'], 'add-edit-cashHand/{id?}', 'CashHandController@addEditCashHand')->name('add.edit.cashHand');
            Route::get('delete-cashHand/{id?}', 'CashHandController@deleteCashHand')->name('delete.cashHand');

            //routes for liabilities
            Route::get('liabilities', 'LiabilitiesController@liabilities')->name('liabilities');
            Route::match(['get', 'post'], 'add-edit-liabilities/{id?}', 'LiabilitiesController@addEditLiabilities')->name('add.edit.liabilities');
            Route::get('delete-liabilities/{id?}', 'LiabilitiesController@deleteLiabilities')->name('delete.liabilities');

            //routes for income
            Route::get('income', 'IncomeController@income')->name('income');
            Route::match(['get', 'post'], 'add-edit-income/{id?}', 'IncomeController@addEditIncome')->name('add.edit.income');
            Route::get('delete-income/{id?}', 'IncomeController@deleteIncome')->name('delete.income');

            //routes for assets
            Route::get('assets', 'AssetsController@assets')->name('assets');
            Route::match(['get', 'post'], 'add-edit-assets/{id?}', 'AssetsController@addEditAssets')->name('add.edit.assets');
            Route::get('delete-assets/{id?}', 'AssetsController@deleteAssets')->name('delete.assets');


           //routes for salary
            Route::get('view-salary','AttendanceController@viewSalary')->name('view.salary');
            Route::get('view-supplier-deu-payment','SupplierController@viewSupplierDeuPayment')->name('view.supplier.deu.payments');
            Route::get('view-customer-deu-receive','CustomerController@viewCustomerDeuReceives')->name('view.customer.deu.receives');

            //kishor i am ending route here.

            //ROUTES FOR REPORTS 

            Route::get('waste-report','WasteController@wasteReport')->name('waste.report');
            Route::get('customer-report','CustomerController@customerReport')->name('customer.report');

            //Route for stock reports
            Route::get('stock-report','IngredientItemsController@stockReport')->name('stock.report');

            //ajax purchase routes
            Route::post('delete-purchase-table','PurchaseController@deletePurchaseCart')->name('delete.purchase.table');
            Route::post('ajax-purchase-table', 'PurchaseController@ajaxPurchaseTable');
            Route::post('check-current-amount','PurchaseController@chkCurrentAmount');

            //ajax food menu routes
            Route::post('delete-foodMenu-table','FoodMenuController@deletefoodMenuTable')->name('delete.foodMenu.table');
            Route::post('ajax-foodMenu-table', 'FoodMenuController@ajaxfoodMenuTable');


               //routes for waiter
            Route::get('waiter', 'WaiterController@Waiter')->name('waiter');
            Route::match(['get', 'post'], 'add-edit-waiter/{id?}', 'WaiterController@addEditWaiter')->name('add.edit.waiter');
            Route::get('delete-waiter/{id?}', 'WaiterController@deleteWaiter')->name('delete.waiter');

               //routes for order
            Route::get('order', 'OrderController@Order')->name('order');
            Route::match(['get', 'post'], 'add-edit-order/{id?}', 'OrderController@addEditOrder')->name('add.edit.order');
            Route::get('delete-order/{id?}', 'OrderController@deleteOrder')->name('delete.order');

               //routes payment

            

            // route for report 
            Route::get('admin-daily-summary-report', 'ReportController@dailySummaryReport')->name('daily.summary.report');
            Route::get('purchase-report','ReportController@purchaseReport')->name('purchase.report');
            Route::get('attendance-report','ReportController@attendanceReport')->name('attendance.report');
            Route::get('sale-report','ReportController@saleReport')->name('sale.report');
            Route::get('miscellaneous-report','ReportController@miscellaneousReport')->name('miscellaneous.report');




            Route::get('payment', 'PaymentController@payment')->name('payment');
            Route::post('add-payment', 'PaymentController@add')->name('add.payment');
            Route::post('edit-payment/{id}', 'PaymentController@edit')->name('edit.payment');
            Route::get('delete-payment/{id}', 'PaymentController@delete')->name('delete.payment');
    
            Route::get('payment', 'PaymentController@payment')->name('payment');
            Route::post('add-payment', 'PaymentController@add')->name('add.payment');
            Route::post('edit-payment/{id}', 'PaymentController@edit')->name('edit.payment');
            Route::get('delete-payment/{id}', 'PaymentController@delete');
        // });
        // routes for checkin and checkout kitchen
        Route::get('checkin-room', 'RoomController@checkinView')->name('checkin.room');
        Route::post('add-checkin-room', 'RoomController@addCheckin')->name('add.checkin.room');
        Route::post('edit-checkin-room/{id}', 'RoomController@editCheckin')->name('edit.checkin.room');
        Route::get('checkout-room', 'RoomController@checkoutView')->name('checkout.room');
        Route::get('room-detail/{id}', 'RoomController@roomDetail')->name('room.detail');
        Route::post('checkout-user-bill/{id}', 'RoomController@checkoutUserBill')->name('checkout.user.bill');


        
        
        Route::get('checkout-room', 'RoomController@checkoutView')->name('checkout.room');
        Route::get('checkout-bill/{id}', 'RoomController@bill')->name('bill.print.checkout');

        
        Route::get('read-all-notification', function(){
            auth('admin')->user()->unreadNotifications->markAsRead(); 
            return redirect()->back();
        })->name('read.all.notification');

    });

});

Route::get('/', function(){
    return redirect()->route('admin.dashboard');
})->name('home');


Route::get('qr-code-g', function () {
  
    $qr_code = rand(111,99999);
    $file = "image/$qr_code.png";

    $link = "https://qrmenu.summitp.com.np/menu/$qr_code";
      \QRCode::text($link)->setErrorCorrectionLevel("H")->setOutfile($file)->png();




//   return view('qrCode');
});


