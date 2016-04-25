<?php

namespace App\Http\Controllers;

use App\Franchise;
use App\User;
use App\Document;
use Illuminate\Http\Request;
use App\Http\Requests;

class FranchiseController extends Controller
{
    public function index()
    {
        $allFranchise = Franchise::all();
        return view('admin.franchise.all', compact('allFranchise'));
    }

    public function view(Franchise $franchise)
    {
        $everyonesDocuments = Document::whereFranchiseId(null)->get();
     return view('admin.franchise.view', compact('franchise', 'everyonesDocuments'));
    }

    public function add()
    {
        return view('admin.franchise.new');
    }

    public function create(Request $request)
    {
        Franchise::create($request->all()
        );
        return redirect('/franchise/all');
    }
}
