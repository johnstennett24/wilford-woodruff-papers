<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class Document extends Item
{
    use HasFactory;
    use HasParent;

    public function pages()
    {
        return $this->hasMany(Page::class)->orderBy('order', 'ASC');
    }

    public function getFirstMedia(string $collectionName = 'default', $filters = []): ?Media
    {
        $media = $this->getMedia($collectionName, $filters);

        return $media->first();
    }

    public function people()
    {
        return $this->hasManyThrough(Subject::class, Page::class)->whereHas('category', function (Builder $query) {
            $query->where('name', 'People');
        });
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'name' => $this->name,
            'first_date' => $this->first_date?->toDateString(),
            'image_url' => $this->firstPage?->getFirstMedia()?->getUrl('thumb'),
            'links' => [
                'frontend_url' => route('subjects.show', ['subject' => Subject::find($this->id)]),
                'api_url' => route('api.documents.show', ['document' => Subject::find($this->id)]),
            ],
        ];
    }
}
