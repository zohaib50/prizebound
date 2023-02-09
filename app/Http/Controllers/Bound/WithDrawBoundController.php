<?php

namespace App\Http\Controllers\Bound;

use App\Http\Controllers\Controller;
use App\Models\BoundList;
use App\Models\WithDrawalBound;
use App\Models\YouBounds;
use Illuminate\Http\Request;

class WithDrawBoundController extends Controller
{
    public function index_api(){

        $search = request()->search;
        $limit = request()->limit;

        $bounds = WithDrawalBound::where('user_id', auth()->user()->id)
            ->where(function ($query) use ($search){
                $query->where('bound_no', 'like', '%'.$search.'%');
            })
            ->with('category')
            ->with('year')
            ->paginate($limit);


        return response()->json($bounds);
    }
    public function check(){

        $bounds = BoundList::get();

        foreach ($bounds as $bound){
            $yourBound = YouBounds::where('user_id', auth()->user()->id)
                ->where('bound_category_id', $bound->bound_category_id)
                ->where('bound_year_id', $bound->bound_year_id)
                ->where('bound_no', 'like', '%'.$bound->bound_no.'%')
                ->where('type', $bound->type)
                ->first();

            if($yourBound){

                $withDrawBound = WithDrawalBound::where('user_id', auth()->user()->id)
                    ->where('bound_category_id', $yourBound->bound_category_id)
                    ->where('bound_year_id', $yourBound->bound_year_id)
                    ->where('bound_no', $yourBound->bound_no)
                    ->where('type', $yourBound->type)
                    ->first();
                if($withDrawBound){

                }else{
                    $addWithDrawBound = new WithDrawalBound();
                    $addWithDrawBound->user_id = auth()->user()->id;
                    $addWithDrawBound->bound_category_id = $yourBound->bound_category_id;
                    $addWithDrawBound->bound_year_id = $yourBound->bound_year_id;
                    $addWithDrawBound->bound_no = $yourBound->bound_no;
                    $addWithDrawBound->type = $yourBound->type;
                    $addWithDrawBound->save();
                }
            }
        }

        return response()->json('success');

    }
    public function destroy_api($id)
    {
        WithDrawalBound::where('id', $id)->delete();
        return response()->json('success');
    }
}
