<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRegistrationRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    private $employeeService;
    private $employeeNotFountErrorMessage = 'Employee iether delete or does not exists in the database!';

    public function __construct(EmployeeService $employeeService)
   {
       $this->employeeService = $employeeService;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->employeeService->getAllEmployees(request()->all());
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
    public function store(EmployeeRegistrationRequest $request)
    {
        $successMessage = 'Employee Saved Successfully!';
        $errorMessage = 'Employee not Saved. Please Try again!';
        return $this->responseReturn($this->employeeService->storeEmployees($request->all()), $successMessage, $errorMessage);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = $this->employeeService->getSingleEmployee($id);
        if(empty($employee)){
            return $this->responseReturn(false,'',$this->employeeNotFountErrorMessage);
        }
        return $employee;
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
    public function update(EmployeeUpdateRequest $request, $id)
    {
        
        $successMessage = 'Employee Updated Successfully!';
        $errorMessage = 'Employee not Updated. Please Try again!';
        return $this->responseReturn($this->employeeService->updateEmployees($request->except('id'),$id), $successMessage, $errorMessage);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $successMessage = 'Employee Deletetd Successfully!';
        $errorMessage = 'Employee not Deletetd. Please Try again!';
        return $this->responseReturn($this->employeeService->hardDeleteEmployee($id), $successMessage, $errorMessage);
        
    }

     /**
     * soft delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $successMessage = 'Employee Deletetd Successfully!';
        $errorMessage = 'Employee not Deletetd. Please Try again!';
        return $this->responseReturn($this->employeeService->softDeleteEmployee($id), $successMessage, $errorMessage);
        
    }

    private function responseReturn($response, $successMessage, $errorMessage){
        $message = $successMessage;
        if(!$response){
            $message =$errorMessage;
        }
        return response()->json([
            'success'   => $response,
            'message'   => $message
        ]);
    }

}
