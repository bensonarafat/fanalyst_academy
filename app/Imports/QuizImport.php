<?php

namespace App\Imports;

use App\Models\Quiz;
use Maatwebsite\Excel\Concerns\ToModel;

class QuizImport implements  ToModel
{
    protected $topic;
    protected $qid;

    public function __construct($topic, $qid){
        $this->topic = $topic;
        $this->qid = $qid;
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
            "qid" => $this->qid,
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
