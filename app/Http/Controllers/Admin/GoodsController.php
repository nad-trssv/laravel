<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsStore;
use App\Http\Requests\GoodsUpdate;
use App\Models\Category;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Output\ConsoleOutput;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::orderBy('id', 'desc')->get();

        return view('admin.goods.index', [
            'goodslist' => $goods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.goods.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsStore $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        $goods = Goods::create($data);

        if ($goods) {
            return redirect()->route('admin.goods.index')
                ->with('success', __('message.admin.goods.created.success'));
        }
        return back()->with('error', __('admin.goods.created.fail'));
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
    public function edit(Goods $good)
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.goods.edit', [
            'good' => $good,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsUpdate $request, Goods $good)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $statusGoods = $good->fill($data)->save();

        if ($statusGoods) {
            return redirect()->route('admin.goods.index')
                ->with('success', __('message.admin.goods.updated.success'));
        }
        return back()->with('error', __('message.admin.goods.updated.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Goods $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Goods::find($id);
        $statusDelete = $model->delete();

        if ($statusDelete) {
            return redirect()->route('admin.goods.index')
                ->with('success', __('message.admin.goods.deleted.success'));
        }
        return redirect()->route('admin.goods.index')
            ->with('error', __('message.admin.goods.deleted.fail'));
    }
}
