<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Purchase;
use App\Order;
use App\Waste;
use App\Expense;
use App\Attendance;
use App\Miscellaneous;

class ReportController extends Controller
{
    public function dailySummaryReport()
    {
        $purchase = Purchase::with('supplierName')->get();
        $supplierDuePurchase = Purchase::with('supplierName')->where('due', "!=", "")->get();
        $sales = Order::with('customer')->get();
        $customerDueOrder = Order::with('customer')->where('due', "!=", "")->get();
        $expense = Expense::with('ingredientCategory', 'waste')->get();
        $waste = Waste::get();
        Session::flash('page', 'daily_sale_report');
        return view('admin.report.daily_summary_report', compact('purchase', 'supplierDuePurchase', 'sales', 'customerDueOrder', 'expense', 'waste'));
    }
    public function purchaseReport()
    {
        $purchase = Purchase::with('supplierName', 'purchase_item')->get();
        $supplierDuePurchase = Purchase::with('supplierName', 'purchase_item')->where('due', "!=", "")->get();
        Session::flash('page', 'purchase_report');
        return view('admin.report.purchase_report', compact('purchase','supplierDuePurchase'));
    }

    public function attendanceReport()
    {
        $attendance = Attendance::with('admin')->get();
        Session::flash('page', 'attendance_report');
        return view('admin.report.attendance_report',compact('attendance'));
    }
    public function saleReport()
    {
        $sales = Order::with('customer','ordrDetails')->get();
        Session::flash('page', 'sale_report');
        return view('admin.report.sale_report',compact('sales'));
    }

    public function miscellaneousReport()
    {
        $miscellaneous = Miscellaneous::get();
        Session::flash('page', 'miscellaneous_report');
        return view('admin.report.miscllaneous_report',compact('miscellaneous'));
    }

}
