<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

/**
 * Class CarouselController
 * @package App\Http\Controllers
 */
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::paginate();

        return view('carousel.index', compact('carousels'))
            ->with('i', (request()->input('page', 1) - 1) * $carousels->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carousel = new Carousel();
        return view('carousel.create', compact('carousel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carousel::$rules);

        $carousel = Carousel::create($request->all());

        return redirect()->route('carousels.index')
            ->with('success', 'Carousel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carousel = Carousel::find($id);

        return view('carousel.show', compact('carousel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carousel = Carousel::find($id);

        return view('carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carousel $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel)
    {
        request()->validate(Carousel::$rules);

        $carousel->update($request->all());

        return redirect()->route('carousels.index')
            ->with('success', 'Carousel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carousel = Carousel::find($id)->delete();

        return redirect()->route('carousels.index')
            ->with('success', 'Carousel deleted successfully');
    }
}
