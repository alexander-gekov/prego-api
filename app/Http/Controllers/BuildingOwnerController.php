<?php

namespace App\Http\Controllers;

use App\Models\BuildingOwner;
use App\Models\Company;
use Illuminate\Http\Request;

class BuildingOwnerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('id')) {
            return BuildingOwner::where('id', $request->id)->get();
        }
        return BuildingOwner::all();
    }

    public function update(Request $request, BuildingOwner $buildingOwner)
    {
        $buildingOwner->user_id = $request->user_id;
        $buildingOwner->first_name = $request->first_name;
        $buildingOwner->last_name = $request->last_name;
        $buildingOwner->building_name = $request->building_name;


        $buildingOwner->save();
        return response()->json([
            'message' => 'success']);
    }

    public function getBuildingOwnerByUserId($user_id)
    {
        return response()->json(BuildingOwner::where('user_id',$user_id)->get());

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BuildingOwner $buildingOwner
     * @return \Illuminate\Http\Response
     */
    public function show(BuildingOwner $buildingOwner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BuildingOwner $buildingOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(BuildingOwner $buildingOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BuildingOwner $buildingOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuildingOwner $buildingOwner)
    {
        //
    }
}
