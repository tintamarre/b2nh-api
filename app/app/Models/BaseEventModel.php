<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;
use App\Models\BaseModel;

class BaseEventModel extends BaseModel
{
    public function getLabelFromHelper($key)
    {
        $helper = Helper::where('key', $key)->first();
        if (!$helper) {
            return null;
        }
        return $helper->description;
    }

 
    public function getDateTimeAttribute()
    {
        return sprintf('%05d-%02d-%02d %02d:%02d:%02d', $this->year, $this->month, $this->day, $this->hour, $this->minute, $this->second);
    }
}
