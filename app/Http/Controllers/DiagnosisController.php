<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosisRequest;
use App\Models\diagnosis;
use App\Models\Intervention;
use App\Models\major;
use App\Models\minor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tes()
    {
        // Masuk DB
        $diagnosis = Diagnosis::with(['interventions'])->find(2);
        $intervensi = $diagnosis->interventions()->get();
        dd(empty($intervensi->all()));
    }
    public function index()
    {
        $diagnosis = diagnosis::with('majors', 'minors')->get();


        return view('pages.diagnosis.indexDiagnosis', ['diagnosis' => $diagnosis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.diagnosis.createDiagnosis', ['intervention' => Intervention::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiagnosisRequest $request)
    {


        $diagnosis = Diagnosis::create([
            'diagnosis_name' => $request->diagnosis_name,
            'goal' => $request->goal,
            'criteria' => implode(",", $request->criteria)
        ]);

        if (count($request->major) > 0) {
            foreach ($request->major as $ma) {
                $majors = major::create([
                    'name' => $ma
                ]);
                $diagnosis->majors()->attach($majors);
            }
        }
        if (count($request->minor) > 0) {
            foreach ($request->minor as $mi) {
                $minors = minor::create([
                    'name' => $mi
                ]);
                $diagnosis->minors()->attach($minors);
            }
        }
        if (count($request->intervention) > 0) {
            foreach ($request->intervention as $i) {
                $diagnosis->interventions()->attach($i);
            }
        }
        return redirect('/diagnosis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosis $diagnosis)
    {

        return view('pages.diagnosis.infoDiagnosis', ['diagnosis' => $diagnosis]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis $diagnosis)
    {

        return view('pages.diagnosis.editDiagnosis', ['diagnosis' => $diagnosis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $diagnosis = Diagnosis::where('id', $request->id);
        $diagnosis->update(['diagnosis_name' => $request->diagnosis_name]);
        $data = $diagnosis->with(['majors', 'minors'])->get();

        if (count($request->major) > 0)
            $num = count($request->major);
        $index = 0;
        foreach ($data as $d) {

            foreach ($d->majors as $m) {
                major::where('id', $m->id)->update([
                    'name' => $request->major[$index]

                ]);
                $index++;
            }
        }
    }
    // foreach ($data as $d) {
    //     $index = 0;
    //     foreach ($d->minors as $m) {
    //         minor::where('id', $m->id)->update([
    //             'name' => $request->major[$index]

    //         ]);
    //         $index++;
    //     }
    // }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $diagnosis = Diagnosis::with(['majors', 'minors'])->where('id', $request->id)->get();
        $majorsArr = [];


        foreach ($diagnosis as $d) {
            foreach ($d->majors as $m) {
                array_push($majorsArr, $m->id);
                Major::where('id', $m->id)->delete();
            }
        };
        $minorsArr = [];
        foreach ($diagnosis as $d) {
            foreach ($d->minors as $m) {
                array_push($minorsArr, $m->id);
                Minor::where('id', $m->id)->delete();
            }
        };

        Diagnosis::find($request->id)->majors()->detach($majorsArr);
        Diagnosis::find($request->id)->minors()->detach($minorsArr);
        Diagnosis::destroy($request->id);
        return redirect('/diagnosis');
    }
}
