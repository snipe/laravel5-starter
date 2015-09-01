<?php namespace App\Services;

use DB;
use Config;

class Validator extends \Illuminate\Validation\Validator {

    public function validateNotBlacklisted($attribute, $value, $parameters){
        if (Config::get('app.check_blacklist')) {
            $blacklisted = DB::select('select * FROM domain_blacklist WHERE RIGHT(?,LENGTH(domain))=domain', array($value));
            return count($blacklisted) == 0;
        } else {
            return true;
        }
    }

}
