<?php

namespace App\Imports;

use App\Models\TDS;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TDSExcel implements ToModel,WithStartRow
{
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

    public function startRow(): int
    {
        return 2;
    }

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function model(array $row)
    {
        return new TDS([
            'user_id'               => $this->user_id,
            'token_number'          => $row[1],
            'receipt_date'          => $this->transformDate($row[2]),
            'barcode_value'         => $row[3],
            'deductor_collector_name' => $row[4],
            'financial_year'        => $row[5],
            'quarter'               => $row[6],
            'form_no'               => $row[7],
            'tan'                   => $row[8],
            'regular_correction'    => $row[9],
            'original_token_no'     => $row[10],
            'fees_charged'          => $row[12],
        ]);
    }
}
