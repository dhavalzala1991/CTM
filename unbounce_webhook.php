<?PHP
$time = date("Y-m-d H:i:s");
$ctmTrackerDatas = file_get_contents('php://input');
$ctmObject = json_decode($ctmTrackerDatas);
$cvars = json_decode($ctmObject->cvars);
$xp = $cvars[0]->ubPageId;
$v = $cvars[0]->ubVisitorId;
$ubConversionURL = 'http://t.unbounce.com/trk?v='.$v.'&xp='.$xp.'&g=convert';  // <-- here you prepare the UB conversion
$handle = fopen($ubConversionURL, "r"); // <-- here you trigger the UB conversion
error_log("\n".'['.$time.']'.$ctmTrackerDatas, 3, 'hook-log.log'); // for debbuging purpose
error_log("\n".'['.$time.']'.$ubConversionURL, 3, 'hook-log.log'); // for debbuging purpose
?>
