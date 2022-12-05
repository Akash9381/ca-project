<?php

namespace App\Imports;

use App\Models\TaxAudit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TaxAuditExcel implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function transformDate($value, $format = 'd-M-Y')
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
        return new TaxAudit([
            'user_id'           => $this->user_id,
            'pan_card'          => $row[0],
            'acknowledgment_no' => $row[1],
            'filing_date'       => $this->transformDate($row[2]),
            'assessment_year'   => $row[3],
            'filing_type'       => $row[4],
            'status'            => $row[5],
            'filed_by'          => $row[6],
        ]);
    }
}
