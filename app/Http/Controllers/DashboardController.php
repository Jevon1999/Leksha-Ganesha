<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function showDashboard(){
        return view('dashboard.index');
    }

    public function formBerita(){
        return view('dashboard.tambah');
    }

    public function showLandingPage(){
        $beritas = Berita::all();
        return view('landing-page', compact('beritas'));
    }
}

