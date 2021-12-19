<?php

namespace App\Http\Controllers;

use App\Models\Dueños;
use Illuminate\Http\Request;

class DueñosController extends Controller
{
    /**
     * Display a listing of the dueños.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dueñosQuery = Dueños::query();
        $dueñosQuery->where('name', 'like', '%'.request('q').'%');
        $dueños = $dueñosQuery->paginate(25);

        return view('dueños.index', compact('dueños'));
    }

    /**
     * Show the form for creating a new dueños.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Dueños);

        return view('dueños.create');
    }

    /**
     * Store a newly created dueños in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Dueños);

        $newDueños = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newDueños['creator_id'] = auth()->id();

        $dueños = Dueños::create($newDueños);

        return redirect()->route('dueños.show', $dueños);
    }

    /**
     * Display the specified dueños.
     *
     * @param  \App\Models\Dueños  $dueños
     * @return \Illuminate\View\View
     */
    public function show(Dueños $dueños)
    {
        return view('dueños.show', compact('dueños'));
    }

    /**
     * Show the form for editing the specified dueños.
     *
     * @param  \App\Models\Dueños  $dueños
     * @return \Illuminate\View\View
     */
    public function edit(Dueños $dueños)
    {
        $this->authorize('update', $dueños);

        return view('dueños.edit', compact('dueños'));
    }

    /**
     * Update the specified dueños in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dueños  $dueños
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Dueños $dueños)
    {
        $this->authorize('update', $dueños);

        $dueñosData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $dueños->update($dueñosData);

        return redirect()->route('dueños.show', $dueños);
    }

    /**
     * Remove the specified dueños from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dueños  $dueños
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Dueños $dueños)
    {
        $this->authorize('delete', $dueños);

        $request->validate(['dueños_id' => 'required']);

        if ($request->get('dueños_id') == $dueños->id && $dueños->delete()) {
            return redirect()->route('dueños.index');
        }

        return back();
    }
}
