<?php

namespace App\Service\Order;

use App\Models\Addon;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderService {

    public function get(int $page,int $offset) : array {

        $page   = $page < 1 ? 0 : ($page * $offset) - $offset;
        $orders = Order::with('details_with_food')->orderBy("id","DESC")->take($offset)->skip($page)->get();

        $result = [];
        foreach ($orders as $key => $order){
            $result[$key]                   = $order;
            $result[$key]["title_status"]   = $order->changeStatus();
            $result[$key]["timestamp"]      = $order->created_at->diffforhumans();
            $result[$key]["details"]        = $order->details_with_food;
        }

        return $result;
    }

    public function updateStatus(Order $order,int $status)
    {
        return $order->update([
            "status" => $status
        ]);
    }

    public function saveOrder(array $orders,$table_id)
    {

        if(empty($orders)) {
            return [
                'status'    => 0,
                'message'   => __("Your order is empty")
            ];
        }

        $array      = [];
        $addonIds   = [];
        foreach($orders as $key => $order) {
            $order["count"]             = !empty($order["count"]) ? $order["count"] : 1;
            $array[$key]["food_id"]     = intval($order["id"]);
            $array[$key]["count"]       = intval($order["count"]);
            $array[$key]["addons"]      = !empty($order["addons"]) ? array_column($order["addons"],"id") : [];
            $array[$key]["addons"]      = !empty($order["addons"]) ? array_column($order["addons"],"id") : [];

            if(!empty($order["addons"])) {
                $addonIds = array_merge($addonIds,array_column($order["addons"],"id"));
            }
        }

        $foodIds    = array_unique(array_column($orders,"id"));
        $foods      = Food::whereIn("id",$foodIds)->get()->keyBy('id');
        $Addons     = Addon::whereIn("id",$addonIds)->get()->keyBy('id');

        $total  = 0;
        foreach($array as $key => $item) {
            $amount     = 0;
            $amount     += $item["count"] * $foods[$item["food_id"]]->amount;
            $addonsStr  = '';
            foreach($item["addons"] ?? [] as $addon_id){
                $amount     += $Addons[$addon_id]->amount;
                $addonsStr  .= $Addons[$addon_id]->title . ",";
            }

            $details[] = [
                "food_id"   => $item["food_id"],
                "amount"    => $amount,
                "count"     => $item["count"],
                "status"    => 1,
                "addons"   => trim($addonsStr,', '),
            ];

            $total += $amount;
        }

        $orderCreated = Order::create([
            "count"     => count($orders),
            "amount"    => $total,
            "table_id"  => $table_id,
            "status"    => 1,
            "user_id"   => 1,
        ]);

        if(!$orderCreated){
            return [
                'status'    => 0,
                'message'   => __("Error in save order")
            ];
        }

        foreach($details as $detail){
            $orderdetails = OrderDetails::create([
                "order_id"  => $orderCreated->id,
                "food_id"   => $detail["food_id"],
                "amount"    => $detail["amount"],
                "count"     => $detail["count"],
                "status"    => $detail["status"],
                "addons"    => $detail["addons"],
            ]);
            if(!$orderdetails) {
                return [
                    'status'    => 0,
                    'message'   => __("Error in save order details")
                ];
            }
        }

        return [
            'status'    => 1,
            'message'   => __("Your order has been successfully registered.")
        ];;

    }

    public function count() : int {
        return Order::count();
    }

}
