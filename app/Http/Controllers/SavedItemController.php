<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Services\SavedItemService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SavedItemController extends Controller
{
    protected $savedItemService;

    public function __construct()
    {
        $this->savedItemService = new SavedItemService();
    }

    public function index()
    {
        $savedItems = $this->savedItemService->all();
        return view('customers.saved-item', compact('savedItems'));
    }

    public function saveItem(CartRequest $request): JsonResponse
    {
        try {
            $this->savedItemService->save($request);
            return response()->json(
                ['message' => 'Product added to wishlist.'],
                200
            );
        } catch (ModelNotFoundException $ex) {
            return response()->json(
                ['status' => 'error', 'message' => 'Product not added to wishlist'],
                400
            );
        }
    }

    public function removeItem(Request $request): JsonResponse
    {
        try {
            $this->savedItemService->delete($request);
            return response()->json(
                ['message' => 'Product removed from wishlist.'],
                200
            );
        } catch (ModelNotFoundException $ex) {
            return response()->json(
                ['status' => 'error', 'message' => 'Product not removed from wishlist'],
                400
            );
        }
    }
}
