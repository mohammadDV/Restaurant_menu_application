<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Service\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function save(Request $request) {

        return response()->json($this->orderService->saveOrder($request->input('data'),intval($request->input('table_id',0))));
    }

    public function index(Request $request) {

        $page           = intval($request->input("page"));
        $offset         = intval($request->input("offset",2));
        $data["count"]  = ceil($this->orderService->count() / $offset);
        $data["data"]   = $this->orderService->get($page,$offset);
        return $data;
    }

    public function change_status(Order $order,Request $request) {

        $update = $this->orderService->updateStatus($order,intval($request->input("status")));

        if($update){
            return [
                'status'    => 1,
                'message'   => __("Your order has been successfully changed.")
            ];
        }

        return [
            'status'    => 0,
            'message'   => __("Update has problem.")
        ];


    }
}
