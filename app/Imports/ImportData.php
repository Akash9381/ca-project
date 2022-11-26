<?php

namespace App\Imports;

use App\Models\ExcelData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportData implements ToModel, WithStartRow
{
    protected $user_id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new ExcelData([
            'user_id'=> $this->user_id,
            'assessment_year'=>$row[0],
            'filing_type'=>$row[1]
        ]);
    }
}
