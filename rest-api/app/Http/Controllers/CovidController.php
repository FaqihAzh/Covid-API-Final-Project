<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use Illuminate\Http\Request;

class CovidController extends Controller {
  
  // Index function - Get all resources
  public function index() {
    $covid = Covid::all(); // Get all data from database

    if ($covid) {
      $data = [
        'message' => 'Get All Resource',
        'data' => $covid,
      ];

      return response()->json($data, 200);
    } 
    else {
      $data = [
        'message' => 'Data is empty',
      ];
      
      return response()->json($data, 200);
    }
  }

   // Store function - Add resource
  public function store(Request $request) {
    // Data validation
    $validateData = $request->validate([
      'name' => 'required',
      'phone' => 'numeric|required',
      'address' => 'required',
      'status' => 'required',
      'in_date_at' => 'required',
      'out_date_at' => 'required',
    ]);
  
    $covid = Covid::create($validateData); // Insert data to database

    $data = [
      'message' => 'Resource is added successfully',
      'data' => $covid,
    ];

    return response()->json($data, 201);
  }

  // Show function - Get resources by id
  public function show($id) {

    $covid = Covid::find($id); // Find data by id

    if ($covid) {
      $data = [
        'message' => 'Get Detail Resource',
        'data' => $covid
      ];

      return response()->json($data, 200);
    } 
    else {
      $data = [
        'message' => 'Resource not found',
      ];
      
      return response()->json($data, 404);
    }
  }

  // Update function - Edit Resource by id
  public function update(Request $request, $id) {

    $covid = Covid::find($id);

    if($covid) {
      $input = [
        'name' => $request->name ?? $covid->name,
        'phone' => $request->phone ?? $covid->phone,
        'address' => $request->address ?? $covid->address,
        'status' => $request->status ?? $covid->status,
        'in_date_at' => $request->in_date_at ?? $covid->in_date_at,
        'out_date_at' => $request->out_date_at ?? $covid->out_date_at,
      ];
  
      $covid->update($input);
          
      $data = [
        'message' => 'Resource is update successfully',
        'data' => $covid,
      ];

      return response()->json($data, 200);
    }
    else {
      return response()->json(['message' => 'Resource not found'], 404);
    }
  }

  // Delete function - Delete Resource by id
  public function destroy($id) {

    $covid = Covid::find($id);

    if($covid) {
      $covid->delete();
          
      $data = [
        'message' => 'Resource is delete successfully',
        'data' => $covid,
      ];

      return response()->json($data, 200);
    }
    else {
      return response()->json(['message' => 'Resource not found'], 404);
    }
  }

  // Search function - Search Resource by name
  public function search($name) {

    $covid = Covid::where("name","like","%".$name."%")->get();
  
    if($covid) {          
      $data = [
        'message' => 'Get searched resource',
        'jumlah' => count($covid),
        'data' => $covid,
      ];
  
    return response()->json($data, 200);
    }
    else {
    return response()->json(['message' => 'Resource not found'], 404);
    }
  }

  // Positive function - Get resource where status = positive
  public function positive() {

    $covid = Covid::where("status","like","%"."positive"."%")->get();
  
    if($covid) {          
      $data = [
        'message' => 'Get positive resource',
        'jumlah' => count($covid),
        'data' => $covid,
      ];
  
      return response()->json($data, 200);
    }
    else {
      return response()->json(['message' => 'Resource not found'], 404);
    }
  }

  // Recovered function - Get resource where status = recovered
  public function recovered() {

    $covid = Covid::where("status","like","%"."recovered"."%")->get();
  
    if($covid) {          
      $data = [
        'message' => 'Get recovered resource',
        'jumlah' => count($covid),
        'data' => $covid,
      ];
  
      return response()->json($data, 200);
    }
    else {
      return response()->json(['message' => 'Resource not found'], 404);
    }
  }

  // Dead functionGet resource where status = dead
  public function dead() {

    $covid = Covid::where("status","like","%"."dead"."%")->get();
  
    if($covid) {          
      $data = [
        'message' => 'Get dead resource',
        'jumlah' => count($covid),
        'data' => $covid,
      ];
  
      return response()->json($data, 200);
    }
    else {
      return response()->json(['message' => 'Resource not found'], 404);
    }
  }
}
