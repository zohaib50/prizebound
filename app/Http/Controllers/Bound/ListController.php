<?php

namespace App\Http\Controllers\Bound;

use App\Http\Controllers\Controller;
use App\Models\BoundCategory;
use App\Models\BoundList;
use App\Models\BoundYear;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bound.list.index');
    }
    public function index_api()
    {
        $category = request()->category;
        $year = request()->year;
        $search = request()->search;
        $limit = request()->limit;

        $category = BoundList::where('bound_category_id')
            ->where()
            ->where(function ($query) use ($search){
                $query->where('bound_no', 'like', '%'.$search.'%');
            })
            ->with('category')
            ->with('year')
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
        $categories = BoundCategory::get();
        $years = BoundYear::get();
        return view('bound.list.create', compact('categories', 'years'));
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
            'category' => 'required',
            'year' => 'required',
            'type' => 'required',
            'list' => 'required',
        ]);
//        str_replace("\t", "", $fc);
        $bondList1 =  str_replace("\t", " " ,$request->list);
        $bondList2 =  str_replace("\r\n", " " ,$bondList1);

        $bounds =  explode(" ", $bondList2);

        foreach ($bounds as $bound){
            $boundList = new BoundList();
            $boundList->bound_year_id = $request->year;
            $boundList->bound_category_id = $request->category;
            $boundList->type = $request->type;
            $boundList->bound_no = $bound;
            $boundList->save();

        }
        return view('bound.list.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('bound.list.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bound.list.edit');
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
        //
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
}
