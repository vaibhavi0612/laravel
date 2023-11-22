<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

use App\Http\Responses\MessageResponse;
use Illuminate\Http\Resources\Json\JsonResource;

trait SendsResponse
{
    /**
     * @property-read mixed $data
     * @property-read Http $status
     */
    public function toResponse($request): JsonResponse
    {
        $data = [
            'code' => $this->status,
        ];

        if($this instanceof MessageResponse){
            if($this->data instanceof JsonResource){
                $resource = $this->data->response()->getData(true);
                if(isset($resource['meta'])){
                    $data = array_merge($data, $resource);
                    unset($data['links']);
                }else{
                    $data['data'] = $this->data;
                }
            }else{
                $data['data'] = $this->data;
            }
        }else{
            $data['data'] = $this->data;
        }

        if(env('APP_DEBUG', false)){
            $data = $this->debugInfo($data);
        }
        
        return new JsonResponse(
            data : $data,
            status : $this->status
        );
    }

    private function debugInfo(array $data): array
    {
        // $time = (int) ((microtime(true) - LARAVEL_START) * 1e6);
        // $timeData = $time > 1e6 ? [$time / 1e6, 's'] : (
        //     $time > 1e3 ? [$time / 1e3, 'ms'] : (
        //         [$time, 'μs']
        //     )
        // );

        $memory = memory_get_peak_usage();
        $memoryData = $memory > 1e6 ? [$memory / 1e6, 'mb'] : (
            $memory > 1e3 ? [$memory / 1e3, 'kb'] : (
                [$memory, 'b']
            )
        );

        return array_merge(
            $data, ['debug' => [
                // 'time' => [
                //     'value' => $timeData[0],
                //     'unit' => $timeData[1],
                // ],
                'memory' => [
                    'value' => $memoryData[0],
                    'unit' => $memoryData[1],
                ],
                'queries' => app('db')->getQueryLog(),
                'post' => request()->request->all(),
            ]]
        );
    }
}
