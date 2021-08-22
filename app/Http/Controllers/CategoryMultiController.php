<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryMultiRequest;
use App\Models\CategoryMulti;
use Faker\Core\Number;
use Illuminate\Http\Request;

class CategoryMultiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return CategoryMulti::withDepth()->with('ancestors')->get();
        // return CategoryMulti::all();

        // Full tree view i.e.,
        // - Root
        // -- Child 1
        // --- Sub child 1
        // -- Child 2
        // - Another root
        return CategoryMulti::withDepth()->with('ancestors')->get()->toTree();

        // Full tree view but not in plain array i.e.,
        // Root
        // Child 1
        // Sub child 1
        // Child 2
        // Another root
        // return CategoryMulti::get()->toFlatTree();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryMultiRequest $request)
    {
        $category = CategoryMulti::create([
            'name' => $request->name
        ]);

        if ($request->parent) {
            $parent = CategoryMulti::find($request->parent);
            // Insert parent_id of parent
            $parent->appendNode($category);
        }

        return $category;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryMulti  $categoryMulti
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryMulti $categoryMulti, $id)
    {
        // Retrive all parent nodes
        // $result = CategoryMulti::ancestorsOf($id);
        // return $result;

        // Retrive all parent nodes with self
        // $result = CategoryMulti::ancestorsAndSelf($id);
        // return $result;

        // Retrive all child nodes
        // $result = CategoryMulti::descendantsOf($id);
        // return $result;

        // Retrive all child nodes with self
        $result = CategoryMulti::defaultOrder()->descendantsAndSelf($id);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryMulti  $categoryMulti
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryMulti $categoryMulti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryMulti  $categoryMulti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryMulti $categoryMulti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryMulti  $categoryMulti
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryMulti $categoryMulti)
    {
        //
    }
}
