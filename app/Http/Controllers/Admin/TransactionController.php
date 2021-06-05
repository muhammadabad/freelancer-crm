<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionStoreRequest;
use App\Models\Project;
use App\Models\Transaction;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->get();
        return view('admin.transaction.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::latest()->get();
        return view('admin.transaction.create',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionStoreRequest $request)
    {
        
      $storeTransaction = Transaction::create($request->except('_token','_method'));
      return redirect()->back()->with('success','Transaction Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idere
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectId= Transaction::select('project_id')->where('id',$id)->first();
        $payAmount = Transaction::where('project_id',$projectId->project_id)->sum('amount');
        $budget = Project::select('budget')->where('id',$projectId->project_id)->first();
        $dueAmount = $budget->budget-$payAmount;
        $transaction = Transaction::findOrFail($id);
        return view('admin.transaction.show',compact('transaction','dueAmount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::latest()->get();
        $transaction = Transaction::findOrFail($id);
        return view('admin.transaction.edit',compact('projects','transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionStoreRequest $request, $id)
    {
        $updateTransaction = Transaction::findOrFail($id)->update($request->except('_token','_method'));
        return redirect('admin/transaction')->with('success','Transaction Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteTrasaction = Transaction::findOrFail($id)->delete();
        return redirect()->back()->with('success','Transaction Deleted Successfully');
    }
}
