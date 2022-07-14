<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\Upload;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Dashboard
 */
class CategoryController extends Controller
{
    use Upload;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        Gate::authorize("showAllCategories", Category::class);

        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Gate::authorize("addNewCategory", Category::class);

        $categories = Category::isActive()->get();
        return view('dashboard.category.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        Gate::authorize("addNewCategory", Category::class);

        $request->validate([
            'name_ar'   =>  'required',
            'name_en'   =>  'required',
            'image'     =>  'required|image',
        ], [] , [
        ]);

        $category = new Category();
        $category->title_ar = \request('name_ar');
        $category->title_en = \request('name_en');
        $category->is_active = \request('is_active');
        $category->parent_id = \request('category_id');
        $category->image_path = $this->uploadImage($request->image, 'categories');
        $category->save();

        return redirect(adminUrl('category'))->with('create', 'تمت اضافةالقسم بنجاح');
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
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        Gate::authorize("updateCategory", $category);

        $categories = Category::isActive()->get();
        return view('dashboard.category.edit', compact('category', 'categories'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        Gate::authorize("updateCategory", $category);

        $request->validate([
            'name_ar'   =>  'required',
            'name_en'   =>  'required',
            'image'     =>  'nullable|image',
        ], [] , [
        ]);

        $category->title_ar = \request('name_ar');
        $category->title_en = \request('name_en');
        $category->is_active = \request('is_active');
        if (isset($request->image))
        {
            $category->image_path = $this->uploadImage($request->image, 'categories');
        }
        if ($request->is_main == 1) // Main category
        {
            $category->parent_id = null;
        }
        elseif ($request->is_main == 0) // Sub category
        {
            $category->parent_id = \request('category_id');
        }
        $category->save();

        return redirect(adminUrl('category'))->with('update', 'تم تعديل القسم بنجاح');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        Gate::authorize("deleteCategory", $category);

        $category->delete();

        return redirect(adminUrl('category'))->with('update', 'تم حذف القسم بنجاح');
    }
}
