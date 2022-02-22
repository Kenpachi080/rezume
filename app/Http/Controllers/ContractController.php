<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\FavoriteContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function view()
    {
        $UserID = Auth::id();
        $contacts = $this->get_contact();
        $favorites = $this->get_favorite($UserID);
        return view('welcome', ['contacts' => $contacts, 'favorites' => $favorites]);
    }


    public function create_contact(Request $request)
    {
        $UserID = Auth::id();
        $contacts = $this->get_contact($request);
        $favorites = $this->get_favorite($UserID);
        return redirect()->route('home', ['contacts' => $contacts, 'favorites' => $favorites,]);
    }

    public function favorite(Request $request)
    {
        $UserID = Auth::id();
        $id = $request->id;
        FavoriteContactModel::create(['UserID' => $UserID, 'FavoriteID' => $id]);
        $contacts = $this->get_contact();
        $favorites = $this->get_favorite($UserID);
        return redirect()->route('home', ['contacts' => $contacts, 'favorites' => $favorites,]);
    }

    public function favoriteDelete(Request $request)
    {
        $UserID = Auth::id();
        $id = $request->id;
        $favorite = FavoriteContactModel::where('FavoriteID', '=', "$id")
            ->where('UserID', '=', "$UserID");
        $favorite->forceDelete();
        $contacts = $this->get_contact();
        $favorites = $this->get_favorite($UserID);
        return redirect()->route('home', ['contacts' => $contacts, 'favorites' => $favorites,]);
    }

    private function get_contact($request = '')
    {
        if ($request != '') {
            ContactModel::create();
        }
        $contacts = ContactModel::all();
        return $contacts;
    }

    private function get_favorite($UserID)
    {
        $favorites = FavoriteContactModel::where('UserID', '=', $UserID)->get();
        $value = [];
        foreach ($favorites as $favorite) {
            array_push($value, $favorite->FavoriteID);
        }
        return $value;
    }
}
