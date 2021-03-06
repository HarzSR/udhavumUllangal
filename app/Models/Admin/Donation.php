<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    public function donorDetails()
    {
        //

        return $this->belongsTo(Donor::class, 'id');
    }
}
