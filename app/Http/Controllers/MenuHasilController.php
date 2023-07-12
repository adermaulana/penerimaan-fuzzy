<?php

namespace App\Http\Controllers;

use App\Models\MenuHasil;
use Illuminate\Http\Request;

class MenuHasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.menu_hasil');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function show(MenuHasil $menuHasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuHasil $menuHasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuHasil $menuHasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuHasil  $menuHasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuHasil $menuHasil)
    {
        //
    }
}
