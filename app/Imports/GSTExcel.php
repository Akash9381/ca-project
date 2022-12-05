<?php

namespace App\Imports;

use App\Models\GST;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GSTExcel implements ToModel, WithStartRow
{
    protected $user_id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDate($value, $format = 'd/m/Y')
        {
            try {
                return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
            } catch (\ErrorException $e) {
                return \Carbon\Carbon::createFromFormat($format, $value);
            }
        }


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

        return new GST([
            'user_id'           => $this->user_id,
            'arn'               => $row[0],
            'return_type'       => $row[1],
            'financial_year'    => $row[2],
            'tax_period'        => $row[3],
            'filing_date'       => $this->transformDate($row[4]),
            'status'            => $row[5],
            'mode_of_filing'    => $row[6],
        ]);
    }
}
