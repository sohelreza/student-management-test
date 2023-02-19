<?php

namespace App\Http\Controllers;

use App\Models\CustomField;
use App\Http\Requests\StoreCustomFieldRequest;
use App\Http\Requests\UpdateCustomFieldRequest;

class CustomFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCustomFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomFieldRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function show(CustomField $customField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomField $customField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomFieldRequest  $request
     * @param  \App\Models\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomFieldRequest $request, CustomField $customField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomField  $customField
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomField $customField)
    {
        //
    }
}
