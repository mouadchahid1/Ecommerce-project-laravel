<?php

namespace App\Exports;

use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\FromCollection; 
use Maatwebsite\Excel\Concerns\WithHeadings;

class PermissionExport implements FromCollection ,  WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permission::all("id","name","group_name","created_at");
    } 
    public function headings(): array
    {
        return [
            'ID',
            'Permission Name',
            'Group Name',
            'Created At',
        ];
    }
}
