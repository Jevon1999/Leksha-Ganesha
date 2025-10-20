<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function showDashboard(){
        return view('dashboard.index');
    }

    public function formBerita(){
        return view('dashboard.tambah');
    }

    public function showLandingPage(){
        $galeris = Galeri::all();
        $beritas = Berita::all();
        // dd($beritas[0]->image);
        return view('landing-page', compact('beritas', 'galeris'));
    }
}

