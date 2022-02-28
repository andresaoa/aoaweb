<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use Illuminate\Http\Request;

/**
 * Class NavController
 * @package App\Http\Controllers
 */
class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navs = Nav::paginate();

        return view('nav.index', compact('navs'))
            ->with('i', (request()->input('page', 1) - 1) * $navs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nav = new Nav();
        return view('nav.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nav::$rules);

        $nav = Nav::create($request->all());

        return redirect()->route('navs.index')
            ->with('success', 'Nav created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nav = Nav::find($id);

        return view('nav.show', compact('nav'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nav = Nav::find($id);

        return view('nav.edit', compact('nav'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nav $nav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nav $nav)
    {
        request()->validate(Nav::$rules);

        $nav->update($request->all());

        return redirect()->route('navs.index')
            ->with('success', 'Nav updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nav = Nav::find($id)->delete();

        return redirect()->route('navs.index')
            ->with('success', 'Nav deleted successfully');
    }
}
