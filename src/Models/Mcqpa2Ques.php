<?php
namespace Edgewizz\Mcqpa2\Models;

use Illuminate\Database\Eloquent\Model;

class Mcqpa2Ques extends Model{
    public function answers(){
        return $this->hasMany('Edgewizz\Mcqpa2\Models\Mcqpa2Ans', 'question_id');
    }
    protected $table = 'fmt_mcqpa2_ques';
}