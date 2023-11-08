<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent\AgentStudentLead
 *
 * @property int $id
 * @property int $agent_id
 * @property int $student_id
 * @property int|null $event_id
 * @property int $status
 * @property int|null $add_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereAddBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $notes
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereNotes($value)
 * @property int|null $lead_source_id
 * @method static \Illuminate\Database\Eloquent\Builder|AgentStudentLead whereLeadSourceId($value)
 */
class AgentStudentLead extends Model
{
    use HasFactory;
}
