<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    private function validator($request)
    {
        return $request->validate([
            'name' => 'required|string|min:2|max:8',
        ], [
            'name.required' => 'カテゴリー名を入力してください。',
            'name.min' => ':min文字以上で入力してください。',
            'name.max' => ':max文字以上で入力してください。',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Auth::user()->categories;

        return view('categories.index', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);

        $category = new Category();
        $category->user_id = Auth::id();
        $category->name = $request->input('name');
        $category->save();

        return to_route('categories.index')->with('add_category', 'カテゴリーを追加しました。');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validator($request);

        $category->user_id = Auth::id();
        $category->name = $request->input('name');
        $category->update();

        return to_route('categories.index')->with('edit_category', 'カテゴリーを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('categories.index')->with('del_category', 'カテゴリーを削除しました。');
    }
}
