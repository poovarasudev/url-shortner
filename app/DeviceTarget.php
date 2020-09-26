<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

/**
 * Model for the Url table, used for advanced functions too.
 *
 * Class Url
 */
class DeviceTarget extends Model
{
    /**
     * @var string
     */
    protected $table = 'device_targets';

    public function enum()
    {
        return $this->hasOne(DeviceTargetsEnum::class, 'id', 'device');
    }
}
