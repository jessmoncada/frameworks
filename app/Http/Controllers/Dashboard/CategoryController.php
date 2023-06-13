<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*  if(!Auth::user()->hasPermissionTo('editor.category.index')){
            return abort(403);
        }
 */
        $categories = Category::paginate(2);
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        /* if (!Gate::allows('create', $post)) {
            abort(403);
        } */
        return view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('category.index')->with('status', 'Nueva categoría creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('category.index')->with('status', 'Categoría actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        /* if(!Auth::user()->hasPermissionTo('editor.category.destroy')){
            return abort(403);
        } */

        $category->delete();
        return to_route("category.index")->with('status', "Registro eliminado.");
    }
}
