<?php

namespace App\Http\Controllers\API;
 use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIBaseController extends Controller
{
    public function sendResponse($result, $message )
    {
        $student = new Student();
        $TotalRecords = $student->count();
        $url = $_SERVER['REQUEST_URI']; 
        $url_components = parse_url($url); 
        parse_str($url_components['query'], $params); 
        $pageNumberCurrent = $params['page_number'];
        $pageSizeCurrent = $params['page_size'];
        $total_pages = ceil($TotalRecords/$pageSizeCurrent);
        $pageNumberNext = $pageNumberCurrent + 1;
        
        if($pageNumberNext >=$total_pages )
            $nextLink = null;

        else    
        $nextLink = 'http://localhost:8000/api/students?page_number='.$pageNumberNext.'&page_size='.$pageSizeCurrent;
        $pageNumberPrevious = $pageNumberCurrent - 1;
        
        if($pageNumberPrevious < 1)
            $previousLink = null;
        else
            $previousLink = 'http://localhost:8000/api/students?page_number='.$pageNumberPrevious.'&page_size='.$pageSizeCurrent;
               
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'next page URL' => $nextLink,
            'previous page URL' => $previousLink,
            'total records per page' => $pageSizeCurrent,
            'total pages' => $total_pages,
        ];
        return response()->json($response, 200);
    }
    public function sendResponseAfterDelete( $message)
    {
    	$response = [
            'success' => true,
            // 'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
