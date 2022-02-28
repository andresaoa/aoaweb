<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

/**
 * Class BannerController
 * @package App\Http\Controllers
 */
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate();

        return view('banner.index', compact('banners'))
            ->with('i', (request()->input('page', 1) - 1) * $banners->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = new Banner();
        return view('banner.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Banner::$rules);

        $banner = Banner::create($request->all());

        return redirect()->route('banners.index')
            ->with('success', 'Banner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);

        return view('banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);

        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        request()->validate(Banner::$rules);

        $banner->update($request->all());

        return redirect()->route('banners.index')
            ->with('success', 'Banner updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $banner = Banner::find($id)->delete();

        return redirect()->route('banners.index')
            ->with('success', 'Banner deleted successfully');
    }
}
