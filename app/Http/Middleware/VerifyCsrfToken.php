<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "superAdmin/check-current-password",
        "admin/check-current-password",
        'admin/update-category-status',
        'admin/update-item-status',
        'admin/update-banner-status',
        'call-waiter',
        'admin/daily_report',
        '/admin/monthly_report',
        'search-post',
        'admin/ajax-food-table',
        '/admin/ajax-search-food',
        'admin/update-cart-item-quantity',
        '/admin/delete-cart-item',

        
    ];
}
