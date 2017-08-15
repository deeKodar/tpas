<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolLevel;
use App\Models\Dzongkhag;
use App\Models\SchoolStatusType;


class School extends Model
{

    protected $table = 'schools';
    protected $primaryKey = 'id';


    protected $fillable = ['school_code', 'name', 'school_level_id', 'dzongkhag_id', 'school_status_type_id','user_id', 'created_at', 'updated_at', 'version'];

    public function schoolLevel() {
        return $this->belongsTo(SchoolLevel::class, 'school_level_id');
    }

    public function dzongkhag() {
        return $this->belongsTo(Dzongkhag::class);
    }

    public function schoolStatusType() {
        return $this->belongsTo(SchoolStatusType::class, 'school_status_type_id');
    }

}
