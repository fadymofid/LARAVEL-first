<?php

namespace App\Http\Controllers;

use App\Events\SaveProductEvent;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProductControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function index()
    {
        // Fetch products with related images
        $products = products::query()->with('images')->get();

        // Return the view with products data
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $title = 'Create';
        $routeName = ['products.store'];
        return view('products.save', ['title' => $title, 'routeName' => $routeName, 'edit' => false]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'info' => 'required|string',
            'price' => 'required|numeric',
            'images.*' => 'nullable|image',
        ]);

        event(new SaveProductEvent($request->except('images'), $request->file('images')));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        // Fetch the product by its ID, including related images
        $product = products::query()->with('images')->find($id);

        // Check if the product exists and if the user has permissions
        if ($product == null || $product->user_id != auth()->id() || auth()->user()->type != 'admin') {
            return redirect()->to('/products');
        }

        // Set the title and the route for the update
        $title = 'Edit';
        $routeName = ['products.update', $product->id];

        // Pass 'edit' as true since this is the edit form
        return view('products.save', compact('title', 'routeName', 'edit', 'product'))->with('edit', true);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        $product = products::query()->with('images')->find($id);

        if (($product->images->count() == 0) && !$request->hasFile('images')) {
            return redirect()->back()->withErrors(['error' => 'You should upload at least one image']);
        }

        $basic_data = $request->except('images');
        $basic_data['id'] = $id;
        $basic_data['user_id'] = $product->user_id;

        event(new SaveProductEvent($basic_data, $request->file('images') ?? [], false));
        DB::commit();

        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
