<?php
class student
{
    private $name;
    private $age;
    private $student_id;

    public function __construct($name, $age, $student_id)
    {
        $this->name = $name;
        $this->age = $age;
        $this->student_id = $student_id;
    }

    public function __destruct()
    {
        echo "student with <br> [name: {$this->name}, age: {$this->age}  and id: {$this->student_id} ]is destroyed<br>";
    }
    public function getDetails()
    {
        return "<br>name: $this->name,<br> age: $this->age,<br> student_id: $this->student_id";
    }
    public function setname($name)
    {
        $this->name = $name;
    }
    public function setage($age)
    {
        $this->age = $age;
    }
    public function setstudent_id($student_id)
    {
        $this->student_id = $student_id;
    }

    public function getname()
    {
        return $this->name;
    }


    public function getage()
    {
        return $this->age;
    }

    public function getstudent_id()
    {
        return $this->student_id;
    }
}
class Classroom
{
    private $student = [];

    public function addStudent(student $students)
    {
        $this->student[] = $students;
    }

    public function removestudent($student_id)
    {
        foreach ($this->student as $index => $student) {
            if ($student->getstudent_id() === $student_id) {
                unset($this->student[$index]);
                echo "student with id $student_id has been removed.\n";
                return;
            }
        }
        echo "student with id $student_id not found.\n";
    }
    public function listStudents()
    {
        foreach ($this->student as $student) {
            echo $student->getDetails()."<br>";
        }
    }
}
$classroom = new Classroom();

$student1 = new Student("mohammed", 21, 1);
$student2 = new Student("ahmad", 19, 2);
$student3 = new Student("maher", 15, 3);
$student4 = new Student("samer", 22, 4);
$student5 = new Student("abdallah", 18, 5);
// $student2 = new Student(2, "Jane Smith");

$classroom->addStudent($student1);
$classroom->addStudent($student2);
$classroom->addStudent($student3);
$classroom->addStudent($student4);
$classroom->addStudent($student5);
// $classroom->addStudent($student2);
echo "List of Students:\n";
$classroom->listStudents();
echo "<br>";
echo "<br>";
echo "<br>";

$classroom->removestudent(3);
echo "<br>";
echo "<br>";

echo "List of Students after removal:\n";
$classroom->listStudents();
echo "<br>";
echo "<br>";
