<?php

namespace App\Http\Controllers\Admin;

use App\Transport;
use App\TransportRoute;
use App\Center;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::where('status',1)->get();
        $routes = TransportRoute::get(['id','name']);
        $transports = Transport::all();
        return view('admin.transport.add',compact('centers','routes','transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transport.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'center' => 'required|numeric',
            'driver_name' => 'required|max:199',
            'driver_contact' => 'required|max:199',
            'vehical_no' => 'required|max:199',
            'bus_name' => 'required|max:199',
            'first_stoppage' => 'required|max:199',
            'last_stoppage' => 'required|max:199',
            'bus_starting_time' => 'required|max:199',
            'bus_arrival_time' => 'required|max:199',
            'bus_terminal' => 'required|max:199',
            'route' => 'required|integer',
        ]);
        $transport = new Transport();
        $transport->center_id =$request->center;
        $transport->driver_name =$request->driver_name;
        $transport->driver_contact =$request->driver_contact;
        $transport->vehical_no =$request->vehical_no;
        $transport->bus_name =$request->bus_name;
        $transport->first_stoppage =$request->first_stoppage;
        $transport->last_stoppage =$request->last_stoppage;
        $transport->bus_starting_time =$request->bus_starting_time;
        $transport->bus_arrival_time =$request->bus_arrival_time;
        $transport->bus_terminal =$request->bus_terminal;
        $transport->route_id =$request->route;
        if ($transport->save()) {
            return redirect()->back()->with(['class'=>'success','message'=>'transport created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    public function search(Request $request)
    {
        $radio = null;
        foreach(Transport::where(['route_id'=>$request->route_id,'center_id'=>$request->center_id])->get() as $transport){
            $radio .='<label><input type="radio" value="'.$transport->id.'" name="driver_id"> '.$transport->driver_name.'</label> &nbsp;&nbsp;';
        }
        return response()->json($radio);
    }
    public function searchRoute(Request $request)
    {
        $route = \App\TransportRoute::all();
        return response()->json($route);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\TransportRoute  $transportRoute
     * @return \Illuminate\Http\Response
     */
    public function show(Transport $transport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransportRoute  $transportRoute
     * @return \Illuminate\Http\Response
     */
    public function edit(Transport $transport)
    {
        $centers = Center::where('status',1)->get();
        $routes = TransportRoute::get(['id','name']);
        return view('admin.transport.edit',compact('centers','routes','transport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransportRoute  $transportRoute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transport $transport)
    {
        $this->validate($request,[
            'center' => 'required|numeric',
            'driver_name' => 'required|max:199',
            'driver_contact' => 'required|max:199',
            'vehical_no' => 'required|max:199',
            'bus_name' => 'required|max:199',
            'first_stoppage' => 'required|max:199',
            'last_stoppage' => 'required|max:199',
            'bus_starting_time' => 'required|max:199',
            'bus_arrival_time' => 'required|max:199',
            'bus_terminal' => 'required|max:199',
            'route' => 'required|integer',
        ]);
        $transport->center_id =$request->center;
        $transport->driver_name =$request->driver_name;
        $transport->driver_contact =$request->driver_contact;
        $transport->vehical_no =$request->vehical_no;
        $transport->bus_name =$request->bus_name;
        $transport->first_stoppage =$request->first_stoppage;
        $transport->last_stoppage =$request->last_stoppage;
        $transport->bus_starting_time =$request->bus_starting_time;
        $transport->bus_arrival_time =$request->bus_arrival_time;
        $transport->bus_terminal =$request->bus_terminal;
        $transport->route_id =$request->route;
        if ($transport->save()) {
            return redirect()->route('admin.transport.list')->with(['class'=>'success','message'=>'transport updated success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransportRoute  $transportRoute
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransportRoute $transportRoute)
    {
        //
    }
}
