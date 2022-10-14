<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function details() {
        return $this->hasMany(OrderDetails::class);
    }

    public function details_with_food() {
        return $this->hasMany(OrderDetails::class)->with('food');
    }

    public function changeStatus(){

        switch($this->status) {
            case 1;
                $status = "Pending";
                break;
            case 2;
                $status = "Preparing";
                break;
            case 3;
                $status = "Done";
                break;
            case 3;
                $status = "canceled";
                break;
            default;
                $status = "Pending";

        }

        return $status;
    }
}
