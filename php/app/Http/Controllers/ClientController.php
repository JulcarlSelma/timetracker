<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::paginate(10);
        return view('pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact_person' => 'nullable',
            'email' => 'nullable|max:100',
            'phone' => 'nullable|max:20',
            'mobile' => 'nullable|max:20',
            'address' => 'nullable',
        ]);

        $rtn = Clients::store($request->all());

        if ($rtn) {
            return redirect()->route('clients.index')->with('success', ['Saved', 'success']);
        }

        return redirect()->back()->with('error', ['Something went wrong', 'danger']);
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
    public function edit(Clients $client)
    {
        return view('pages.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $client)
    {
        $request->validate([
            'name' => 'required',
            'contact_person' => 'nullable',
            'email' => 'nullable|max:100',
            'phone' => 'nullable|max:20',
            'mobile' => 'nullable|max:20',
            'address' => 'nullable',
        ]);

        $rtn = Clients::updater($request->all(), $client);

        if ($rtn) {
            return redirect()->route('clients.index')->with(['msg' => 'Updated']);
        }

        return redirect()->back()->with(['msg' => 'Something went wrong']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        $rtn = Clients::destroy($client);

        if ($rtn) {
            return redirect()->route('clients.index')->with(['msg' => 'Deleted']);
        }

        return redirect()->back()->with(['msg' => 'Something went wrong']);
    }
}
