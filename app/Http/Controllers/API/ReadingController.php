<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use \DateTime;

class ReadingController extends Controller
{
    public function current()
    {
        $now = new DateTime();
        $mdate=$now->format('Y-m-d');

        $muser = Auth::user()->id;
        $results = DB::select( DB::raw(
            "SELECT devices.device_name,devices.device_image,locations.location_name, CAST(Sum(ReadingChart.Kwh) AS DECIMAL(6,2)) AS KWH, CAST(Sum(ReadingChart.TotalCost) AS DECIMAL(6,2)) AS Cost
            FROM ReadingChart INNER JOIN devices ON ReadingChart.device_id = devices.id
            INNER JOIN locations ON devices.location_id = locations.id
            WHERE (((DATE(ReadingChart.created_at) = :mdate)) AND ((ReadingChart.user_id)=:muser))
            GROUP BY devices.device_name, devices.device_image, locations.location_name"
        ), array(
            'mdate' => $mdate,
            'muser' => $muser,
        ));
        $resultArray = json_decode(json_encode($results), true);
        return response()->json([
            'data' => $resultArray,
        ]);
    }
    public function daily()
    {
        $now = new DateTime();
        $bdate=$now->format('Y-m-d');
        
        $edate=$now->modify ('-7 days')
            ->format('Y-m-d');
        $muser = Auth::user()->id;
        $results = DB::select( DB::raw(
            "SELECT DATE_FORMAT(ReadingChart.created_at, '%d %b') MyDate,CAST(Sum(ReadingChart.Kwh) AS DECIMAL(6,2)) AS KWH, CAST(Sum(ReadingChart.TotalCost) AS DECIMAL(6,2)) AS Cost,-2 AS Saving
            FROM ReadingChart INNER JOIN devices ON ReadingChart.device_id = devices.id
            WHERE (((DATE(ReadingChart.created_at) BETWEEN :edate AND :bdate )) AND ((ReadingChart.user_id)= :muser))
            GROUP BY MyDate,Saving
            ORDER BY DATE(ReadingChart.created_at) DESC"
        ), array(
            'bdate' => $bdate,
            'edate' => $edate,
            'muser' => $muser,
        ));
        $resultArray = json_decode(json_encode($results), true);
        return response()->json([
            'data' => $resultArray,
        ]);
    }
    public function monthly()
    {
        //$date = '2020-04-28';
        $now = new DateTime();
        $bdate=$now->format('Y-m-d');
        
        $edate=$now->modify ('-2 month')
            ->format('Y-m-d');
            
        $muser = Auth::user()->id;
        $results = DB::select( DB::raw(
            "SELECT MonthName(created_at) AS Month, Sum(ReadingChart.Kwh) AS KWATT, CAST(Sum(ReadingChart.TotalCost) AS DECIMAL(6,2)) AS TC, 12 AS Saved
            FROM ReadingChart
            WHERE (((cast(created_at as date) BETWEEN :edate AND :bdate )) AND ((ReadingChart.user_id)=:muser))
            GROUP BY MonthName(created_at)
            ORDER BY Month(created_at) DESC"
        ), array(
            'bdate' => $bdate,
            'edate' => $edate,
            'muser' => $muser,
        ));
        $resultArray = json_decode(json_encode($results), true);
        return response()->json([
            'data' => $resultArray,
        ]);
    } 
}
