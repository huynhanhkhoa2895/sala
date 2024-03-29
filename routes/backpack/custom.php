<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('color', 'ColorCrudController');
    Route::crud('wedding_invitation', 'Wedding_invitationCrudController');
    Route::crud('style', 'StyleCrudController');
    Route::crud('order', 'OrderCrudController');
    // Route::crud('order/detail/{order_id}', 'OrderDetailCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('banner', 'BannerCrudController');
}); // this should be the absolute last line of this file