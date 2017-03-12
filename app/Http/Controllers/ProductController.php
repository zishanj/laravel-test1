<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;

class ProductController extends Controller
{
    /**
     * View all created products
     *
     * @return Response
     */
    public function index() {
        $data = [];
        if (Storage::disk('local')->exists('data.json'))
            $data = json_decode(Storage::get('data.json'), true);
        
        return Response::json($data);
    }
    
    /**
     * Store a newly created product in JSON file.
     *
     * @return Response
     */
    public function store(Request $request) {
        if ($request->get('updatedData')) {
            $data = $request->get('updatedData');
            Storage::put('data.json', json_encode(is_array($data)?$data:[$data]));
            return Response::json(array('success' => true));
        }
        $old_data = [];
        $data = ['name'=>$request->get('name'), 'quantity'=>$request->get('quantity'), 'price'=>$request->get('price'), 'date'=>date("F j, Y g:i a")];
        if (Storage::disk('local')->exists('data.json'))
            $old_data = json_decode(Storage::get('data.json'), true);
        
        array_push($old_data, $data);
        $new_data = json_encode($old_data);
        Storage::put('data.json', $new_data);
        return Response::json(array('success' => true));
    }
}
