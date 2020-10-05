<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosisRequest;
use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inter = Intervention::all();
        return view('pages.intervention.indexIntervention', ['inter' => $inter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.intervention.createIntervention');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $intervensi = Intervention::create([
            'intervention_name' => $request->intervention_name,
            'definition' => $request->definition,
            'type' => $request->type,
            'observasi' => implode("|", $request->observasi),
            'terapeutik' => implode("|", $request->terapeutik),
            'edukasi' => implode("|", $request->edukasi),
            'kolaborasi' => implode("|", $request->kolaborasi)
        ]);
        return redirect('/intervensi');

        // if (count($request->terapeutik) > 0) {
        //     foreach ($request->terapeutik as $mi) {
        //         Intervention::create([
        //             'terapeutik' => $mi
        //         ]);
        //     }
        // }
        // if (count($request->edukasi) > 0) {
        //     foreach ($request->edukasi as $mi) {
        //         Intervention::create([
        //             'edukasi' => $mi
        //         ]);
        //     }
        // }
        // if (count($request->kolaborasi) > 0) {
        //     foreach ($request->kolaborasi as $mi) {
        //         Intevention::create([
        //             'kolaborasi' => $mi
        //         ]);
        //     }
        // }
        // return redirect('/intervensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Intervention::destroy($request->delete);
        return redirect('/intervensi');
    }
}
