<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Incident;
use App\Models\Project;
use Illuminate\Http\Request;

class IncidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getReport() {
        $categories =Category::where('project_id',1)->get();
        return view('incidents.create')->with(compact('categories'));
    }

    public function storeReport(Request $request) {

        $rules=[
            'category_id'=>'sometimes|exists:categories,id',
            'severity'   =>'required|in:M,N,A',
            'title'     =>'required|min:5',
            'descripcion' =>'required|min:15'
        ];
        $this->validate($request,$rules);

        $incident = new Incident();
        $incident->category_id = $request->input('category_id') ?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->descripcion= $request->input('descripcion');
        $user =auth()->user();
        $incident->client_id = $user->id;
        $incident->project_id = $user->selected_project_id;
        $incident->level_id = Project::find($user->selected_project_id)->first_level_id;
        $incident->save();
        return back();
        //dd($request->all());
    }

    public function showReport($id){
        $incident = Incident::findOrFail($id);
        //$messages = $incident->messages;
        return view('incidents.show')->with(compact('incident'));
    }
}
