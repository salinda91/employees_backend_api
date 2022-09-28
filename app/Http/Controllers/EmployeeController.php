<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRegistrationRequest;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    private $employeeService;

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
       return $this->employeeService->getAllEmployees();
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
