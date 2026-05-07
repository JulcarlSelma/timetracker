<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrders;
use App\Models\Clients;
use App\Models\Employees;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $orderNo = isset($params['order_no']) ? $params['order_no'] : null;
        $orders = ServiceOrders::with(['client', 'assignee.person']);
        if (isset($orderNo)) {
            $orders->where('order_no', $orderNo);
        }

        $orders = $orders->paginate(10);
        $clients = Clients::get();
        $employees = Employees::with('person')->get();
        return view('pages.service_orders.index', compact('orders', 'clients', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::get();
        $employees = Employees::with('person')->get();
        return view('pages.service_orders.create', compact('clients', 'employees'));
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
            'client_id' => 'required',
            'assigned_employee_id' => 'nullable',
            'requested_date' => 'required',
            'complain_or_request' => 'required',
            'jobs_done' => 'nullable',
            'findings' => 'nullable',
            'remarks' => 'nullable',
            'printed_name' => 'nullable',
            'done_date' => 'nullable',
            'status' => ['required', 'in:OPEN,CLOSED'],
        ]);

        $rtn = ServiceOrders::store($request->all());

        if ($rtn) {
            return redirect()->route('service_orders.index')->with('success', ['Saved', 'success']);
        }

        return redirect()->back()->with('error', ['Something went wrong', 'danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceOrders $serviceOrder)
    {
        $serviceOrder->load(['client', 'assignee.person']);
        return view('pages.service_orders.print', compact('serviceOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceOrders $serviceOrder)
    {
        $clients = Clients::get();
        $employees = Employees::with('person')->get();
        return view('pages.service_orders.edit', compact('clients', 'employees', 'serviceOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceOrders $serviceOrder)
    {
        $request->validate([
            'client_id' => 'required',
            'assigned_employee_id' => 'nullable',
            'requested_date' => 'required',
            'complain_or_request' => 'required',
            'jobs_done' => 'nullable',
            'findings' => 'nullable',
            'remarks' => 'nullable',
            'printed_name' => 'nullable',
            'done_date' => 'nullable',
            'status' => ['required', 'in:OPEN,CLOSED'],
        ]);

        $rtn = ServiceOrders::updater($request->all(), $serviceOrder);

        if ($rtn) {
            return redirect()->route('service_orders.index')->with(['msg' => 'Updated']);
        }

        return redirect()->back()->with(['msg' => 'Something went wrong']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOrders $serviceOrder)
    {
        $rtn = ServiceOrders::destroy($serviceOrder);

        if ($rtn) {
            return redirect()->route('service_orders.index')->with(['msg' => 'Deleted']);
        }

        return redirect()->back()->with(['msg' => 'Something went wrong']);
    }
}
