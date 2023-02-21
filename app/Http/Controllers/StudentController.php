<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\CustomField;
use App\Models\Student;
use App\Rules\CustomFields;

use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "index controller";
        die();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "controller create";
        die();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->new_fields[0]["title"]);

        $validator = Validator::make($request->all(), [
            'class' => 'required | max:11',
            'name' => 'required | max:100',
            'email' => 'required | max:100 | email:rfc,dns',
            'contact_number' => 'required | numeric | digits:11',
            'status' => 'required | in:unconfirmed,admitted,terminated',
            // "field_ids"    => "array|min:1",
            // "field_ids.*"  => "string|distinct|min:1",
            'existing_fields' => "array|min:0",
            'new_fields' => ["array",new CustomFields()],
            'new_fields.*.title' => "required | string | distinct",
            'new_fields.*.type' => "required | in:date,number,string,boolean",
            'new_fields.*.value' => "required | string",
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false,'messages' => $validator->errors()->messages()], 400);
        }

        $new_field_ids = "";
        $new_field_values = "";

        foreach ($request->new_fields as $new_field) {
            $data = CustomField::create([
              'title' => $new_field['title'],
              'type' => $new_field['type'],
            ]);

            $new_field_ids = $new_field_ids . ',' . $data->id;
            $new_field_values = $new_field_values . ',' . $new_field['value'];
        }

        $new_field_ids = trim($new_field_ids, ",");
        $new_field_values = trim($new_field_values, ",");

        $student = new Student();
        $student->class = $request->class;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->contact_number = $request->contact_number;
        $student->status = $request->status;
        $student->field_ids = $new_field_ids;
        $student->field_values = $new_field_values;
        $student->save();


        // $batch=new Batch();
        // $batch->class_id=$request->class_id;
        // $batch->branch_id=$request->branch_id;
        // $batch->name=$request->name;
        // $batch->time=$request->time;
        // $batch->max_student_number=$request->max_student_number;
        // $batch->student_number=0;
        // $batch->phase=$request->phase;
        // $batch->status=$request->status;
        // $batch->student_type=$request->student_type;
        // $batch->save();
        return response('Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
