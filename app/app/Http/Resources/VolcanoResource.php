<?php

namespace App\Http\Resources;

class VolcanoResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'ref' => $this->ref,
            'events_count_total' => (int)$this->volcano_events->sum('count'),
            'links' => route('api.volcanoes.show', ['volcano_id' => $this->id]),
        ];
    }
}
