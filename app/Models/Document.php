<?php

namespace App\Models;

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

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'people' => $this->people,
            'places' => $this->places,
            'topics' => $this->topics,
            'dates' => $this->dates,
            //          'image_url' => $this->getFirstMedia()?->getUrl(),
        ];
    }
}
