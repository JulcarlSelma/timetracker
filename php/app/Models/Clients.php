<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clients extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'phone',
        'mobile',
        'address',
    ];
    

    public static function store($params)
    {
        DB::beginTransaction();
        try {
            self::create([
                'name' => $params['name'],
                'contact_person' => $params['contact_person'],
                'email' => $params['email'],
                'phone' => $params['phone'],
                'mobile' => $params['mobile'],
                'address' => $params['address'],
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::error(get_class().' store: '.$e);
            DB::rollback();
            return false;
        }
    }

    public static function updater($params, $client)
    {
        DB::beginTransaction();
        try {
            $client->update([
                'name' => $params['name'],
                'contact_person' => $params['contact_person'],
                'email' => $params['email'],
                'phone' => $params['phone'],
                'mobile' => $params['mobile'],
                'address' => $params['address'],
            ]);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::error(get_class().' updater: '.$e);
            DB::rollback();
            return false;
        }
    }

    public static function destroy($client)
    {
        DB::beginTransaction();
        try {
            $client->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            \Log::error(get_clas().' destroy: '.$e);
            DB::rollback();
            return false;
        }
    }
}
