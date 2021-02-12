<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

        $this->deleteImg();

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

        //user loggato
        $user = Auth::user();

        //imposta icona dell user pari al nome finale dell img
        $user->icon = $destFile;

        //salvo il tutto
        $user->save();

        return redirect()->back();
    }
    public function clearImg()
    {
        $this->deleteImg();

        $user = Auth::user();
        $user->icon = null;
        $user->save();

        return redirect()->back();
    }

    private function deleteImg()
    {
        $user = Auth::user();
        try {
            $fileName = $user->icon;

            $file = storage_path('app/public/icon/' . $fileName);
            File::delete($file);
            // dd($file, $res);
        } catch (\Exception $e) {
        }
    }
}
