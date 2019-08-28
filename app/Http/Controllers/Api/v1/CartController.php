<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Transformers\CartTransformer;

class CartController extends APIController
{
    /**
     * @var App\Services\CartService
     */
    private $cartService;

    /**
     * @var App\Transformers\CartTransformer
     */
    protected $cartTransformer;

    public function __construct(CartTransformer $cartTransformer)
    {
        parent::__construct();

        $this->cartService = new CartService($this->shop, $this->facebookUserId);
        $this->cartTransformer = $cartTransformer;
    }

    /**
     * Get the cart contents.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        $contents = $this->cartService->contents();

        $response = [
            'status' => 'success',
            'data' => $this->cartTransformer->transformCart($contents)
        ];

        return $this->response($response);
    }

    /**
     * Add product to the cart.
     * 
     * @param Request $request [description]
     */
    public function store(Request $request) 
    {
        // Check the shop status
        if(!$this->shop->IsShopOpened) {
            $response = [
                'status' => 'error',
                'code' => 30,
                'message' => 'Store is closed now. Please try later.'
            ];

            return $this->response($response);
        }

        // Product quantity must not be greate than 10.
        if($request->input('quantity') > 11) {
            $response = [
                'status' => 'error',
                'code' => 20,
                'message' => 'Please try adding quantity less than 10'
            ];

            return $this->response($response);
        }

        $input = $request->all();

        $product = $this->shop->products()
                        ->findOrFail($input['product_id']);

        if($this->cartService->add($product, $input['quantity'])) {
            $response = [
                'status' => 'success',
                'message' => $input['quantity'] . ' ' . $product->name . ' added to your cart.',
                'data' => []
            ];

            return $this->response($response);
        }
    }

    /**
     * Clear the cart.
     * 
     * @return [type] [description]
     */
    public function destroy(Request $request) 
    {
        if($this->cartService->clear()) {
            $response = [
                'status' => 'success',
                'message' => 'Your shopping cart has been cleared.',
                'data' => []
            ];

            return $this->response($response);
        }

        $response = [
            'status' => 'error',
            'message' => 'Your shopping cart is empty.',
            'data' => []
        ];

        return $this->response($response);
    }

    /**
     * Remove a product from the cart.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function remove(Request $request) 
    {
        $product = $this->shop
                        ->products()
                        ->findOrFail($request->input('product_id'));

        if($this->cartService->remove($product)) {
            $response = [
                'status' => 'success',
                'message' => $product->name . ' removed from your cart.',
                'data' => []
            ];

            return $this->response($response);
        }

        $response = [
            'status' => 'error',
            'message' => $product->name . ' not found in your cart.',
            'data' => []
        ];

        return $this->response($response);
    }
}
