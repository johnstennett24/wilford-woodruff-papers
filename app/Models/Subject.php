<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Subject extends Model
{
    use HasFactory, HasSlug;

    protected $guarded = ['id'];

    protected $casts = [
        'geolocation' => 'array',
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function pages()
    {
        return $this->belongsToMany(Page::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'subject_id');
    }

    public function children()
    {
        return $this->hasMany(self::class)->with(['children' => function ($query) {
            $query->when(auth()->guest() || (auth()->check() && ! auth()->user()->hasAnyRole(['Super Admin'])), fn ($query) => $query->where('hide_on_index', 0)
                ->where(function ($query) {
                    $query->where('tagged_count', '>', 0)
                        ->orWhere('text_count', '>', 0);
                }));
        }]);
    }

    public function quotes()
    {
        return $this->belongsToMany(Quote::class)->withPivot(['approved_at', 'approved_by', 'created_at', 'created_by']);
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function mapUrl()
    {
        $url = 'https://maps.googleapis.com/maps/api/staticmap?';

        $url .= 'center='.$this->geolocation['formatted_address'];
        $url .= '&zoom='.$this->zoomLevel().'&size=600x300&maptype=roadmap';
        $url .= '&markers=color:red%7Clabel:.%7C'.$this->geolocation['geometry']['location']['lat'].','.$this->geolocation['geometry']['location']['lng'];

        $url .= '&key='.config('googlemaps.public_key');

        return $url;
    }

    private function zoomLevel()
    {
        return in_array('continent', $this->geolocation['types']) ? '2' : '6';
    }

    public function calculateNames()
    {
        $name_suffix = '';
        $year = '';

        if (str($this->name)->contains(', b.')) {
            $year = str($this->name)->afterLast(',')->trim();
        }
        if (str($this->name)->contains('Jr.')) {
            $name_suffix = 'Jr.';
            $name = str($this->name)->beforeLast(',')->replace('Jr.', '')->rtrim(', ');
        } elseif (str($this->name)->contains('Sr.')) {
            $name_suffix = 'Sr.';
            $name = str($this->name)->beforeLast(',')->replace('Sr.', '')->rtrim(', ');
        } elseif (str($this->name)->contains('III')) {
            $name_suffix = 'III';
            $name = str($this->name)->beforeLast(',')->replace('III', '')->rtrim(', ');
        } elseif (str($this->name)->contains('II')) {
            $name_suffix = 'II';
            $name = str($this->name)->beforeLast(',')->replace('II', '')->rtrim(', ');
        } elseif (str($this->name)->contains('(OT)')) {
            $name_suffix = 'Old Testament';
            $name = str($this->name)->replace('(OT)', '')->rtrim(', ');
        } elseif (str($this->name)->contains('(NT)')) {
            $name_suffix = 'New Testament';
            $name = str($this->name)->replace('(NT)', '')->rtrim(', ');
        } elseif (str($this->name)->contains('(BofM)')) {
            $name_suffix = 'Book of Mormon';
            $name = str($this->name)->replace('(BofM)', '')->rtrim(', ');
        } else {
            $name = str($this->name)->beforeLast(',');
        }

        $name = explode(' ', $name);
        if (count($name) > 1) {
            $this->attributes['last_name'] = array_pop($name);
        } else {
            $this->attributes['last_name'] = implode(' ', $name).(! empty($year) ? ', '.$year.' ' : '').(! empty($name_suffix) ? ' ('.$name_suffix.')' : '');
        }
        $this->attributes['first_name'] = implode(' ', $name).(! empty($year) ? ', '.$year.' ' : '').(! empty($name_suffix) ? ' ('.$name_suffix.')' : '');
    }

    public function calculateIndex()
    {
        if (! empty($this->attributes['last_name'])) {
            return str($this->attributes['last_name'])->substr(0, 1);
        }
    }

    protected static function booted()
    {
        static::creating(function ($item) {
            $item->attributes['index'] = $item->calculateIndex();
        });

        static::updating(function ($item) {
            $item->attributes['index'] = $item->calculateIndex();
        });
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'location' => route('subjects.show', ['subject' => $this->slug]),
        ];
    }
}
