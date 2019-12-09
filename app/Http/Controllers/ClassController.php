<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Period;
use App\Http\Models\Branch;
use App\Http\Requests\ClassCreateRequest;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $studio = auth()->user()->member->studio->id;
        $periods = Period::getAll($studio);
        $branches = [];
        foreach (Branch::getOwnerBranches($studio) as $branch) {
            $branches[$branch->id] = $branch->name;
        }
        return view('studio.class.list', ['classes' => $periods, 'branches' => $branches]);
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
     * @param  ClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassCreateRequest $request)
    {
        try {
            $data = $request->all();
            $studio = auth()->user()->member->studio;
            $data['studio'] = $studio->id;
            $branch = Period::add($data, $studio->stripe_account_id);
            if ($branch !== false) {
                return redirect()->back()->with(['success' => 'You have added the class successfully.']);
            }
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with(['error' => 'An unexpected error occured. Please try again.']);
        }
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
    public function edit($id)
    {
        //
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
