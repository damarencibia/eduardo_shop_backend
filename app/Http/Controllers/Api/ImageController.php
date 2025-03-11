<?php

// app/Http/Controllers/Api/ImageController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Obtener todas las imágenes de un producto.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $images = $product->images;
        return response()->json($images);
    }

    /**
     * Obtener una imagen específica por ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/**
 * Obtener una imagen específica por ID.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($productId, $id)
{
    // Buscar el producto por ID
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    // Buscar la imagen por ID y asegurarse de que pertenezca al producto
    $image = $product->images()->find($id);

    if (!$image) {
        return response()->json(['message' => 'Imagen no encontrada o no pertenece al producto'], 404);
    }

    // Devolver la imagen con detalles adicionales
    return response()->json([
        'id' => $image->id,
        'path' => $image->path,
        'product_id' => $image->product_id,
        'created_at' => $image->created_at,
        'updated_at' => $image->updated_at,
    ]);
}

    /**
     * Crear una nueva imagen para un producto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'path' => 'required|url', // Aceptar una URL válida
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear la imagen en la base de datos usando la URL proporcionada
        $image = $product->images()->create([
            'path' => $request->input('path'), // Guardar la URL directamente
        ]);

        return response()->json($image, 201);
    }

    /**
     * Actualizar una imagen existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/**
 * Actualizar una imagen existente.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $productId
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $productId, $id)
{
    // Buscar el producto por ID
    $product = Product::find($productId);

    if (!$product) {
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    // Buscar la imagen por ID y asegurarse de que pertenezca al producto
    $image = $product->images()->find($id);

    if (!$image) {
        return response()->json(['message' => 'Imagen no encontrada o no pertenece al producto'], 404);
    }

    // Validar los datos de entrada
    $validator = Validator::make($request->all(), [
        'path' => 'required|url', // Aceptar una URL válida
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    // Actualizar la URL de la imagen
    $image->update([
        'path' => $request->input('path'),
    ]);

    return response()->json($image);
}

    /**
     * Eliminar una imagen.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json(['message' => 'Imagen no encontrada'], 404);
        }

        // Eliminar la imagen del almacenamiento
        Storage::delete(str_replace('/storage', 'public', $image->path));

        // Eliminar la imagen de la base de datos
        $image->delete();

        return response()->json(['message' => 'Imagen eliminada correctamente']);
    }
}
