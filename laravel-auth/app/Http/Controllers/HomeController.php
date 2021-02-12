<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function uploadImg(Request $request)
    {
        //validation che sia file e ci sia
        $request->validate([
            'icon' => 'required|file'
        ]);


        $image = $request->file('icon');

        //mi salvo estensione file
        $ext = $image->getClientOriginalExtension();

        //creo nome img che sia sempre diverso
        $name = rand(100000, 999999) . '_' . time();

        //creo destination file
        $destFile = $name . '.' . $ext;

        //copio file all upload
        $file = $image->storeAs('icon', $destFile, 'public');


        // dd($image, $ext, $name, $destFile);

        return redirect()->back();
    }
}
