<?php

namespace App\Http\Controllers\Admin\University\Traits\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

;

trait MustApproveUpdates
{
    /**
     * @param Model $model
     * @param int $requested_by
     * @param array $current_data
     * @param array $inputs
     * @return void
     */
    public function saveChangedColumnRequest(Model $model, array $current_data, array $inputs):void
    {
        $lang =  app()->getLocale();


        foreach ($inputs as $column=>$value){

            if (is_array($value) && array_key_exists($lang,$value)){
                $value = $value[$lang];
            }


            if($current_data[$column]==$value){
                continue;
            }

           $inserted =   $model::whereNotNull($column)->updateOrCreate([
                'related_record_id'=>$current_data['id'],
                'type'=>\AppConst::UPDATE_RECORD,
                'status'=> \AppConst::PENDING
            ],[
                $column => $inputs[$column],
                'requested_by_id'=> \Auth::id(),
                'old_value'=> $current_data[$column],
                'what_changed'=>$column
            ]);
        }
    }


    /**
     * @param array $inputs
     * @return array
     */
    public function addRequestInfoToInputs(array $inputs): array
    {
        return array_merge($inputs,[
            'university_id' => \Auth::user()->campus_id,
            'type'=>\AppConst::UPDATE_RECORD,
            'requested_by_id'=>\Auth::id(),
        ]);
    }

    /**
     * @param array $inputs
     * @return bool
     */
    public function isUpdateRequest(array $inputs): bool
    {
        return !empty($inputs['id']);
    }


    /**
     * @param Request|FormRequest $request
     * @param Model $update_request_model
     * @param Model $current_data_model
     * @return RedirectResponse
     */
    public function saveRequestForApprovalAndRedirect(Request|FormRequest $request, Model $update_request_model ,
                                                       Model $current_data_model): RedirectResponse
    {
        $this->saveRequestForApproval($request,$update_request_model,$current_data_model);
        return redirect()->back();
    }

    /**
     * @param Request|FormRequest $request
     * @param Model $update_request_model
     * @param Model $current_data_model
     * @return bool
     */
   public function saveRequestForApproval(Request $request, Model $update_request_model, Model $current_data_model): bool
{
    $validator = \Validator::make($request->all(), [
        'university_id' => 'required',
        'type' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'university_semester_id' =>'required',
        'related_record_id' =>'required',
        'old_value' =>'required',
        'what_changed' =>'required',
        'description' =>'nullable',
    ]);

     //dd($validator->fails());

    if ($validator->fails()) {
        // Handle validation failure, e.g., return an error message or redirect back with errors
        // You can access the errors using $validator->errors()
        return false;
    }

    // Proceed with your logic if validation passes
    $validatedData = $validator->validated();



    if ($this->isUpdateRequest($validatedData)) {
        return $this->saveUpdateRequest($update_request_model, $current_data_model, $validatedData);
    }

    return $this->saveAddRequest($update_request_model, $validatedData);
}



    /**
     * @param Model $update_request_model
     * @param array $inputs
     * @return bool
     */
    public function saveAddRequest(Model $update_request_model, array $inputs): bool
    {
        //dd($inputs);
        $inputs = $this->addRequestInfoToInputs($inputs);
        $update_request_model::create($inputs);
        return true;
    }

    /**
     * @param Model $update_request_model
     * @param Model $current_data_model
     * @param array $inputs
     * @return bool
     */
    public function saveUpdateRequest(Model $update_request_model , Model $current_data_model , array $inputs): bool
    {
        $current_data = $current_data_model::find($inputs['id'])->toArray();
        $this->saveChangedColumnRequest($update_request_model,$current_data,$inputs);
        return true;
    }

    /**
     * @param Request|FormRequest $request
     * @param Model $update_request_model
     * @return bool
     */
    public function saveDeleteRecordRequest(Request|FormRequest $request, Model $update_request_model): bool
    {
        $update_request_model::create([
            'requested_by_id'=> \Auth::id(),
            'related_record_id'=>$request->id,
            'type'=>\AppConst::DELETE_RECORD,
        ]);
        return true;
    }

    /**
     * @param Request|FormRequest $request
     * @param Model $update_request_model
     * @return RedirectResponse
     */
    public function saveDeleteRecordRequestAndRedirect(Request|FormRequest $request, Model $update_request_model): RedirectResponse
    {
        $this->saveDeleteRecordRequest($request,$update_request_model);
        return redirect()->back();
    }
}
