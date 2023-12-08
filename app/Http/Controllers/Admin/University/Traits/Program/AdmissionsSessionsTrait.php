<?php

namespace App\Http\Controllers\Admin\University\Traits\Program;

use App\Http\Requests\University\Program\SaveAdmissionSessionRequest;
use App\Http\Resources\University\Program\UniversityAdmissionSessionResource;
use App\Http\Resources\UpdateRequests\Program\AdmissionSessionUpdateRequestsResource as DataResource;
use App\Models\University\Admissions\UniversityAdmissionSession;
use App\Models\University\Admissions\UpdateRequestsModals\UniversityAdmissionSessionUpdateRequest as RequestModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

trait AdmissionsSessionsTrait
{
    /**
     * @return AnonymousResourceCollection
     */
    public function getAdmissionSessions(): AnonymousResourceCollection
    {
        $data = UniversityAdmissionSession::with(['semester:id,name'])
            ->with(['updateRequests' => function ($query) {
                $query->where('status', \AppConst::PENDING)->with(['semester:id,name']);
            }])
            ->whereDoesntHave('updateRequests', fn($q) => $q->where('type', \AppConst::DELETE_RECORD))
            ->where('university_id', \Auth::user()->campus_id)->get();

        return UniversityAdmissionSessionResource::collection($data);
    }

    /**
     * @param $request_type
     * @return AnonymousResourceCollection
     */
    public function getAdmissionSessionsPendingRequests($request_type){
        $data = RequestModel::where([['type', $request_type]])
            ->where(function ($query) {
                return $query->where('university_id', \Auth::user()->campus_id)
                    ->orWhereIn('related_record_id', \Auth::user()->selected_university->admissionSessions?->pluck('id'));
            })->with(
                'requestedBy:id,name,email',
                'approvedBy:id,name,email',
                'university:id,university_name',
                'semester:id,name',
                'semesterOld:id,name',
                'originalData.university:id,university_name',
                'originalData.semester:id,name',
            )->orderBy('status')->get();

            //dd($data);
        //TODO:Pagination
        return $data;
    }

    /**
     * @param SaveAdmissionSessionRequest $request
     * @return RedirectResponse
     */
    public function saveAdmissionSession(SaveAdmissionSessionRequest $request): RedirectResponse
    {
        return $this->saveRequestForApprovalAndRedirect($request, new RequestModel, new UniversityAdmissionSession);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteAdmissionSession(Request $request): RedirectResponse
    {
        return $this->saveDeleteRecordRequestAndRedirect($request, new RequestModel);
    }

}
