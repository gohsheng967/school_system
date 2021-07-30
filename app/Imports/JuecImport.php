<?php

namespace App\Imports;

use App\Models\Juec;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;

use Throwable;

class JuecImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $rows)
    {   
        return new Juec([
                'year' => $rows['year'],
                'students_id' => $rows['students_id'],
                'chinese' => $rows['chinese'],
                'malay' => $rows['malay'],
                'english' => $rows['english'],
                'math' => $rows['math'],
                'sains' => $rows['sains'],
                'history' => $rows['history'],
                'geo' => $rows['geo'],
                'art' => $rows['art'],
        ]);
    }
   


}
