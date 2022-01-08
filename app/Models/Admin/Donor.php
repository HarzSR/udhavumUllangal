<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    public function donationDetails()
    {
        //

        return $this->hasMany(Donation::class, "donor_id");
    }
}
