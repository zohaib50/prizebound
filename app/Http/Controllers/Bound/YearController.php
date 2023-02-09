<?php

namespace App\Http\Controllers\Bound;

use App\Http\Controllers\Controller;
use App\Http\Resources\Select2\YearResource;
use App\Models\BoundCategory;
use App\Models\BoundYear;
use App\Models\CategoryYearMapping;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bound.year.index');
    }
    public function index_api()
    {
        $search = request()->search;
        $limit = request()->limit;

        $years = BoundYear::where(function ($query) use ($search){
            $query->where('name', 'like', '%'.$search.'%');
        })
//            ->with('categories')
            ->withCount('categories')
            ->paginate($limit);
        return response()->json($years);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BoundCategory::get();
        return view('bound.year.create', compact('categories'));
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

        $year = new BoundYear();
        $year->name = $request->name;
        $year->save();
        foreach ($request->categories as $category){
            $categoryyear = new CategoryYearMapping();
            $categoryyear->bound_category_id = $category;
            $categoryyear->bound_year_id = $year->id;
            $categoryyear->save();
        }

        return redirect()->route('bound.year.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $year= BoundYear::with('categories')
            ->find($id);
        return view('bound.year.show', compact('year'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year = BoundYear::with('categories')->find($id);
        $categories = BoundCategory::get();
        return view('bound.year.edit', compact('year','categories'));
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
        $year = BoundYear::find($id);
        $year->name = $request->name;
        $year->update();
        foreach ($request->categories as $category){

            CategoryYearMapping::where('bound_year_id', $year->id)->where('bound_category_id', $category)->delete();

            $categoryyear = new CategoryYearMapping();
            $categoryyear->bound_category_id = $category;
            $categoryyear->bound_year_id = $year->id;
            $categoryyear->save();


        }
        return redirect()->route('bound.year.index');
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
        BoundYear::where('id', $id)->delete();
        return response()->json('success');
    }
    public function select2($cid){
//        $years = BoundYear::with(['categories' => function($query) use ($cid){
//            $query->where('bound_category_id', $cid);
//        }])->get();
//        return response()->json($years);


        $categoryYearMapping = CategoryYearMapping::where('bound_category_id', $cid)->with('year')->get();
        $resourcesYear = YearResource::collection($categoryYearMapping);

        return response()->json($resourcesYear);
    }
}
