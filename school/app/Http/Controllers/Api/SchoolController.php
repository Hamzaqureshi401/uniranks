<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institutes\School;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class SchoolController extends Controller
{
    public function searchSchool(Request $request): JsonResponse
    {
        $search = $request->get('search');
        $country_id = $request->get('country_id');
        $directorate_id = $request->get('directorate_id');
        $region_id = $request->get('region_id');
        $state_id = $request->get('state_id');
        $zone_id = $request->get('zone_id');
        $city_id = $request->get('city_id');
        $national_id = $request->get('national_id');
        $school_type_id = $request->get('school_type_id');
        $schools = School::query()
            ->when($search, function ($query) use ($search) {
                $query->where('school_name', 'like', '%' . $search . '%');
            })
            ->when($school_type_id, function ($query) use ($school_type_id) {
                $query->where('school_type_id', $school_type_id);
            })
            ->when($country_id, function ($query) use ($country_id) {
                $query->where('country_id', $country_id);
            })
            ->when($directorate_id, function ($query) use ($directorate_id) {
                $query->where('directorate_id', $directorate_id);
            })
            ->when($region_id, function ($query) use ($region_id) {
                $query->where('region_id', $region_id);
            })
            ->when($state_id, function ($query) use ($state_id) {
                $query->where('state_id', $state_id);
            })
            ->when($zone_id, function ($query) use ($zone_id) {
                $query->where('zone_id', $zone_id);
            })
            ->when($city_id, function ($query) use ($city_id) {
                $query->where('city_id', $city_id);
            })
            ->when($national_id, function ($query) use ($national_id) {
                $query->where('national_id', $national_id);
            })
            ->limit(30)->get();
        $response = [];
        foreach ($schools as $school) {
            $response[] = [
                "id" => $school?->id,
                "text" => $school?->translated_name ?: $school->school_name,
                'image' => $school?->logo_url,
            ];
        }

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkSchoolAvailability(Request $request): JsonResponse
    {
        $adminExist = false;

        $school = School::where('id', $request->get('q', ''))
            ->with(['schoolAdmins'=>fn($q)=>$q->whereRelation('userRoles','role_id',\AppConst::SCHOOL_ADMINISTRATOR)
            ->orWhereRelation('userRoles','role_id',\AppConst::SCHOOL_COUNSELOR)->with('userBio')])
            ->whereHas('schoolAdmins',fn($q)=>$q->whereRelation('userRoles','role_id',\AppConst::SCHOOL_ADMINISTRATOR)
                ->orWhereRelation('userRoles','role_id',\AppConst::SCHOOL_COUNSELOR))->first();
        if (!is_null($school)) {
            $adminExist = true;
        }
        $admin = $school?->schoolAdmins()?->first();
        return response()->json([
            'adminExist' => $adminExist,
            'name' => $admin?->userBio?->first_name . ' ' . $admin?->userBio?->last_name,
            'email' => $admin?->email,
            'id' => $school?->id,
        ]);
    }
}
