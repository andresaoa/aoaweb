<?php

namespace App\Http\Controllers;

use App\Models\Marquee;
use Illuminate\Http\Request;

/**
 * Class MarqueeController
 * @package App\Http\Controllers
 */
class MarqueeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marquees = Marquee::paginate();

        return view('marquee.index', compact('marquees'))
            ->with('i', (request()->input('page', 1) - 1) * $marquees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marquee = new Marquee();
        return view('marquee.create', compact('marquee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Marquee::$rules);

        $marquee = Marquee::create($request->all());

        return redirect()->route('marquees.index')
            ->with('success', 'Marquee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marquee = Marquee::find($id);

        return view('marquee.show', compact('marquee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marquee = Marquee::find($id);

        return view('marquee.edit', compact('marquee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Marquee $marquee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marquee $marquee)
    {
        request()->validate(Marquee::$rules);

        $marquee->update($request->all());

        return redirect()->route('marquees.index')
            ->with('success', 'Marquee updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $marquee = Marquee::find($id)->delete();

        return redirect()->route('marquees.index')
            ->with('success', 'Marquee deleted successfully');
    }
}
