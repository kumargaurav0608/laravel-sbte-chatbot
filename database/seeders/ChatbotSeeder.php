<?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use App\Models\Category;
// use App\Models\Question;
// use App\Models\Answer;

// class ChatbotSeeder extends Seeder
// {
//     public function run()
//     {
//         // Create categories
//         $admission = Category::create(['name' => 'Admission']);
//         $registration = Category::create(['name' => 'Registration']);

//         // Questions for Admission
//         $q1 = Question::create(['category_id' => $admission->id, 'question_text' => 'Undergraduate Admission']);
//         $q2 = Question::create(['category_id' => $admission->id, 'question_text' => 'Postgraduate Admission']);
//         $q3 = Question::create(['category_id' => $admission->id, 'question_text' => 'Application Deadlines']);

//         // Answers for questions
//         Answer::create([
//             'question_id' => $q1->id,
//             'answer_text' => 'For undergraduate admission, you need transcripts and test scores.',
//             'next_question_id' => $q3->id
//         ]);

//         Answer::create([
//             'question_id' => $q2->id,
//             'answer_text' => 'Postgraduate admission requires a bachelor’s degree transcript.',
//             'next_question_id' => null
//         ]);

//         Answer::create([
//             'question_id' => $q3->id,
//             'answer_text' => 'Deadlines vary but usually are in June and December.',
//             'next_question_id' => null
//         ]);

//         // Registration questions & answers
//         $rq1 = Question::create(['category_id' => $registration->id, 'question_text' => 'How to register']);
//         Answer::create([
//             'question_id' => $rq1->id,
//             'answer_text' => 'You can register online via our portal.',
//             'next_question_id' => null
//         ]);
//     }
// }

