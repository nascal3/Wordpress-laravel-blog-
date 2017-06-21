<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['published_at'];

    protected $fillable = ['title','body', 'slug', 'category_id', 'excerpt', 'published_at'];

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function getImageUrlAttribute($value) {
        $imageUrl = "";
        if(! is_null($this->image)){

            $imagePath = public_path()."/img/".$this->image;
            if(file_exists($imagePath)) {
                    $imageUrl = asset("/img/".$this->image);
            }
        }

        return $imageUrl;
    }

    function getImageThumbUrlAttribute($value){
        $imageUrl = "";
        if(! is_null($this->image)){

            $ext = substr(strrchr($this->image,'.'), 1);
            $thumbnail = str_replace('.{$ext}', '_thumb.{$ext}', $this->image);

            $imagePath = public_path()."/img/".$thumbnail;
            if(file_exists($imagePath)) {
                $imageUrl = asset("/img/".$thumbnail);
            }
        }

        return $imageUrl;
    }

    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function getPublishedAtAttribute($value) {
        $this->attributes['published_at'] = $value?: NULL ;
    }

    public function scopelatestFirst($query) {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query) {
        return $query->where("published_at", "<=", Carbon::now());
    }

    public function scopePopular($query) {
        return $query->orderBy("view_count", "desc");
    }

    public function scopeScheduled ($query) {
        return $query->where("published_at", ">", Carbon::now());
    }

    public function scopeDraft($query) {
        return $query->whereNull("published_at");
    }

    public function scopeFilter($query, $term) {
        //check if term entered
        if ($term){
            $query->where(function ($q) use ($term){
                $q->whereHas('author', function ($qr) use($term) {
                    $qr->where('name','LIKE', "%{$term}%");
                });
                $q->orwhere('title', 'LIKE', "%{$term}%");
                $q->orwhere('excerpt', 'LIKE', "%{$term}%");
            });
        }
    }

    public function dateFormatted($showTimes = false){
        $format = "d/m/Y";
        if($showTimes) $format = $format . " H:i:s";

        return $this->created_at->format($format);
    }

    public function publicationLabel(){
        if(! $this->published_at){
            return '<span class="label label-warning">Draft</span>';
        }elseif ($this->published_at && $this->published_at->isFuture()){
            return '<span class="label label-info">scheduled</span>';
        }else{
            return '<span class="label label-success">Published</span>';
        }
    }

}
