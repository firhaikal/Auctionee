<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get();
        return view('items.items', compact('items'));
    }
    public function home()
    {
        $items = Item::get();
        return view('home', compact('items'));
    }
    public function create()
    {
        return view('items.form');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'id_barang' => 'required|numeric',
            'nama_barang' => 'required|string',
            'tgl' => 'required',
            'harga_awal' => 'required|numeric',
            'deskripsi_barang' => 'required|string',
        ]);

        $itemCount = Item::count(); 

        $item = new Item;
        
        $input = $request->all();

        $item->id = $itemCount + '1';
        $item->id_barang = $itemCount + '1';
        $item->nama_barang = $input['nama_barang'];
        $item->tgl = $input['tgl'];
        $item->harga_awal = $input['harga_awal'];
        $item->deskripsi_barang = $input['deskripsi_barang'];
        $item->status = '0';
        $item->image = $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
        $status = $item->save();

        if ($status) {
            return redirect('/items')->with('success', 'Data added successfully');
        }else {
            return redirect('/items/create')->with('error', 'Failed to add data');
        }
    }
    public function detail(Request $request, $id)
    {
        $data['item'] = \DB::table('tb_barang')->find($id);
        return view('items.detail', $data);
    }
    public function edit(Request $request, $id)
    {
        $data['item'] = \DB::table('tb_barang')->find($id);
        return view('items.form', $data);
    }
    public function update(Request $request, $id)
    {
        $rule = [
            // 'id_barang' => 'required|numeric',
            'nama_barang' => 'required|string',
            'tgl' => 'required',
            'harga_awal' => 'required|numeric',
            'deskripsi_barang' => 'required|string',
        ];
        $this->validate($request, $rule);

        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('tb_barang')->where('id_barang', $id)->update($input);

        $item = Item::find($id);

        // $item->id = $input['id'];
        // $item->id_barang = $input['id_barang'];
        $item->nama_barang = $input['nama_barang'];
        $item->tgl = $input['tgl'];
        $item->harga_awal = $input['harga_awal'];
        $item->deskripsi_barang = $input['deskripsi_barang'];
        $item->image = $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
        $status = $item->update();

        // $status = $item->update($input);

        if ($status) {
            return redirect('/items')->with('success', 'Data updated successfully');
        }else {
            return redirect('/items/create')->with('error', 'Failed to update data');
        }
    }

    
    public function updateStat(Request $request)
    {
        $item = Item::find($request->id_barang);
        $item->status = $request->status;

        $item->save();

        return response()->json(['success'=>'Status changed successfully.']);
    }

    public function destroy(Request $request, $id)
    {
        // $status = \DB::table('tb_barang')->where('id_barang', $id)->delete();

        $item = Item::find($id);
        $status = $item->delete();

        if ($status) {
            return redirect('/items')->with('success', 'Data deleted successfully');
        }else {
            return redirect('/items/create')->with('error', 'Failed to delete data');
        }
    }
}
