/* {{ ucfirst($model) }}s */
Route::get('/{{$model}}s', '{{ ucfirst($model) }}Controller@index')->middleware('permission:manageCommunications');
Route::post('/{{$model}}s', '{{ ucfirst($model) }}Controller@store')->middleware('permission:manageCommunications');
Route::get('/{{$model}}s/create', '{{ ucfirst($model) }}Controller@create')->middleware('permission:manageCommunications');
Route::get('/{{$model}}s/{{$l.$model.$r}}', '{{ ucfirst($model) }}Controller@show')->middleware('permission:manageCommunications');
Route::post('/{{$model}}s/{{$l.$model.$r}}', '{{ ucfirst($model) }}Controller@update')->middleware('permission:manageCommunications');
Route::post('/{{$model}}s/{{$l.$model.$r}}/delete', '{{ ucfirst($model) }}Controller@destroy')->middleware('permission:manageCommunications');
Route::get('/{{$model}}s/{{$l.$model.$r}}/edit', '{{ ucfirst($model) }}Controller@edit')->middleware('permission:manageCommunications');