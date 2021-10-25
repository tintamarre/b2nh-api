<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;

class BaseEventModel extends Model
{
    public function getLabelFromHelper($key)
    {
        $helper = Helper::where('key', $key)->first();
        if (!$helper) {
            return null;
        }
        return $helper->description;
    }

    public function getDatetimesAttribute()
    {
        return [
      'updated_at'       => (string)$this->updated_at,
      'updated_at_diff'  => (string)$this->updated_at->diffForHumans(['parts' => 2]),
      'created_at'       => (string)$this->created_at,
      'created_at_diff'  => (string)$this->created_at->diffForHumans(['parts' => 2]),
    ];
    }


    public function getShortNameAttribute()
    {
        return (string)mb_strimwidth($this->name, 0, 60, "...");
    }


    public function getBasenameAttribute()
    {
        return class_basename($this);
    }


    public static function getSlug($value, $model)
    {
        $slug = str_slug($value);
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }


    public function getDateTimeAttribute()
    {
        return sprintf('%05d-%02d-%02d %02d:%02d:%02d', $this->year, $this->month, $this->day, $this->hour, $this->minute, $this->second);
    }
}
