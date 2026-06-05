<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotParkir extends Model
{
    protected $table = 'slot_parkir';
    protected $primaryKey = 'id_slot';
    public $timestamps = false;

    protected $fillable = ['kode_slot', 'status'];
}