<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the vehicle.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicleQuery = Vehicle::query();
        $vehicleQuery->where('name', 'like', '%'.request('q').'%');
        $vehicles = $vehicleQuery->paginate(25);

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new vehicle.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Vehicle);

        return view('vehicles.create');
    }

    /**
     * Store a newly created vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Vehicle);

        $newVehicle = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newVehicle['creator_id'] = auth()->id();

        $vehicle = Vehicle::create($newVehicle);

        return redirect()->route('vehicles.show', $vehicle);
    }

    /**
     * Display the specified vehicle.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified vehicle.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\View\View
     */
    public function edit(Vehicle $vehicle)
    {
        $this->authorize('update', $vehicle);

        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified vehicle in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $this->authorize('update', $vehicle);

        $vehicleData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $vehicle->update($vehicleData);

        return redirect()->route('vehicles.show', $vehicle);
    }

    /**
     * Remove the specified vehicle from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Vehicle $vehicle)
    {
        $this->authorize('delete', $vehicle);

        $request->validate(['vehicle_id' => 'required']);

        if ($request->get('vehicle_id') == $vehicle->id && $vehicle->delete()) {
            return redirect()->route('vehicles.index');
        }

        return back();
    }
}
