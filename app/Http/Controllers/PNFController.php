<?php

namespace App\Http\Controllers;

use App\Models\PNF;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PNFController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PNF::class);
    }

    public function index()
    {
        return view('pnfs.index', [
            'pnfs' => PNF::all()
                ->where('name', '!=', 'Extensión Universitaria'),
        ]);
    }

    public function create()
    {
        return view('pnfs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:50', 'unique:pnfs'],
            'leader' => ['required', 'string', 'min:5', 'max:50'],
        ]);

        PNF::create($data);

        return redirect()
            ->route('pnfs.index')
            ->with('alert', trans('alerts.pnf.created'));
    }

    public function edit(PNF $pnf)
    {
        return view('pnfs.edit', [
            'pnf' => $pnf,
        ]);
    }

    public function update(Request $request, PNF $pnf)
    {
        $data = $request->validate([
            'name' => [
                'required', 'string', 'min:5', 'max:50',
                Rule::unique('pnfs')->ignoreModel($pnf)
            ],
            'leader' => ['required', 'string', 'min:5', 'max:50'],
        ]);

        $pnf->update($data);

        return redirect()
            ->route('pnfs.index')
            ->with('alert', trans('alerts.pnf.updated'));
    }
}
