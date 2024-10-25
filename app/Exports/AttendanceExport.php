<?php
namespace App\Exports;

use App\Models\UserAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
{
    protected $user;
    protected $userAttendance;

    public function __construct($user, $userAttendance)
    {
        $this->user = $user;
        $this->userAttendance = $userAttendance;
    }

    public function collection()
    {
        $data = [];

        foreach ($this->userAttendance as $attendance) {
            $data[] = [
                'Start Time' => $attendance->slot->start_time,
                'End Time' => $attendance->slot->end_time,
                'Status' => $attendance->status,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Start Time',
            'End Time',
            'Status',
        ];
    }
}
