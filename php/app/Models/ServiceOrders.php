<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceOrders extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'service_orders';

    protected $fillable = [
        'order_no',
        'client_id',
        'assigned_employee_id',
        'requested_date',
        'complain_or_request',
        'jobs_done',
        'findings',
        'remarks',
        'printed_name',
        'done_date',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Clients', 'client_id', 'id');
    }
    public function assignee()
    {
        return $this->belongsTo('App\Models\Employees', 'assigned_employee_id', 'id');
    }
    

    public static function store($params)
    {
        DB::beginTransaction();
        try {
            $created = self::create([
                'client_id' => $params['client_id'],
                'assigned_employee_id' => $params['assigned_employee_id'],
                'requested_date' => $params['requested_date'],
                'complain_or_request' => $params['complain_or_request'],
                'jobs_done' => $params['jobs_done'],
                'findings' => $params['findings'],
                'remarks' => $params['remarks'],
                'printed_name' => $params['printed_name'],
                'done_date' => $params['done_date'],
                'status' => $params['status'],
            ]);

            $so = self::find($created->id);
            $so->update([
                'order_no' => str_pad($created->id, 4, '0', STR_PAD_LEFT)
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::error(get_class().' store: '.$e);
            DB::rollback();
            return false;
        }
    }

    public static function updater($params, $service_order)
    {
        DB::beginTransaction();
        try {
            $service_order->update([
                'client_id' => $params['client_id'],
                'assigned_employee_id' => $params['assigned_employee_id'],
                'requested_date' => $params['requested_date'],
                'complain_or_request' => $params['complain_or_request'],
                'jobs_done' => $params['jobs_done'],
                'findings' => $params['findings'],
                'remarks' => $params['remarks'],
                'printed_name' => $params['printed_name'],
                'done_date' => $params['done_date'],
                'status' => $params['status'],
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::error(get_class().' updater: '.$e);
            DB::rollback();
            return false;
        }
    }

    public static function destroy($service_order)
    {
        DB::beginTransaction();
        try {
            $service_order->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::error(get_clas().' destroy: '.$e);
            DB::rollback();
            return false;
        }
    }
}
