<?php

namespace App\Http\Controllers\Bound;

use App\Http\Controllers\Controller;
use App\Models\BoundCategory;
use App\Models\BoundYear;
use App\Models\CategoryYearMapping;
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
        return view('bound.category.index');
    }
    public function index_api()
    {
        $search = request()->search;
        $limit = request()->limit;

        $category = BoundCategory::where(function ($query) use ($search){
               $query->where('name', 'like', '%'.$search.'%');
            })
//            ->with('years')
            ->withCount('years')
            ->paginate($limit);
        return response()->json($category);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $years = BoundYear::get();
        return view('bound.category.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:bound_categories|max:255'
        ]);

        $category = new BoundCategory();
        $category->name = $request->name;
        $category->save();
        foreach ($request->years as $year){
            $categoryyear = new CategoryYearMapping();
            $categoryyear->bound_category_id = $category->id;
            $categoryyear->bound_year_id = $year;
            $categoryyear->save();
        }

        return redirect()->route('bound.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = BoundCategory::with('years')
            ->find($id);
        return view('bound.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $years = BoundYear::get();
        $category = BoundCategory::with('years')->find($id);
        return view('bound.category.edit', compact('category', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:bound_categories,name,'.$id
        ]);
        $category = BoundCategory::find($id);
        $category->name = $request->name;
        $category->update();
        foreach ($request->years as $year){

            CategoryYearMapping::where('bound_category_id', $category->id)->where('bound_year_id', $year)->delete();

            $categoryyear = new CategoryYearMapping();
            $categoryyear->bound_category_id = $category->id;
            $categoryyear->bound_year_id = $year;
            $categoryyear->save();


        }




        return redirect()->route('bound.category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function destroy_api($id)
    {
        BoundCategory::where('id', $id)->delete();
        return response()->json('success');
    }
    public function select2(){
        $categories = BoundCategory::select('id', 'name as text')->get();
        return response()->json($categories);
    }
}
