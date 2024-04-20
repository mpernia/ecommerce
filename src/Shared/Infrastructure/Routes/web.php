<?php

use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\ChangePasswordController;
use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\ChangeProfileController;
use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\ChangeTwoFactorController;
use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\ForgotPasswordController;
use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\LoginController;
use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\RegisterController;
use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\TwoFactorController;
use Ecommerce\BoundedContext\Auth\Infrastructure\Controllers\UserVerificationController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\AdvertiserController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\AdvertiserReportController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\AdvertiserStatusController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\AffiliateCampaignController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\AffiliateController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\AffiliateStatusController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\ApiUserController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\AuditLogsController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\CampaignController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\ContentCategoryController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\ContentPageController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\ContentTagController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\CurrencyController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\DashboardController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\DocumentController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\FaqCategoryController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\FaqQuestionController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\FavoriteProductController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\IncomeSourceController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\KnownHostController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\LeadController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\NoteController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\PermissionsController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\ProductCategoryController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\ProductController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\ProductTagController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\RolesController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\SaleController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\SearchHistoryController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\StoreController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\StoreStatusController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\TransactionController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\TransactionTypeController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\UserAlertsController;
use Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\UsersController;
use Ecommerce\BoundedContext\Frontend\Infrastructure\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'frontend.home');
Route::get('userVerification/{token}', [UserVerificationController::class, 'approve'])->name('userVerification');

Route::group([], function (){
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm']);
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
});

Route::group(['prefix' => 'backoffice', 'as' => 'backoffice.', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);

    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    Route::delete('user-alerts/destroy', [UserAlertsController::class, 'massDestroy'])->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', [UserAlertsController::class, 'read']);
    Route::resource('user-alerts', UserAlertsController::class)->except(['edit', 'update']);

    Route::delete('api-users/destroy', [ApiUserController::class, 'massDestroy'])->name('api-users.massDestroy');
    Route::resource('api-users', ApiUserController::class);

    Route::delete('known-hosts/destroy', [KnownHostController::class, 'massDestroy'])->name('known-hosts.massDestroy');
    Route::resource('known-hosts', KnownHostController::class);

    Route::resource('audit-logs', AuditLogsController::class)->only(['index', 'show']);

    Route::delete('faq-categories/destroy', [FaqCategoryController::class, 'massDestroy'])->name('faq-categories.massDestroy');
    Route::resource('faq-categories', FaqCategoryController::class);

    Route::delete('faq-questions/destroy', [FaqQuestionController::class, 'massDestroy'])->name('faq-questions.massDestroy');
    Route::resource('faq-questions', FaqQuestionController::class);

    Route::delete('product-categories/destroy', [ProductCategoryController::class, 'massDestroy'])->name('product-categories.massDestroy');
    Route::post('product-categories/media', [ProductCategoryController::class, 'storeMedia'])->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', [ProductCategoryController::class, 'storeCKEditorImages'])->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', ProductCategoryController::class);

    Route::delete('product-tags/destroy', [ProductTagController::class, 'massDestroy'])->name('product-tags.massDestroy');
    Route::resource('product-tags', ProductTagController::class);

    Route::delete('products/destroy', [ProductController::class, 'massDestroy'])->name('products.massDestroy');
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
    Route::post('products/ckmedia', [ProductController::class, 'storeCKEditorImages'])->name('products.storeCKEditorImages');
    Route::resource('products', ProductController::class);

    Route::delete('content-categories/destroy', [ContentCategoryController::class, 'massDestroy'])->name('content-categories.massDestroy');
    Route::post('content-categories/media', [ContentCategoryController::class, 'storeMedia'])->name('content-categories.storeMedia');
    Route::post('content-categories/ckmedia', [ContentCategoryController::class, 'storeCKEditorImages'])->name('content-categories.storeCKEditorImages');
    Route::resource('content-categories', ContentCategoryController::class);

    Route::delete('content-tags/destroy', [ContentTagController::class, 'massDestroy'])->name('content-tags.massDestroy');
    Route::resource('content-tags', ContentTagController::class);

    Route::delete('content-pages/destroy', [ContentPageController::class, 'massDestroy'])->name('content-pages.massDestroy');
    Route::post('content-pages/media', [ContentPageController::class, 'storeMedia'])->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', [ContentPageController::class, 'storeCKEditorImages'])->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', ContentPageController::class);

    Route::delete('currencies/destroy', [CurrencyController::class, 'massDestroy'])->name('currencies.massDestroy');
    Route::resource('currencies', CurrencyController::class);

    Route::delete('transaction-types/destroy', [TransactionTypeController::class, 'massDestroy'])->name('transaction-types.massDestroy');
    Route::resource('transaction-types', TransactionTypeController::class);

    Route::delete('income-sources/destroy', [IncomeSourceController::class, 'massDestroy'])->name('income-sources.massDestroy');
    Route::resource('income-sources', IncomeSourceController::class);

    Route::delete('advertiser-statuses/destroy', [AdvertiserStatusController::class, 'massDestroy'])->name('advertiser-statuses.massDestroy');
    Route::resource('advertiser-statuses', AdvertiserStatusController::class);

    Route::delete('store-statuses/destroy', [StoreStatusController::class, 'massDestroy'])->name('store-statuses.massDestroy');
    Route::resource('store-statuses', StoreStatusController::class);

    Route::delete('advertisers/destroy', [AdvertiserController::class, 'massDestroy'])->name('advertisers.massDestroy');
    Route::resource('advertisers', AdvertiserController::class);

    Route::delete('stores/destroy', [StoreController::class, 'massDestroy'])->name('stores.massDestroy');
    Route::resource('stores', StoreController::class);

    Route::delete('notes/destroy', [NoteController::class, 'massDestroy'])->name('notes.massDestroy');
    Route::resource('notes', NoteController::class);

    Route::delete('documents/destroy', [DocumentController::class, 'massDestroy'])->name('documents.massDestroy');
    Route::post('documents/media', [DocumentController::class, 'storeMedia'])->name('documents.storeMedia');
    Route::post('documents/ckmedia', [DocumentController::class, 'storeCKEditorImages'])->name('documents.storeCKEditorImages');
    Route::resource('documents', DocumentController::class);

    Route::delete('transactions/destroy', [TransactionController::class, 'massDestroy'])->name('transactions.massDestroy');
    Route::resource('transactions', TransactionController::class);

    Route::delete('advertiser-reports/destroy', [AdvertiserReportController::class, 'massDestroy'])->name('advertiser-reports.massDestroy');
    Route::resource('advertiser-reports', AdvertiserReportController::class);

    Route::delete('campaigns/destroy', [CampaignController::class, 'massDestroy'])->name('campaigns.massDestroy');
    Route::resource('campaigns', CampaignController::class);

    Route::delete('affiliate-statuses/destroy', [AffiliateStatusController::class, 'massDestroy'])->name('affiliate-statuses.massDestroy');
    Route::resource('affiliate-statuses', AffiliateStatusController::class);

    Route::delete('affiliates/destroy', [AffiliateController::class, 'massDestroy'])->name('affiliates.massDestroy');
    Route::resource('affiliates', AffiliateController::class);

    //Route::resource('preferences', PreferenceController::class);
/*
    Route::delete('profiles/destroy', [ProfileController::class, 'massDestroy'])->name('profiles.massDestroy');
    Route::post('profiles/media', 'ProfileController@storeMedia')->name('profiles.storeMedia');
    Route::post('profiles/ckmedia', 'ProfileController@storeCKEditorImages')->name('profiles.storeCKEditorImages');
    Route::resource('profiles', 'ProfileController');
*/
    Route::delete('favorite-products/destroy', [FavoriteProductController::class, 'massDestroy'])->name('favorite-products.massDestroy');
    Route::resource('favorite-products', FavoriteProductController::class);

    Route::delete('search-histories/destroy', [SearchHistoryController::class, 'massDestroy'])->name('search-histories.massDestroy');
    Route::resource('search-histories', SearchHistoryController::class);

    Route::delete('affiliate-campaigns/destroy', [AffiliateCampaignController::class, 'massDestroy'])->name('affiliate-campaigns.massDestroy');
    Route::resource('affiliate-campaigns', AffiliateCampaignController::class);

    Route::delete('leads/destroy', [LeadController::class, 'massDestroy'])->name('leads.massDestroy');
    Route::resource('leads', LeadController::class);

    Route::delete('sales/destroy', [SaleController::class, 'massDestroy'])->name('sales.massDestroy');
    Route::resource('sales', SaleController::class);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth', '2fa']], function () {
    if (file_exists(authControllerPath('ChangePasswordController'))) {
        Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class, 'update'])->name('password.update');
        Route::post('password/destroy', [ChangePasswordController::class, 'destroy'])->name('password.destroyProfile');
    }
    Route::get('/', [ChangeProfileController::class, 'edit'])->name('edit');
    Route::post('/', [ChangeProfileController::class, 'update'])->name('update');
    Route::get('two-factor', [ChangeTwoFactorController::class, 'edit'])->name('editTwoFactor');
    Route::post('two-factor', [ChangeTwoFactorController::class, 'activate'])->name('toggleTwoFactor');
});

Route::group(['as' => 'frontend.', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::group([], function () {
        Route::get('account', function () {
            return 'My Account';
        });
    });

    //Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    //Route::post('toggle-two-factor', [ProfileController::class, 'toggleTwoFactor'])->name('profile.toggle-two-factor');
});
Route::group(['middleware' => ['auth', '2fa']], function () {
    if (file_exists(authControllerPath('TwoFactorController'))) {
        Route::get('two-factor', [TwoFactorController::class, 'show'])->name('twoFactor.show');
        Route::post('two-factor', [TwoFactorController::class, 'check'])->name('twoFactor.check');
        Route::get('two-factor/resend', [TwoFactorController::class, 'resend'])->name('twoFactor.resend');
    }
});
