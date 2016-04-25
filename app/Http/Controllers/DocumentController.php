<?php

namespace App\Http\Controllers;

use App\Document;
use App\Franchise;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class DocumentController extends Controller
{
    public function view()
    {

        if(Auth::user()->role == 'user' || Auth::user()->role == 'manager')
        {
            $franchiseDocuments = Document::whereFranchiseId(Auth::user()->franchise_id)->get();
            $everyoneDocuments = Document::whereFranchiseId(null)->whereRole(null)->get();
        }
        if(Auth::user()->role == 'manager')
        {
            $managerDocuments = Document::whereFranchiseId(null)->whereRole('manager')->get();
        }
        if(Auth::user()->role == 'admin')
        {
            $documents = Document::all();
        }
        return view('document.all', compact('documents', 'franchiseDocuments', 'everyoneDocuments', 'managerDocuments'));
    }
    public function create(Request $request)
    {
        // getting all of the post data
        $document = array('file_name' => $request->file('file_name'));
        $destinationPath = 'img/documents'; // upload path
        if($request['franchise_id'])
        {
            $franchise = Franchise::whereId($request['franchise_id'])->first();
            $destinationPath = 'img/documents/'.$franchise->name.'/'; // upload path
        }
        $extension = $request->file('file_name')->getClientOriginalExtension(); // getting image extension
        $documentFileName = $request['name'].'.'.$extension; // renameing image
        $request->file('file_name')->move($destinationPath, $documentFileName); // uploading file to given path
        $request['file_name'] = $documentFileName;
        Document::create([
                'franchise_id' => $request['franchise_id'],
                'role' => $request['role'],
                'name' => $request['name'],
                'file_name' => $documentFileName
            ]
        );
        if($request['franchise_id'])
        {
            return redirect('/franchise/view/'.$request['franchise_id']);

        }
        return redirect('/documents');

    }

    public function download($id)
    {
        $file = Document::find($id);
//        return $file;
        $pathToFile = public_path() . '/img/company_documents/' . $file->file_name;
        if($file->franchise_id)
        {
            $franchise = Franchise::whereId($file->franchise_id)->first();
            $pathToFile = public_path() . '/img/documents/'.$franchise->name.'/' . $file->file_name;
        }
        return response()->download($pathToFile, $file->file_name);
    }

}
