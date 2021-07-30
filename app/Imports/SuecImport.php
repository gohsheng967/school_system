<?php

namespace App\Imports;

use App\Models\Suec;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Throwable;

class SuecImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $rows)
    {   
        return new Suec([
                'year' => $rows['year'],
                'students_id' => $rows['students_id'],
                'chinese' => $rows['chinese'],
                'malay' => $rows['malay'],
                'english' => $rows['english'],
                'math' => $rows['math'],
                'addmath' => $rows['addmath'],
                'addmath1' => $rows['addmath1'],
                'addmath2' => $rows['addmath2'],
                'history' => $rows['history'],
                'geo' => $rows['geo'],
                'bio' => $rows['bio'],
                'che' => $rows['che'],
                'fizik' => $rows['fizik'],
                'business' => $rows['business'],
                'bk' => $rows['bk'],
                'economic' => $rows['economic'],
                'computer' => $rows['computer'],
                'art' => $rows['art'],
                'art_work' => $rows['art_work'],
                'art_practical' => $rows['art_practical'],
                'account' => $rows['account'],

        ]);
    }
}
