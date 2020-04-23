<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemImage;

class ImageController extends Controller
{
    public function index()
    {
        $images = ItemImage::get();
        return view('itemimage', compact('images'));
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        $input['title'] = $request->title;
        ItemImage::create($input);

        return back()
                ->with('success', 'Image uploaded successfully.');
    }

    public function destroy($id)
    {
        ItemImage::find($id)->delete();
        return back()
                ->with('success', 'Image removed successfully.');
    }
}
