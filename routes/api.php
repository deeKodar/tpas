<?php

Route::get('class-section', 'ReportChartController@getClassSection');
//Route::get('articles/{article}', 'ArticleController@show');
//Route::get('/test',function(){
//    return "ok";
//});

//Route::middleware('auth')->get('/test', function () {
//    return "OK";
//});


Route::get('test',function(){
    return response([1,2,3,4],200);
});
