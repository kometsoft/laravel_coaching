<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Aduan\StoreRequest;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Models\Aduan;

class AduanController extends Controller
{

    public function __construct () 
    {
        // $this->middleware (['auth']);
        $this->middleware (['auth', 'role:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $aduans = Aduan::all();

        // $aduans = Aduan::where('id', '>', 1)
        //             ->where('id', '>', 2)
        //         ->get();

        // dd ($aduans);

        $data = array();

        $data['aduans'] = $aduans;
        $data['admin_email'] = 'admin@jkm.gov.my';

        return view('aduan/index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('aduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        // dd ($request);

        $aduan = Aduan::create([
            'user_id' => Auth::id(),
            'tajuk' => $request->tajuk,
            'aduan' => $request->aduan,
            'tarikh_aduan' => Carbon::now()
        ]);

        return redirect()->route('aduan.show', $aduan->id)->with('status', 'Aduan berjaya dicipta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aduan = Aduan::with('user')->find ($id);

        // dd ($aduan);

        $data = array ();

        $data ['aduan'] = $aduan;

        return view ('aduan/show', $data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aduan = Aduan::find ($id);

        // dd ($aduan);

        $data = array ();

        $data ['aduan'] = $aduan;

        return view ('aduan/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        //
        
        $aduan = Aduan::find($id)->update([
            'tajuk' => $request->tajuk,
            'aduan' => $request->aduan,
        ]);

        return redirect()->route('aduan.show', $id)->with('status', 'Aduan berjaya dikemaskini');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
