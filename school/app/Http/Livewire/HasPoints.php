<?php

namespace App\Http\Livewire;

use App\Models\PointingSystem\PointType;

trait HasPoints
{
    public function addPointsInTransactionForSelectedSchool($point_type_id, $earned_for, $earned_for_id): void
    {
        $school = \Auth::user()->selected_school;
        $this->addPointsInTransactionForSchool($school, $point_type_id, $earned_for, $earned_for_id);
    }

    public function addPointsInTransactionForSchool($school, $point_type_id, $earned_for, $earned_for_id): void
    {
        $point = PointType::find($point_type_id);
        $school->pointsHistory()->create([
            'point_type_id' => $point?->id,
            'points_in' => $point->points,
            'description' => $point->description,
            'earned_for_type' => $earned_for,
            'earned_for_id' => $earned_for_id
        ]);
    }


    /**
     * @param array $point_type_ids
     * @param $earned_for
     * @param $earned_for_id
     * @return void
     */
    public function addPointsInTransactionForSelectedSchoolBulkSameEarnedFor(array $point_type_ids, $earned_for, $earned_for_id): void
    {
        $points = PointType::whereIn('id', $point_type_ids)->get();
        $data = [];
        foreach ($points as $point) {
            $data [] = [
                'point_type_id' => $point?->id,
                'points_in' => $point->points,
                'description' => $point->description,
                'earned_for_type' => $earned_for,
                'earned_for_id' => $earned_for_id
            ];
        }

        $school = \Auth::user()->selected_school;
        $school->pointsHistory()->createMany($data);
    }
    /**
     * @param array $point_type_ids
     * @param $earned_for
     * @param $earned_for_id
     * @return void
     */
    public function addPointsInTransactionForSchoolBulkSameEarnedFor($school,array $point_type_ids, $earned_for, $earned_for_id): void
    {
        $points = PointType::whereIn('id', $point_type_ids)->get();
        $data = [];
        foreach ($points as $point) {
            $data [] = [
                'point_type_id' => $point?->id,
                'points_in' => $point->points,
                'description' => $point->description,
                'earned_for_type' => $earned_for,
                'earned_for_id' => $earned_for_id
            ];
        }
        $school->pointsHistory()->createMany($data);
    }

    /**
     * @param array $args [ ['point_type_id'=>int,'earned_for_type'=>string,'earned_for_id'=>int],...n]
     * @return void
     */
    public function addPointsInTransactionForSelectedSchoolBulk(array $args): void
    {
        $point_type_ids = collect($args)->pluck('point_type_id')->toArray();
        $points = PointType::whereIn('id', $point_type_ids)->get()->keyBy('id');
        $data = [];
        foreach ($args as $item) {
            $point = $points[$item['point_type_id']];
            $data [] = [
                'point_type_id' => $point?->id,
                'points_in' => $point->points,
                'description' => $point->description,
                'earned_for_type' => $item['earned_for_type'],
                'earned_for_id' => $item['earned_for_id']
            ];
        }

        $school = \Auth::user()->selected_school;
        $school->pointsHistory()->createMany($data);
    }
}
