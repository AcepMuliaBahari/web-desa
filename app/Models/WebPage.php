<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebPage extends Model
{
    public function villageProfile()
    {
        return $this->hasOne(VillageProfile::class);
    }
}
