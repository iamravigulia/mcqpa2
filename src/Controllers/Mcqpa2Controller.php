<?php

namespace edgewizz\mcqpa2\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Media;
use Edgewizz\Edgecontent\Models\ProblemSetQues;
use Edgewizz\Mcqpa2\Models\Mcqpa2Ans;
use Edgewizz\Mcqpa2\Models\Mcqpa2Ques;
use Illuminate\Http\Request;

class Mcqpa2Controller extends Controller
{
    //
    public function test(){
        dd('hello');
    }
    public function store(Request $request){
        $pmQ = new Mcqpa2Ques();
        $pmQ->question = $request->question;
        $pmQ->difficulty_level_id = $request->difficulty_level_id;
        $pmQ->format_title = $request->format_title;
        if($request->question_1_audio){
            $question_1_audio = new Media();
            $request->question_1_audio->storeAs('public/questions', time().$request->question_1_audio->getClientOriginalName());
            $question_1_audio->url = 'questions/'.time().$request->question_1_audio->getClientOriginalName();
            $question_1_audio->save();
            $pmQ->media_id = $question_1_audio->id;
        }
        $pmQ->hint = $request->hint;
        $pmQ->save();
        /* answer1 */
        if($request->answer_1){
            $answer_1 = new Mcqpa2Ans();
            $answer_1->question_id = $pmQ->id;
            $answer_1->answer = $request->answer_1;
            if($request->answer_1_image){
                $answer_1_image = new Media();
                $request->answer_1_image->storeAs('public/questions', time().$request->answer_1_image->getClientOriginalName());
                $answer_1_image->url = 'questions/'.time().$request->answer_1_image->getClientOriginalName();
                $answer_1_image->save();
                $answer_1->media_id = $answer_1_image->id;
            }
            if ($request->ans_correct_1) {
                $answer_1->arrange = 1;
            }
            $answer_1->eng_word = $request->eng_word1;
            $answer_1->save();
        }
        /* //answer1 */
        /* answer2 */
        if($request->answer_2){
            $answer_2 = new Mcqpa2Ans();
            $answer_2->question_id = $pmQ->id;
            $answer_2->answer = $request->answer_2;
            if($request->answer_2_image){
                $answer_2_image = new Media();
                $request->answer_2_image->storeAs('public/questions', time().$request->answer_2_image->getClientOriginalName());
                $answer_2_image->url = 'questions/'.time().$request->answer_2_image->getClientOriginalName();
                $answer_2_image->save();
                $answer_2->media_id = $answer_2_image->id;
            }
            if ($request->ans_correct_2) {
                $answer_2->arrange = 1;
            }
            $answer_2->eng_word = $request->eng_word2;
            $answer_2->save();
        }
        /* //answer2 */
        /* answer3 */
        if($request->answer_3){
            $answer_3 = new Mcqpa2Ans();
            $answer_3->question_id = $pmQ->id;
            $answer_3->answer = $request->answer_3;
            if($request->answer_3_image){
                $answer_3_image = new Media();
                $request->answer_3_image->storeAs('public/questions', time().$request->answer_3_image->getClientOriginalName());
                $answer_3_image->url = 'questions/'.time().$request->answer_3_image->getClientOriginalName();
                $answer_3_image->save();
                $answer_3->media_id = $answer_3_image->id;
            }
            if ($request->ans_correct_3) {
                $answer_3->arrange = 1;
            }
            $answer_3->eng_word = $request->eng_word3;
            $answer_3->save();
        }
        /* //answer3 */
        /* answer4 */
        if($request->answer_4){
            $answer_4 = new Mcqpa2Ans();
            $answer_4->question_id = $pmQ->id;
            $answer_4->answer = $request->answer_4;
            if($request->answer_4_image){
                $answer_4_image = new Media();
                $request->answer_4_image->storeAs('public/questions', time().$request->answer_4_image->getClientOriginalName());
                $answer_4_image->url = 'questions/'.time().$request->answer_4_image->getClientOriginalName();
                $answer_4_image->save();
                $answer_4->media_id = $answer_4_image->id;
            }
            if ($request->ans_correct_4) {
                $answer_4->arrange = 1;
            }
            $answer_4->eng_word = $request->eng_word4;
            $answer_4->save();
        }
        /* //answer4 */
        /* answer5 */
        if($request->answer_5){
            $answer_5 = new Mcqpa2Ans();
            $answer_5->question_id = $pmQ->id;
            $answer_5->answer = $request->answer_5;
            if($request->answer_5_image){
                $answer_5_image = new Media();
                $request->answer_5_image->storeAs('public/questions', time().$request->answer_5_image->getClientOriginalName());
                $answer_5_image->url = 'questions/'.time().$request->answer_5_image->getClientOriginalName();
                $answer_5_image->save();
                $answer_5->media_id = $answer_5_image->id;
            }
            if ($request->ans_correct_5) {
                $answer_5->arrange = 1;
            }
            $answer_5->eng_word = $request->eng_word5;
            $answer_5->save();
        }
        /* //answer5 */
        /* answer6 */
        if($request->answer_6){
            $answer_6 = new Mcqpa2Ans();
            $answer_6->question_id = $pmQ->id;
            $answer_6->answer = $request->answer_6;
            if($request->answer_6_image){
                $answer_6_image = new Media();
                $request->answer_6_image->storeAs('public/questions', time().$request->answer_6_image->getClientOriginalName());
                $answer_6_image->url = 'questions/'.time().$request->answer_6_image->getClientOriginalName();
                $answer_6_image->save();
                $answer_6->media_id = $answer_6_image->id;
            }
            if ($request->ans_correct_6) {
                $answer_6->arrange = 1;
            }
            $answer_6->eng_word = $request->eng_word6;
            $answer_6->save();
        }
        /* //answer6 */
        if($request->problem_set_id && $request->format_type_id){
            $pbq = new ProblemSetQues();
            $pbq->problem_set_id = $request->problem_set_id;
            $pbq->question_id = $pmQ->id;
            $pbq->format_type_id = $request->format_type_id;
            $pbq->save();
        }
        return back();
    }
    public function update($id, Request $request){
        $q = Mcqpa2Ques::where('id', $id)->first();
        $q->question = $request->question;
        $q->difficulty_level_id = $request->difficulty_level_id;
        $q->format_title = $request->format_title;
        // $q->level_id = $request->question_level;
        // $q->score = $request->question_score;
        $q->hint = $request->hint;
        if($request->question_1_audio){
            $question_1_audio = new Media();
            $request->question_1_audio->storeAs('public/questions', time().$request->question_1_audio->getClientOriginalName());
            $question_1_audio->url = 'questions/'.time().$request->question_1_audio->getClientOriginalName();
            $question_1_audio->save();
            $q->media_id = $question_1_audio->id;
        }
        $q->save();
        $answers = Mcqpa2Ans::where('question_id', $q->id)->get();
        foreach($answers as $ans){
            $inputAnswer = 'answer'.$ans->id;
            if($request->$inputAnswer){
                $inputArrange = 'ans_correct'.$ans->id;
                $ans->answer = $request->$inputAnswer;
                $inputEngWord = 'eng_word'.$ans->id;
                $ans->eng_word = $request->$inputEngWord;
                if($request->$inputArrange){
                    $ans->arrange = 1;
                }else{
                    $ans->arrange = 0;
                }
                $ans->save();
            }
        }
        $anss = Mcqpa2Ans::where('question_id', $q->id)->get();
        foreach($anss as $ans){
            // answer_{{$answer->id}}_image
            $inputImage = 'answer_'.$ans->id.'_image';
            if($request->$inputImage){
                $audio = new Media();
                $request->$inputImage->storeAs('public/questions', time().$request->$inputImage->getClientOriginalName());
                $audio->url = 'questions/'.time().$request->$inputImage->getClientOriginalName();
                $audio->save();
                $ans->media_id = $audio->id;
                $ans->save();
            }
        }
        return back();
    }

    public function delete($id){
        $f = Mcqpa2Ques::where('id', $id)->first();
        $f->delete();
        $ans = Mcqpa2Ans::where('question_id', $f->id)->pluck('id');
        if($ans){
            foreach($ans as $a){
                $f_ans = Mcqpa2Ans::where('id', $a)->first();
                $f_ans->delete();
            }
        }
        return back();
    }
    public function inactive($id){
        $f = Mcqpa2Ques::where('id', $id)->first();
        $f->active = '0';
        $f->save();
        return back();
    }
    public function active($id){
        $f = Mcqpa2Ques::where('id', $id)->first();
        $f->active = '1';
        $f->save();
        return back();
    }
    public function imagecsv($question_image, $images){
        foreach($images as $valueImage){
            $uploadImage = explode(".", $valueImage->getClientOriginalName());
            if($uploadImage[0] == $question_image){
                // dd($valueImage);
                $media = new Media();
                $valueImage->storeAs('public/question_images', time() . $valueImage->getClientOriginalName());
                $media->url = 'question_images/' . time() . $valueImage->getClientOriginalName();
                $media->save();
                return $media->id;
            }
        }
    }
    public function csv_upload(Request $request){
        $file = $request->file('file');
        $images = $request->file('images');
        $audio = $request->file('audio');
        // dd($file);
        // File Details
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        // Valid File Extensions
        $valid_extension = array("csv");
        // 2MB in Bytes
        $maxFileSize = 2097152;
        // Check file extension
        if (in_array(strtolower($extension), $valid_extension)) {
            // Check file size
            if ($fileSize <= $maxFileSize) {
                // File upload location
                $location = 'uploads';
                // Upload file
                $file->move($location, $filename);
                // Import CSV to Database
                $filepath = public_path($location . "/" . $filename);
                // Reading file
                $file = fopen($filepath, "r");
                $importData_arr = array();
                $i = 0;
                while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                    $num = count($filedata);
                    // Skip first row (Remove below comment if you want to skip the first row)
                    if ($i == 0) {
                        $i++;
                        continue;
                    }
                    for ($c = 0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata[$c];
                    }
                    $i++;
                }
                fclose($file);
                // Insert to MySQL database
                foreach ($importData_arr as $importData) {
                    $insertData = array(
                        "question" => $importData[1],
                        "question_media" => $importData[2],

                        "answer1" => $importData[3],
                        "image1" => $importData[4],
                        "arrange1" => $importData[5],

                        "answer2" => $importData[6],
                        "image2" => $importData[7],
                        "arrange2" => $importData[8],

                        "answer3" => $importData[9],
                        "image3" => $importData[10],
                        "arrange3" => $importData[11],

                        "answer4" => $importData[12],
                        "image4" => $importData[13],
                        "arrange4" => $importData[14],

                        "level" => $importData[15],

                    );
                    // var_dump($insertData['answer1']);
                    /*  */
                    if ($insertData['question']) {
                        $fill_Q = new Mcqpa2Ques();
                        $fill_Q->question = $insertData['question'];
                        $fill_Q->format_title = $request->format_title;
                        if(!empty($insertData['level'])){
                            if($insertData['level'] == 'easy'){
                                $fill_Q->difficulty_level_id = 1;
                            }else if($insertData['level'] == 'medium'){
                                $fill_Q->difficulty_level_id = 2;
                            }else if($insertData['level'] == 'hard'){
                                $fill_Q->difficulty_level_id = 3;
                            }
                        }
                        if (!empty($insertData['question_media']) && $insertData['question_media'] != '') {
                            $media_id = $this->imagecsv($insertData['question_media'], $audio);
                            $fill_Q->media_id = $media_id;
                        }
                        // $m2 = new Media();
                        // $m2->url = $insertData['question_media'];
                        // $m2->save();
                        // $fill_Q->media_id = $m2->id;
                        $fill_Q->save();
                        if($request->problem_set_id && $request->format_type_id){
                            $pbq = new ProblemSetQues();
                            $pbq->problem_set_id = $request->problem_set_id;
                            $pbq->question_id = $fill_Q->id;
                            $pbq->format_type_id = $request->format_type_id;
                            $pbq->save();
                        }
                        if ($insertData['answer1'] == '-') {
                        } else {
                            $f_Ans1 = new Mcqpa2Ans();
                            $f_Ans1->question_id = $fill_Q->id;
                            $f_Ans1->answer = $insertData['answer1'];
                            if (!empty($insertData['image1']) && $insertData['image1'] != '') {
                                $media_id = $this->imagecsv($insertData['image1'], $images);
                                $f_Ans1->media_id = $media_id;
                            }
                            // $m = new Media();
                            // $m->url = $insertData['image1'];
                            // $m->save();
                            // $f_Ans1->media_id = $m->id;
                            $f_Ans1->arrange = $insertData['arrange1'];
                            $f_Ans1->save();
                        }
                        if ($insertData['answer2'] == '-') {
                        } else {
                            $f_Ans2 = new Mcqpa2Ans();
                            $f_Ans2->question_id = $fill_Q->id;
                            $f_Ans2->answer = $insertData['answer2'];
                            if (!empty($insertData['image2']) && $insertData['image2'] != '') {
                                $media_id = $this->imagecsv($insertData['image2'], $images);
                                $f_Ans2->media_id = $media_id;
                            }
                            // $m = new Media();
                            // $m->url = $insertData['image2'];
                            // $m->save();
                            // $f_Ans2->media_id = $m->id;
                            $f_Ans2->arrange = $insertData['arrange2'];
                            $f_Ans2->save();
                        }
                        if ($insertData['answer3'] == '-') {
                        } else {
                            $f_Ans3 = new Mcqpa2Ans();
                            $f_Ans3->question_id = $fill_Q->id;
                            $f_Ans3->answer = $insertData['answer3'];
                            if (!empty($insertData['image3']) && $insertData['image3'] != '') {
                                $media_id = $this->imagecsv($insertData['image3'], $images);
                                $f_Ans3->media_id = $media_id;
                            }
                            // $m = new Media();
                            // $m->url = $insertData['image3'];
                            // $m->save();
                            // $f_Ans3->media_id = $m->id;
                            $f_Ans3->arrange = $insertData['arrange3'];
                            $f_Ans3->save();
                        }
                        if ($insertData['answer4'] == '-') {
                        } else {
                            $f_Ans4 = new Mcqpa2Ans();
                            $f_Ans4->question_id = $fill_Q->id;
                            $f_Ans4->answer = $insertData['answer4'];
                            if (!empty($insertData['image4']) && $insertData['image4'] != '') {
                                $media_id = $this->imagecsv($insertData['image4'], $images);
                                $f_Ans4->media_id = $media_id;
                            }
                            // $m = new Media();
                            // $m->url = $insertData['image4'];
                            // $m->save();
                            // $f_Ans4->media_id = $m->id;
                            $f_Ans4->arrange = $insertData['arrange4'];
                            $f_Ans4->save();
                        }
                    }
                    /*  */
                }
                // Session::flash('message', 'Import Successful.');
            } else {
                // Session::flash('message', 'File too large. File must be less than 2MB.');
            }
        } else {
            // Session::flash('message', 'Invalid File Extension.');
        }
        return back();
    }
}
