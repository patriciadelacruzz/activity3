<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $students = [
        42000001 => [
            'lastname' => 'Seno',
            'firstname' => 'Chris',
            'birthday' => '1998/02/23',
            'isnewStudent' => True
        ],
        42000011 => [
            'lastname' => 'Ortiz',
            'firstname' => 'Bryan',
            'birthday' => '2001/09/21',
            'isnewStudent' => False
        ]
    ];
    public function index()
    {
        return view('Home.index', ['Student'=>$this->student]);
    }
    public function show($studentid)
    {
        abort_if(!(isset($this->students[$studentid])), 404);
        return view('Home.show', ['Student'=>$this->students[$studentid]]);
    }
    public function create()
    {
        return view('Home.create');
    }
    public function store(Request $request)
    {
        $lastname = Request()->input('lastname');
        $firstname = Request()->input('firstname');
        $birthday = Request()->input('birthday');
        $students = [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'birthday' => $birthday,
                'isnewstudent' => True
                
            ];
        return view('Home.store', ['Student'=>$students]);
    }
    public function edit($studentid)
    {
        abort_if(!(isset($this->students[$id])), 404);
        return view('Home.edit', ['Student'=>$this->students[$studentid]]);   
    }
    public function update(Request $request, $studentsid)
    {
        $lastname = Request()->input('lastname');
        $firstname = Request()->input('firstname');
        $birthday = Request()->input('birthday');
        $students = [
                 $studentid => [
                'lastname' => $lastname,
                'firstname' => $firstname,
                'birthday' => $birthday,
                'isnewstudent' => $isnewstudent
            ]    
        ];
        return view('Home.store', ['Student'=>$this->students[$studentid]]);
    }
    public function destroy($studentid)
    {
        $this->students[$id] -> delete();
        return view('Home.index', ['Students'=>$this->students]);
    }
    
   
}