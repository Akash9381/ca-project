<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UserExcel implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
        $user = User::updateOrCreate([
            'email'=> $row[1],
            'pan_card'=> $row[3]
            ],
            [
            'name'=> $row[0],
            'email'=> $row[1],
            'number'=> $row[2],
            'pan_card'=> $row[3],
            'city'=> $row[4]
        ]);

        $user->assignRole('user');
        return $user;
    }
}
