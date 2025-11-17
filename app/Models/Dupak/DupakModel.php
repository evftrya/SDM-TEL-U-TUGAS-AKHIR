<?php

namespace App\Models\Dupak;

use Illuminate\Database\Eloquent\Model;

abstract class DupakModel extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'dupak';
}