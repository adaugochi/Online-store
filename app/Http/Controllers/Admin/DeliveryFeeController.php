<?php

namespace App\Http\Controllers\Admin;

use App\helpers\Messages;
use App\Http\Repositories\DeliveryFeeRepository;
use App\Http\Requests\DeliveryFeeRequest;
use Illuminate\Database\QueryException;

class DeliveryFeeController extends BaseAdminController
{
    protected $deliveryFeeRepository;

    public function __construct()
    {
        $this->deliveryFeeRepository = new DeliveryFeeRepository();
    }

    public function index()
    {
        $fees = $this->deliveryFeeRepository->findAll();
        return view('admin.delivery-fee.index', compact('fees'));
    }

    public function create(DeliveryFeeRequest $request)
    {
        try {
            if ($request->get('id')) {
                $result = $this->deliveryFeeRepository->update([
                    'country' => $request->get('country'),
                    'amount' => $request->get('amount')
                ], $request->get('id'));

            } else {
                $result = $this->deliveryFeeRepository->insert([
                    'country' => $request->get('country'),
                    'amount' => $request->get('amount')
                ]);
            }

            if($result) {
                return redirect(route('admin.delivery-fee'))->with([
                    'success' =>  Messages::getSuccessMessage('fee', 'added')
                ]);
            }
        } catch (QueryException $ex) {
            return redirect(route('admin.delivery-fee'))->with(['error' =>  'Country already exist']);
        }
        return redirect(route('admin.delivery-fee'))->with(['error' =>  'could not save this entry']);

    }
}
