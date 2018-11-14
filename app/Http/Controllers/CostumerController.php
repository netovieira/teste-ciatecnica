<?php

namespace App\Http\Controllers;

use App\Costumer;
use App\CostumerEnterprise;
use App\CostumerPeople;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('costumer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costumer.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $type = $data['costumer']['costumer_type'];
        unset($data['costumer']['costumer_type']);
        $model = 'App\\'.$type;

        $data[$type]['document'] = preg_replace( '/[^0-9]/', '', $data[$type]['document'] );
        $data['costumer']['zipcode'] = preg_replace( '/[^0-9]/', '', $data['costumer']['zipcode'] );

        if(isset($data[$type]['birthday'])) {
            $birthday = strtotime($data[$type]['birthday']);
            $data[$type]['birthday'] = date('Y-m-d', $birthday);
        }

        $CostumerType = new $model($data[$type]);

        //dd($data[$type]);

        $CostumerType->update($data[$type]);
        $CostumerType->save();

        $error = $CostumerType->Costumer()->create($data['costumer']);
        return view('costumer.confirm', compact($error));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
