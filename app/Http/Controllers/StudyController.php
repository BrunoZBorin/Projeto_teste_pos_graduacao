<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Study;

use App\Models\Area;

use App\Http\Requests\StudyRequest;

use Illuminate\Support\Facades\DB;

class StudyController extends Controller
{
    protected $study;

    public function __construct(Study $study, Area $areaParam)
    {
        $this->study=$study;
        $this->area=$areaParam;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = $this->study->all->paginate(5);
        
        return view('studies.index', compact('studies'));
    }

    public function showStatus()
    {
        $finalizado = DB::table('studies')
                    ->select(DB::raw('count(*) as numero'))
                    ->where('status', '=', 'Finalizado')
                    ->groupBy('status')
                    ->get();
                    $finalizado = json_decode($finalizado, true);
        $em_andamento = DB::table('studies')
                    ->select(DB::raw('count(*) as numero'))
                    ->where('status', '=', 'Em andamento')
                    ->groupBy('status')
                    ->get();
                    $em_andamento = json_decode($em_andamento, true);
        $em_atraso = DB::table('studies')
                    ->select(DB::raw('count(*) as numero'))
                    ->where('status', '=', 'Em atraso')
                    ->groupBy('status')
                    ->get();
                    $em_atraso = json_decode($em_atraso, true);
        return view('studies.list', compact('finalizado','em_andamento','em_atraso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = $this->area->all();
        
        return view('studies.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudyRequest $request)
    {
        $study = new Study();
        $study->fill($request->all());
        $study->save();

        return redirect()->route('studies.index');
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
        $areas = $this->area->all();
        $study = $this->study->findOrFail($id);
        return view('studies.edit', compact('areas', 'study'));
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
        $study = $this->study->findOrFail($id);
        $study->fill($request->all());
        $study->save();

        return redirect()->route('studies.index')
        ->withSuccess('Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = $this->study->find($id);
        $study->delete();
        return redirect()->route('studies.index');
    }
}
