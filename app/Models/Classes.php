<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_code',
        'major_code',
        'classes',
    ];

    protected $table = 'classes';

    public static function createCode()
    {
        $latestCode = self::orderBy('class_code', 'desc')->value('class_code');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'C' . $formattedCodeNumber;
    }

    public function jurusan()
    {
        return $this->belongsTo(Major::class, 'major_code', 'major_code');
    }
}
