<?php

// app/Http/Controllers/Api/ProductController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Obtener todos los productos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category', 'subcategory'])->get();
        return response()->json($products);
    }

    /**
     * Obtener un producto específico por ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['category', 'subcategory'])->find($id);

        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($product);
    }

    /**
     * Crear un nuevo producto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|unique:products|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|integer|min:0',
            'state' => 'required|string|max:255',
            'dimension' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|string|max:255',
            'ability' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear el producto
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    /**
     * Actualizar un producto existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'code' => 'sometimes|string|unique:products,code,' . $product->id . '|max:255',
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|numeric|min:0',
            'amount' => 'sometimes|integer|min:0',
            'state' => 'sometimes|string|max:255',
            'dimension' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|string|max:255',
            'ability' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'subcategory_id' => 'sometimes|exists:subcategories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Actualizar el producto
        $product->update($request->all());

        return response()->json($product);
    }

    /**
     * Eliminar un producto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Eliminar el producto
        $product->delete();

        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}
