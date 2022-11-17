<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\Employee;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $employees = Employee::getAllEmployees();

        if(count($employees) == 0){

            $data = [
                "message" => "data tidak ada",
                "status" => 200
            ];

            return response()->json($data, 200);
        }

        $data = [
            "message" => "success",
            "status" => 200,
            "data" => $employees
        ];

        return response()->json($data, 200);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $employeeById = Employee::findOneById($request['employeeManagerId']);

        if ($employeeById == []) {
            $data = [
                "message" => "manager tidak ditemukan",
                "status" => 400
            ];

            return response()->json($data, 400);
        }

        $employee = Employee::insertEmployee($request['employeeName'], $request['employeeManagerId']);

        return response()->json("succcess create new employee", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
