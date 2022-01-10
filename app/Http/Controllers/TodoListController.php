<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
   	

    
    public function index() {
        // return view('welcome', ['listItems' => ListItem::all()]);
        return view('welcome', ['listItems' => ListItem::where('befejezett',0)->get()]);
    }

    public function rendbenVan($id) {
       
        $listItem = ListItem::find($id);
        $listItem->befejezett = 1;
        $listItem->save();
        // return view('welcome', ['listItems' => ListItem::all()]);
        return redirect('/');         
    }

    public function saveItem(Request $request) {
        $newListItem = new ListItem;
        $newListItem->leiras = $request->listItem;
        $newListItem->befejezett = 0;
        $newListItem->save();
       
        return redirect('/');        
    }
}
