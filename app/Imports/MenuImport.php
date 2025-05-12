<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MenuImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Extract id_tuan and thu from the row
            $id_tuan = $row[0];
            $thu = $row[1];

            // Find the record with matching id_tuan and thu
            $record = YourModel::where('id_tuan', $id_tuan)
                            ->where('thu', $thu)
                            ->first();

            if ($record) {
                // Update the null cells
                foreach ($row as $index => $value) {
                    $column = $this->getColumnName($index);
                    if (is_null($record->$column) && !is_null($value)) {
                        $record->$column = $value;
                    }
                }
                $record->save();
            }
        }
    }
    
    private function getColumnName($index)
    {
        // Map index to column names
        $columns = [
            2 => 'sang1',
            3 => 'sang2',
            4 => 'chinh',
            5 => 'rau',
            6 => 'canh',
            7 => 'com',
            8 => 'chao',
            9 => 'chieu1',
            10 => 'chieu2',
            11 => 'nhe'
        ];

        return $columns[$index] ?? null;
    }
    
}
