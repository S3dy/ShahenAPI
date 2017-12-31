<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::post('/test', function (Request $request) {
//     return "ok";
// });



Route::post('/register','registerController@insert');

Route::post('/free_reg','registerController@free_lancer_insert');

Route::post('/log','loginController@check');

Route::post('/provider_facebook','socialController@pro_fb');

Route::post('/freelancer_facebook','socialController@free_fb');

Route::post('/provider_twitter','socialController@pro_tw');

Route::post('/freelancer_twitter','socialController@free_tw');

Route::post('/provider_google','socialController@pro_go');

Route::post('/freelancer_google','socialController@free_go');

Route::post('/login_facebook','socialController@login_fb');
// Route::post('/login_facebook',function(){
// 	return "ok";
// });

Route::post('/login_twitter','socialController@login_tw');

Route::post('/login_google','socialController@login_go');

Route::post('/mail','mailController@insert');

Route::post('/code','mailController@check');

Route::post('/update','mailController@update');

Route::post('/search','SearchController@index');
// Route::post('/port',function(){
// 	return "ok";
// });

Route::post('/port','MyProfileControl@portfolio');

Route::post('/changepassword','ChangePasswordController@change');



Route::post('/cert','MyProfileControl@certificate');

Route::post('/emp','MyProfileControl@employment');

Route::post('/school','MyProfileControl@school');

Route::post('/info','ContactInfoController@retrieve');

Route::post('/job_post','postjobcontroller@insert');

Route::post('/job_view','postjobcontroller@view');

Route::post('/prof_view','MyProfileControl@prof_view');

Route::post('/other','MyProfileControl@otherExp');

Route::post('/avail','MyProfileControl@avail');

Route::post('/lang','MyProfileControl@lang');

Route::post('/settings','MyProfileControl@settings');

Route::get('/free','SearchController@free');

Route::post('/video','MyProfileControl@video');

Route::post('/desc','MyProfileControl@desc');

Route::post('/titl','MyProfileControl@titl');

Route::post('/rate','MyProfileControl@rate');

Route::post('/job_det','postjobcontroller@jobfeed');

Route::post('/select','viewController@select');

Route::post('/proposal','postjobcontroller@proposal');

Route::post('/message','SearchController@message');

Route::post('/mes','SearchController@mes');

Route::post('/free_msg','SearchController@free_msg');

Route::post('/profview','MyProfileControl@profview');

Route::post('/filter','filterController@filter');

Route::post('/add_card','paymentController@add_card');

Route::post('/prop_count','proposalController@prop_count');

Route::post('/pro_view','providerProfileController@view');


Route::get('/free1','freelansignup@view');

Route::post('/free2','freelansignup@freelancer');

// Route::post('/free2',function(){
// 	return "ok";
// });

Route::post('/provide_view','providectrl@view');

Route::post('/job','jobctrl@view');
// Route::post('/job',function(){
// 	return "ok";
// });


Route::post('/pro_job_view','postjobcontroller@pro_job_view');

Route::post('/pro_add_card','paymentController@pro_add_card');

Route::post('/free_accept_msg','proposalController@free_accept_msg');

Route::post('/prov_pay','paymentController@prov_pay');

Route::post('/providerpay','providerpayctrl@index');

Route::post('/message_view','msgctrl@view');

Route::post('/mess_free','msgctrl@index');

Route::post('/mes_view','msgctrl@update');

Route::post('/message_free','msgctrl@ind');



Route::post('/skills','MyProfileControl@skills');

Route::post('/pro_chg_pass','ChangePasswordController@pro_change');







// Route::post('/mes',function(){
// 	return "hi";
// });


// Route::post('proposal',function(){
// 	return "ok";
// });

// Route::post('/info',function(Request $req){
// 	return $req->name;
// });
 

// Route::post('/facebook',function(Request $req)
// 	{
// 		return $req->facebook_id; 
// 	});

// Route::post('/search',function(Request $req)
//  	{
//  		return $req->word; 
//  		//return "ok";
//  	});

//Provider Profile
Route::post('/pro_name','providerProfileController@pro_name');
Route::post('/pro_email','providerProfileController@pro_email');
Route::post('/pro_cname','providerProfileController@pro_cname');
Route::post('/pro_add','providerProfileController@pro_add');
Route::post('/pro_zone','providerProfileController@pro_zone');
Route::post('/pro_phone','providerProfileController@pro_phone');
Route::post('/pro_vat','providerProfileController@pro_vat');

Route::post('/pro_prop_count','proposalController@provider_prop_count');


//admin
Route::post('/finance','providectrl@finance');
//Route::get('/finance',function(){
//	return "ok";
//});


Route::post('/after_pay','providectrl@after_pay');

// delete my_profile_details--freelancer
Route::post('/del_port','MyProfileControl@del_portfolio');

Route::post('/del_cert','MyProfileControl@del_certificate');

Route::post('/del_emp','MyProfileControl@del_employment');

Route::post('/del_school','MyProfileControl@del_school');


Route::post('/del_other','MyProfileControl@del_otherExp'); 


Route::get('/free_id','viewController@freelancer_view');

Route::get('/job_id','viewController@job_view');

// Route::post('/mes_view','msgctrl@update');

Route::post('/message_free','msgctrl@ind');

Route::post('/cerdel','MyProfileControl@cerdel'); 

Route::post('/savedet','MyProfileControl@savedet');

Route::post('/profpic','MyProfileControl@imgpic');

Route::post('/providerpic','MyProfileControl@providerimgpic');

Route::post('/pro_select','viewController@job_view');

Route::post('/display_bill','paymentController@display_bill');

Route::post('/pro_display_bill','paymentController@pro_display_bill');

Route::get('/fin','financeController@finance');

Route::post('/jobsearch','jobctrl@jobsearch');

Route::post('/pro_search','SearchController@pro_search');

Route::post('/free_search','SearchController@free_search');

Route::post('/comp_search','SearchController@comp_search');

Route::post('/finance_search','SearchController@finance_search');

Route::post('/bank_view','viewController@bank_view');

Route::post('/offerview','viewController@offerview');

Route::post('/socialpage','adminctrl@sitelinksocial');

Route::post('/mobileapp','adminctrl@sitelinkmobile');


Route::post('/siteview','adminctrl@siteview');


Route::post('/remember','rememberController@check');

Route::post('/msg','msg@insert');

Route::post('/msgcheck','msg@check');

Route::post('/tin','msg@tin');


Route::post('/addfoot','adminctrl@addfoot');

Route::post('/editfoot','adminctrl@editfoot');


Route::post('/footview','viewController@footview');

Route::post('/edit','viewController@edit');

Route::post('/delete','viewController@delete');

Route::post('/siteview1','viewController@siteview1');


Route::post('/footarea','viewController@footarea');



