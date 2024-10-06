<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Leave extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'date_from',
        'date_to',
        'half_day_am',
        'half_day_pm',
        'status_id',
        'status_change_at',
        'negative_status_reason',
        'leave_type_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted_by',
        'deleted_at'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(){
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function leaveStatus(){
        return $this->belongsTo(LeaveStatus::class, 'status_id');
    }

    public function leaveType(){
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function calculateLeaveDays($dateFrom, $dateTo, $workWeekends)
    {
        $start = Carbon::parse($dateFrom);
        $end = Carbon::parse($dateTo);

        $dayCount = 0;

        for ($date = $start; $date->lte($end); $date->addDay()) {
            if ($workWeekends == 0 && ($date->isWeekend())) {
                continue; // Skip weekends
            }
            $dayCount++;
        }

        return $dayCount;
    }
}
