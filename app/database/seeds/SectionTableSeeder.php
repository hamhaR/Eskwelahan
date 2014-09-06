<?php 

class SectionTableSeeder extends Seeder{

	public function run(){

	$student1 = new User;
	$student1->username = 'student10';
	$student1->password = Hash::make('password10');
	$student1->role = 'student';
	$student1->fname = 'Vercillius';
	$student1->mname ='Avanzado';
	$student1->lname ='Mila';
	$student1->gender = 'male';
	$student1->address = 'Iligan City';
	$student1->email ='vmila@gmail.com';
	$student1->save();

	$student2 = new User;
	$student2->username = 'student11';
	$student2->password = Hash::make('password10');
	$student2->role = 'student';
	$student2->fname = 'Vercillius2';
	$student2->mname = 'Avanzado2';
	$student2->lname = 'Mila2';
	$student2->gender = 'male';
	$student2->address = 'Iligan City';
	$student2->email = 'vmila@gmail.com';
	$student2->save();

	$student3 = new User;
	$student3->username = 'student13';
	$student3->password = Hash::make('password13');
	$student3->role = 'student';
	$student3->fname = 'Vercillius3';
	$student3->mname = 'Avanzado3';
	$student3->lname = 'Mila3';
	$student3->gender = 'male';
	$student3->address = 'Iligan City';
	$student3->email = 'vmila@gmail.com';
	$student3->save();

	$student4 = new User;
	$student4->username = 'student15';
	$student4->password = Hash::make('password15');
	$student4->role = 'teacher';
	$student4->fname = 'Vercillius5';
	$student4->mname = 'Avanzado5';
	$student4->lname = 'Mila3';
	$student4->gender = 'male';
	$student4->address = 'Iligan City';
	$student4->email = 'vmila@gmail.com';
	$student4->save();

	$student5 = new User;
	$student5->username = 'student16';
	$student5->password = Hash::make('password156');
	$student5->role = 'teacher';
	$student5->fname = 'Vercillius6';
	$student5->mname = 'Avanzado6';
	$student5->lname = 'Mila6';
	$student5->gender = 'male';
	$student5->address = 'Iligan City';
	$student5->email = 'vmila@gmail.com';
	$student5->save();
	
	$section1 = Section::create(array(
		'section_name' => 'A123',
		'course_id' => 1,
		'teacher_id' => $student4->id,

	));

	$section2 = Section::create(array(
		'section_name' => 'B123',
		'course_id' => 1,
		'teacher_id' => $student5->id,

	));

	$section3 = Section::create(array(
		'section_name' => 'C123',
		'course_id' => 1,
		'teacher_id' => $student4->id,

	));





	$section1->students()->attach($student1->id);
	$section1->students()->attach($student2->id);
	$section1->students()->attach($student3->id);

	$section2->students()->attach($student1->id);
	$section2->students()->attach($student2->id);
	$section2->students()->attach($student3->id);

	$section3->students()->attach($student1->id);
	$section3->students()->attach($student2->id);
	$section3->students()->attach($student3->id);

}
	
}