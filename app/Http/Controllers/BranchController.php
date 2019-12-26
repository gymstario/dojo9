<?php

namespace App\Http\Controllers;

use App\Http\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('studio.branch.list', ['branches' => Branch::getOwnerBranches(auth()->user()->member->studio->id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('studio.branch.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        try {
            $data = $request->all();
            $studio = auth()->user()->member->studio;
            $data['studio'] = $studio->id;
            $branch = Branch::add($data, $studio->stripe_account_id);
            if ($branch !== false) {
                return redirect()->back()->with(['success' => 'You have added the plan successfully.']);
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
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
