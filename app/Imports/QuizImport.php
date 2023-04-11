<?php

namespace App\Imports;

use App\Models\Quiz;
use Maatwebsite\Excel\Concerns\ToModel;

class QuizImport implements  ToModel
{
    protected $topic;

    public function __construct($topic){
        $this->topic = $topic;
    }



    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Quiz([
            "topic" => $this->topic,
            "question" => $row[1],
            "a" => $row[2],
            "b" => $row[3],
            "c" => $row[4],
            "d" => $row[5],
            "e" => $row[6],
            "answer_option" => $row[7],
            "explanation" => $row[8],
        ]);
    }
}
