<?php

namespace App\Http\Controllers;

use App\Models\DaftarKomik;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DaftarKomikController extends Controller
{
    private function pre($arr = [])
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftar = DaftarKomik::all();
        return view('daftar_komik.index', ['daftar' => $daftar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['store'] = 'Input';
        $data['daftar'] = new DaftarKomik();
        $data['action'] = url('daftar_komik');
        return view('daftar_komik.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $daftar = new DaftarKomik();
        $daftar->nama = $request->input('nama');
        $daftar->lokasi = $request->input('lokasi');
        $daftar->keterangan = $request->input('keterangan');
        $rm = $this->rules_messages();
        $validator = Validator::make($request->all(), $rm['rules'], $messages = $rm['messages']);
        if ($validator->fails()) {
            return redirect('/daftar_komik/create')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validate();
        if ($validated) {
            $daftar->save();
        }
        return redirect('/daftar_komik');
    }

    private function rules_messages()
    {
        $rules = [
            'nama' => 'required |max:50',
            'lokasi' => 'required | max:5'
        ];
        $messages = [
            'required' => 'Kolom ini harus diisi.',
            'max' => 'Karakter yang diisi melebihi ketentuan.'
        ];
        $data = [
            'rules' => $rules,
            'messages' => $messages
        ];
        return $data;
    }
    /**
     * Display the specified resource.
     */
    public function show(DaftarKomik $DaftarKomik)
    {
        return view('daftar_komik.destroy', ['rak' => $DaftarKomik]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarKomik $DaftarKomik)
    {
        $data['store'] = 'Ubah';
        $data['daftar'] = $DaftarKomik;
        $data['action'] = url('daftar_komik' . '/' . $DaftarKomik->id);
        return view('daftar_komik.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarKomik $DaftarKomik)
    {
        $DaftarKomik->nama = $request->input('nama');
        $DaftarKomik->lokasi = $request->input('lokasi');
        $DaftarKomik->keterangan = $request->input('keterangan');
        $rm = $this->rules_messages();
        $validator = Validator::make($request->all(), $rm['rules'], $messages = $rm['messages']);
        if ($validator->fails()) {
            return redirect('/daftar_komik/' . $DaftarKomik->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validate();
        if ($validated) {
            $DaftarKomik->save();
        }
        return redirect('/daftar_komik');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarKomik $DaftarKomik)
    {
        $DaftarKomik->delete();
        return redirect('/daftar_komik');
    }

    public function store_ajax(Request $request)
    {
        $rak = new DaftarKomik();
        $rak->nama = $request->input('nama');
        $rak->lokasi = $request->input('lokasi');
        $rak->keterangan = $request->input('keterangan');
        $json = Response::json_encode($rak);
        return $json;
    }
}
