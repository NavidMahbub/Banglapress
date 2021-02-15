<?php

use Illuminate\Http\Request;

// use Sentinel;

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

use App\Http\Middleware\AdminMiddleware;


Route::post('login','RegisterLoginPasswordResetController@login');

Route::middleware('auth:api')->post('/user', function () {
    $user = Auth()->user();
    return $user;
    return response()->json([
		'user' =>[
			'name' =>'rafi',
			'age' =>23
		]
	]);
});
// })->middleware(AdminMiddleware::class);
// Route::post('/register','AuthController@register');

Route::prefix('contacts')->middleware(['auth:api','admin'])->group(function() {

	Route::post('/','ContactController@store');
	Route::put('/','ContactController@store');
	Route::delete('/{id}','ContactController@destroy');
});

Route::prefix('category')->middleware(['auth:api','admin'])->group(function() {

	Route::post('/','ProjectCategoryController@store');
	Route::put('/','ProjectCategoryController@store');
	Route::delete('/{id}','ProjectCategoryController@destroy');
    
});

Route::prefix('project')->middleware(['auth:api','admin'])->group(function() {
	
	Route::post('/','ProjectController@store');
	Route::put('/','ProjectController@store');
	Route::delete('/{id}','ProjectController@destroy');
    
});

Route::prefix('purpose')->middleware(['auth:api','admin'])->group(function() {
	
	Route::post('/','PurposeController@store');
	Route::put('/','PurposeController@store');
	Route::delete('/{id}','PurposeController@destroy');
    
});

Route::prefix('income')->middleware(['auth:api','admin'])->group(function() {
	
	Route::post('/','IncomeController@store');
	Route::put('/','IncomeController@store');
	Route::delete('/{id}','IncomeController@destroy');
    
});

Route::prefix('expense')->middleware(['auth:api','admin'])->group(function() {
	
	Route::post('/','ExpenseController@store');
	Route::put('/','ExpenseController@store');
	Route::delete('/{id}','ExpenseController@destroy');
    
});

// Route::prefix('role')->middleware(['auth:api'])->group(function() {
	
// 	Route::post('/','RoleController@store');
// 	Route::put('/','RoleController@update');
// 	Route::delete('/{id}','RoleController@destroy');
    
// });

Route::prefix('invoice')->middleware(['auth:api','admin'])->group(function() {
	
	Route::post('/','Invoice\InvoiceController@store');
	Route::put('/','Invoice\InvoiceController@store');
	Route::delete('/{id}','Invoice\InvoiceController@destroy');
	
    
});

Route::prefix('payment-receive')->middleware(['auth:api','admin'])->group(function() {
	
	Route::post('/','PaymentReceiveController@store');
	Route::put('/','PaymentReceiveController@store');
	Route::delete('/{id}','PaymentReceiveController@destroy');
    
});

Route::prefix('api')->middleware(['auth:api'])->group(function() {

	Route::get('/user/info','ContactController@user');
	Route::get('/contacts','ContactController@index');
	Route::get('/contacts/show/{id}','ContactController@show');
	Route::get('/contacts/details/{id}','ContactController@details');
	Route::get('/specific/contacts/{type}','ContactController@specificContact');
    Route::post('/contacts/pagination','ContactController@pagination');

    Route::get('/project-category','ProjectCategoryController@index');
	Route::post('/project-category/pagination','ProjectCategoryController@pagination');

	Route::post('/projects','ProjectController@index');
	Route::get('/project-all','ProjectController@allProject');

	Route::get('/purpose','PurposeController@index');
	Route::post('/purpose/pagination','PurposeController@pagination');

    Route::get('/parent-account','AccountController@parentAccount');
	Route::get('/account-type/{id}','AccountController@accountType');

	Route::post('/incomes','IncomeController@index');

	Route::post('/invoices','Invoice\InvoiceController@index');

	Route::post('/expenses','ExpenseController@index');

	Route::get('/user-role','RoleController@index');
	Route::get('/user-role2','RoleController@index2');

	Route::get('/district','DistrictUpazilaController@district');
	Route::get('/upazila/{id}','DistrictUpazilaController@upazila');

	Route::get('/invoice/customer/visa/{id}','Recruiting\VisaController@customerVisa');
	
	Route::get('/unpaid/invoice/{id}','Invoice\InvoiceController@unpaidInvoice');
	
	Route::post('/payment-receive/all','PaymentReceiveController@index');

	Route::post('/installment-invoices','InstallmentController@intstallmentInvoice');
	Route::post('/installment-invoices-payment','InstallmentController@intstallmentPaymentInvoice');
	Route::post('/installment-payment','InstallmentController@intstallmentPayment');
    
});





Route::post('/api/visa','Recruiting\VisaController@index');

Route::prefix('api')->middleware(['auth:api'])->group(function() {
 //    Route::post('/contacts','ContactController@store');
	// Route::put('/contacts','ContactController@store');
	// Route::get('/contacts','ContactController@index');
 //    Route::post('/contacts/pagination','ContactController@pagination');
	// Route::delete('/contacts/{id}','ContactController@destroy');

	Route::post('/visa/store','Recruiting\VisaController@store');
	Route::get('/visa/delete/{id}','Recruiting\VisaController@delete');
	Route::get('/visa/show/{id}','Recruiting\VisaController@show');
	Route::get('/visa/getlastid/{type}','Recruiting\VisaController@getlastid');

	// Route::get('/project-category','ProjectCategoryController@index');
	// Route::post('/project-category/pagination','ProjectCategoryController@pagination');
	// Route::get('/project-category','ProjectCategoryController@index');
	// Route::post('/project-category','ProjectCategoryController@store');
	// Route::put('/project-category','ProjectCategoryController@store');
	// Route::delete('/project-category/{id}','ProjectCategoryController@destroy');

	// Route::post('/projects','ProjectController@index');
	// Route::post('/project','ProjectController@store');
	// Route::put('/project','ProjectController@store');
	// Route::delete('/project/{id}','ProjectController@destroy');

	// Route::get('/purpose','PurposeController@index');
	// Route::post('/purpose/pagination','PurposeController@pagination');
	// Route::post('/purpose','PurposeController@store');
	// Route::put('/purpose','PurposeController@store');
	// Route::delete('/purpose/{id}','PurposeController@destroy');

	// Route::post('/incomes','IncomeController@index');
	// Route::post('/income','IncomeController@store');
	// Route::put('/income','IncomeController@store');
	// Route::delete('/income/{id}','IncomeController@destroy');

	// Route::post('/expenses','ExpenseController@index');
	// Route::post('/expense','ExpenseController@store');
	// Route::put('/expense','ExpenseController@store');
	// Route::delete('/expense/{id}','ExpenseController@destroy');


	Route::get('/test-access','TaxController@index');
    
});






//visa 


Route::get('/test', function () {
    return response()->json([
		'user' =>[
			'name' =>'rafi',
			'age' =>23
		]
	]);
});







