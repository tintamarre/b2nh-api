<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helper;

class BaseModel extends Model
{
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


    public function getClassBasenameAttribute()
    {
        return class_basename($this);
    }


    public static function getSlug($value, $model)
    {
        $slug = str_slug($value);
        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get());
        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}
