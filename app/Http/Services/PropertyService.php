<?php
namespace App\Http\Services;

use App\Models\Property;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Facades\Http;

class PropertyService{

    public function getAllProperties(){
        $list = Property::get();
        return PropertyResource::collection($list);
    }

    public function getDatawithApi(){
        $api_url = config('app.api_base_url').'api/properties?api_key='.config('app.api_key');
        $response = Http::get($api_url);
        
        $data['status'] = $response->status();
        $data['json_data'] = $response->json();
        return $data;
    }

    public function saveDatawithoutResponse($request){
        return Property::updateOrCreate($request,$request);
    }

    public function saveDatawithResponse($request){
        $property = Property::updateOrCreate($request,$request);
        return new PropertyResource($property);
    }
}
?>