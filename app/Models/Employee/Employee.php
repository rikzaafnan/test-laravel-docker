<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'employee_name',
        'employee_manager_id',
        'created_at',
        'updated_at'
    ];

    public function insertEmployee($employeeName, $employeeManagerID){


        $employee = DB::insert('INSERT INTO employees(employee_name, employee_manager_id) VALUES (?,?)', [$employeeName, $employeeManagerID]);

        if (!$employee) {
            dd("error");
        }

        return $employee;

    }

    public function findOneById($employeeManagerID){


        $results = DB::select('select * from employees where employee_id = :id', ['id' => $employeeManagerID]);

        return $results;

    }

    public function getAllEmployees() {

        $queryEmployees = "SELECT e1.employee_id, e1.employee_name,e1.employee_manager_id as employee_manager_id, e1.created_at as created_at, e1.updated_at as updated_at,
        e2.employee_name as manager_name FROM employees AS e1 LEFT JOIN employees AS e2 ON e2.employee_id = e1.employee_manager_id";
        

        $employees = DB::select($queryEmployees);

        // Log::info($employees);

        return $employees;
    }
}
