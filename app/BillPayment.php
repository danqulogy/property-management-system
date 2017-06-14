<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    protected $appends = [
      'property_name'
    ];

    public function getPropertyNameAttribute(){
        return Property::find($this->attributes['property_id'])->name;
    }
}
