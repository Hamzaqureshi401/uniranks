<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface UpdateRequest
{
    /**
     * @return BelongsTo
     */
    public function requestedBy():BelongsTo;

    /**
     * @return BelongsTo
     */
    public function approvedBy(): BelongsTo;

    /**
     * @return BelongsTo
     */
    public function originalData(): BelongsTo;
}
