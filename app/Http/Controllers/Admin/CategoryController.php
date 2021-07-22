<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStore;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('goods')
            //->whereHas('goods')
            ->select(['id', 'title', 'description', 'color', 'updated_at'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.categories.index', [
            'categorylist' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        $data = $request->validated();

        $statusCategory = Category::create($data);

        if ($statusCategory) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('message.admin.category.created.success'));
        }
        return back()->with('error', __('admin.category.created.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, Category $category)
    {
        $statusCategory = $category->fill(
            $request->validated()
        )->save();

        if ($statusCategory) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('message.admin.category.updated.success'));
        }
        return back()->with('error', __('message.admin.category.updated.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Category::with('goods')
            ->find($id);
        $hasProducts = $model->goods; // Проверка на то, есть ли в категории товары

        if ((isset($hasProducts[0]))) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'В категории есть товары! Удалить категорию невозможно.');
        } else {
            $statusDelete = $model->delete();

            if ($statusDelete) {
                return redirect()->route('admin.categories.index')
                    ->with('success', __('message.admin.category.deleted.success'));
            }
            return redirect()->route('admin.categories.index')
                ->with('error', __('message.admin.category.deleted.fail'));
        }
    }
}
