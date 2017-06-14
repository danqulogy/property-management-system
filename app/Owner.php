<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $appends = [ 'full_name', 'number_of_props'];

    public function getNumberOfPropsAttribute(){
        return count(Property::where('owner_id', $this->attributes['id'])->get());
    }

    public function getFullNameAttribute(){
        return $this->attributes['first_name'].' '.  $this->attributes['other_names'];
    }
}
