// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
public function index()
{
$products = Product::all();
return response()->json($products);
}

public function store(Request $request)
{
$product = Product::create($request->all());
return response()->json($product, 201);
}

public function show($id)
{
$product = Product::findOrFail($id);
return response()->json($product);
}

public function update(Request $request, $id)
{
$product = Product::findOrFail($id);
$product->update($request->all());
return response()->json($product, 200);
}

public function destroy($id)
{
Product::findOrFail($id)->delete();
return response()->json('Product deleted successfully', 200);
}
}