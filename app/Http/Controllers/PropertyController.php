<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Services
use App\Http\Services\PropertyService;

#Traits
use App\Http\Traits\ApiHelper;
use App\Http\Traits\HandleException;

#Responses
use App\Http\Responses\MessageResponse;
use App\Http\Responses\UnauthorizedResponse;

class PropertyController extends Controller
{
    use HandleException;
    use ApiHelper;

    protected $propertyService;

    public function __construct(PropertyService $propertyService){
        $this->propertyService = $propertyService;
    }

    // Get all list of properties
    public function list(){
        try {
            $list = $this->propertyService->getAllProperties();

            return new MessageResponse(
                $list
            );

        } catch (\Exception $e) {
            return $this->renderException($e);
        }
    }

    public function storeDataUsingAPI(){
        try {
                $data = $this->propertyService->getDatawithApi();

                if($data['status'] == '200'){
                    foreach($data['json_data']['data'] as $property){
                    
                        // Replace key according field name.
                        $property['full_details_url'] = $property['image_full'];
                        $property['image_url'] = $property['image_full'];
                        $property['thumbnail_url'] = $property['image_thumbnail'];
                        $property['displayable_address'] = $property['address'];

                        //Prepare data
                        $propertyData = collect($property)->except('uuid','property_type_id','address','image_full','image_thumbnail');
                        $dataWithArray = $propertyData->toArray();          

                        $this->propertyService->saveDatawithoutResponse($dataWithArray);
                    }

                    return new MessageResponse([
                            'message' => 'Data has been inserted successfully.',
                        ]
                    );
                }  
                
                return new MessageResponse([
                        'message' => 'Sorry, Data is not inserted successfully.',
                    ]
                );
            } catch (\Exception $e) {
                return $this->renderException($e);
            }
    } 
    
    public function store(Request $request){
        try {
            $responce = $this->propertyService->saveDatawithResponse($request->toArray());
            return new MessageResponse($responce);
        } catch (\Exception $e) {
            return $this->renderException($e);
        }
    } 
}
