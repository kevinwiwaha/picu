<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosisRequest;
use App\Http\Requests\ReportRequest;
use App\Models\Diagnosis;
use App\Models\Patient;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use PDF;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diagnosis = Diagnosis::with(['majors', 'minors', 'interventions'])->get();

        return view('pages.patient.createPatient', ['diagnosis' => $diagnosis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'patient_name' => 'required',
            'medicalrecord_number' => 'required',
            'complaint' => 'required',
            'diagnosis' => 'required'
        ]);

        $diagnosis = Diagnosis::with(['majors', 'minors', 'interventions'])->whereIn('id', $request->diagnosis)->get();

        return view('pages.patient.confirmPatient', ['data' => $request, 'diagnosis' => $diagnosis]);
    }
    public function reciepe(ReportRequest $request)
    {



        $data = [
            'patient' => $request->patient_name,
            'medrec_num' => $request->medicalrecord_number,
            'diagnosis' => $request->diagnosis,
            'goal' => implode("|", $request->goal),
            'criteria' => implode("|", $request->criteria),
            'complaint' => $request->complaint,
            'observasi' => array_unique($request->observasi),
            'terapeutik' => array_unique($request->terapeutik),
            'edukasi' => array_unique($request->edukasi),
            'kolaborasi' => array_unique($request->kolaborasi),
            'tanggal' => $request->created_at
        ];
        $patient = $data;
        $data['diagnosis'] = implode('|', array_unique($request->diagnosis));
        $data['observasi'] = implode('|', array_unique($request->observasi));
        $data['terapeutik'] = implode('|', array_unique($request->terapeutik));
        $data['edukasi'] = implode('|', array_unique($request->edukasi));
        $data['kolaborasi'] = implode('|', array_unique($request->kolaborasi));



        $input = Patient::create($data);

        return view('pages.patient.reportPatient', ['patient' => $patient, 'date' => $input->created_at]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function createpdf(Request $request)
    {

        $data = $request->all();

        $data['date'] = Carbon::now();
        $filename = $request->patient . $request->medrec_num . Carbon::now();
        $pdf = PDF::loadView('pages.patient.reciepePatient', $data);
        return $pdf->download($filename . '.pdf');
    }
    public function show(Patient $patient)
    {



        return view('pages.patient.detailPatient', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        Patient::destroy($request->patient);
        return redirect('/');
    }
}
