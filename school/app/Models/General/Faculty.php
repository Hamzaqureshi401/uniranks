<?php

namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\General\Faculty
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 * @property string|null $icon
 * @property string|null $image
 * @property string|null $h1
 * @property string|null $h2
 * @property string|null $h3
 * @property string|null $h4
 * @property string|null $meta_keywords
 * @property string|null $meta_page_description
 * @property string|null $image_alt_text
 * @property string|null $image_title
 * @property string|null $icon_alt_text
 * @property string|null $icon_title
 * @property string|null $page_url
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereH2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereH3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereH4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereIconAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereIconTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereImageAltText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereImageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereMetaPageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty wherePageUrl($value)
 * @mixin \Eloquent
 * @property string|null $title
 * @property string|null $description
 * @property string|null $short_description
 * @property string|null $translated_name
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereTranslatedName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faculty whereUpdatedAt($value)
 */
class Faculty extends Model
{
    protected $table = 'faculties';

    public $timestamps = false;

    protected $fillable = ['faculty_code', 'faculty_name', 'faculty_icon', 'faculty_image', 'h1', 'h2', 'h3', 'h4', 'meta_keywords', 'meta_page_description', 'image_alt_text', 'image_title', 'icon_alt_text', 'icon_title', 'page_url'];
}
