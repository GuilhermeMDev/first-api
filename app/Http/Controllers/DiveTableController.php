<?php

namespace App\Http\Controllers;

use App\Models\DataDive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiveTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request)
    {
        return DataDive::query()
            ->where('depth', '>=', (int)$request->query->get('depth')) //type cast -> forçando um tipo
            ->get()
            ->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $table
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show(Request $request, $table)
    {
        dd($request->query->get('depth'));
    }

//        return \response()->json([
//            'message' => 'Tabela não localizada no banco de dados'
//        ], 404);
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
