<?php

namespace App\Imports;

use App\Models\Candidate;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CandidatesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        // return new Candidate([
        //     //
        // ]);

        // $candidate = [
        //     'name' => $row[2],
        //     'careerSummary' => $row[3],
        //     'experience' => $row[4],
        //     'appliedOn' => $row[5],
        // ];
        $i = 0;
        foreach ($rows as $collection) 
        {
            if($i > 7){
                $row = $collection->toArray();
                dd($row);
                // $a = explode("\n",$row[2]);
                $name = trim(explode(":", explode("\n",$row[2])[0])[1], " ");
                $email = trim( explode("\n",$row[2])[7], " ");
                $phone = trim( explode("\n",$row[2])[6], " ");
                $experience_years = trim(explode(":", explode("\n",$row[4])[0])[1], " ");

                // echo trim(explode(" ",$experience_years)[0], "+");
                // echo "<br>";
                // exit;
                dd($email);
            }
            // if($row[0] == 'Name'){
            //     continue;
            // }
            $i++;
        }
        // dd($rows);

    }
}
