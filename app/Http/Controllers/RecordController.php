<?php
/*  KB - 26-01-2025
    RecordController
    used to control records display and editing
*/
namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
  // paginates the records in sets of 15
  public function index(){
    return view('dashboard.index', ['records' => DB::table('records')->paginate(15)]);
  }
  // goes to create view
  public function create() {
    return View('dashboard.create');
  }

  // adds the new entry to data, return to dashboard
  public function store(Request $request){
    $request->validate([
      'title' => 'required|string|max:255',
      'category' => 'required|string|max:255',
      'body' => 'required',
    ]);

    if($request['is_draft'] === 'on'){
      $request['is_draft'] = 1;
    } else {
      $request['is_draft'] = 0;
    }

    Record::create($request->all());
    return redirect()->route('dashboard.index');
  }

  //shows the selected id full data
  public function show($id){
    $record = Record::find($id);


    return view('dashboard.view', [ 'record' => $record]);
  }

  //updates the current selected and returns to dashboard
  public function update(Request $request, $id){
    $record = Record::findOrFail($id);
    if($request['is_draft'] === 'on'){
      $request['is_draft'] = 1;
    } else {
      $request['is_draft'] = 0;
    }
    $record->update($request->all());
    return redirect()->route('dashboard.index');
  }

  //deletes the current selected and returns to dashboard
  public function destroy($id){
    $record = Record::findOrFail($id);
    $record->delete();
    return redirect()->route('dashboard.index');
  }
}
