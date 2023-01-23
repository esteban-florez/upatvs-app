<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use App\Models\PNF;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $areas = Area::when($search, fn($query, $search) => 
            $query->where('name', 'like', "%{$search}%"))
            ->latest()
            ->get();

        $pnfs = PNF::getOptions();

        return view('areas', [
            'areas' => $areas,
            'pnfs' => $pnfs,
            'search' => $search,
        ]);
    }

    public function store(StoreAreaRequest $request)
    {
        $data = $request->validated();

        Area::create($data);

        return redirect()
            ->back()
            ->with('alert', trans('alerts.areas.created'));
    }

    public function edit(Area $area)
    {
        $areas = Area::all();
        $pnfs = PNF::getOptions();

        return view('areas', [
            'areas' => $areas,
            'areaToEdit' => $area,
            'pnfs' => $pnfs
        ]);
    }

    public function update(UpdateAreaRequest $request, Area $area)
    {
        $data = $request->validated();

        $area->update($data);
        // TODO -> hacer que mande error y tal si salió algo mal
        return redirect()->route('areas.index')
            ->with('alert', trans('alerts.areas.updated'));
    }

    public function destroy(Area $area) {
        $area->delete();
        // TODO -> hacer que muestre modal de confirmación
        return redirect()->route('areas.index')
            ->with('alert', trans('alerts.areas.deleted'));
    }
}
