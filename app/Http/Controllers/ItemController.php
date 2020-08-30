<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DateTime;


class ItemController extends Controller
{
    public function show(){
        $userId = auth()->user()->id;
        $items = Item::where(["uid" => $userId ])->orderBy('created_at', 'DESC')->get();
     
         return view('items',[ 'items' => $items ]);
    }

    public function create( Request $request  ){

        $request->validate([
            "title" => "required",
            "description" => "required",
        ]);

        $newItem = new Item();

        $newItem->uid = auth()->user()->id;
        $newItem->title = $request['title'];
        $newItem->description = $request['description'];
        $newItem->status = 0;
        $newItem->created_at = (new DateTime() )->getTimestamp();

        $newItem->save();

        return back()->with('success' , 'Your Todo has been added successfully');
    }

    public function changeStatus( $id ){
        
        $item = Item::findOrFail( $id );
        
        if( $item ){
            
            $item->created_at = (new DateTime() )->getTimestamp();
            $item->status = !$item->status;
            $item->save();

            return true;

        }else{
            return false;
        }

    }

    public function delete( $id ){

        $item = Item::findOrFail( $id );

        if( $item ){

            $item->delete();
            return true;

        }else{
            return false;
        }

    }
}
