<?php
use App\Models\Setting;

function getConfigvalueFromSettingTable($configKey){
    $setting = Setting::where('config_key', $configKey);
    if(!empty($setting)){
        return $setting->congfig_value;
    }
    return null;
}
