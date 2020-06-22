<?php
//
// enhanced to-do
// WHMCS hook to enrich details about services managed by auto-release module
//
// https://domainregister.international/
//

add_hook('AfterCronJob', 100, function($vars) {

try {
    $todoitem = Capsule::table('tbltodolist')
        ->where('status', '!=', 'Completed')
        ->where('description', 'like', 'Service ID # %')
        ->select('id','description')
        ->first();
echo   "<pre>"; print_r($todoitem);      
    
} catch (\Exception $e) {
    echo "error {$e->getMessage()}";
}

$descr2=substr($todoitem->description,12);
$serviceid=intval($descr2);
$descr3=preg_replace( '/Service ID # \d+/', '', $todoitem->description );


try {
    $servicename = Capsule::table('tblhosting')
        ->where("id", $serviceid)
        ->select('domain')
        ->first();
    echo   "<pre>"; print_r($servicename);     

} catch(\Illuminate\Database\QueryException $ex){
    echo $ex->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

$newdescription = 'Service ID #'.$serviceid.' ( '.$servicename->domain.' ) '.$descr3.PHP_EOL.$todoitem->description;

try {
    $update_data =  [
        'description' => $newdescription 
    ];
    Capsule::table('tbltodolist')
       ->where('id', '=', $todoitem->id)
       ->update($update_data);
} catch(\Illuminate\Database\QueryException $ex){
    echo $ex->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

});
