<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty',
        'faculty_code',
    ];

    protected $table = 'faculty';

    public static function createCode()
    {
        $latestCode = self::orderBy('faculty_code', 'desc')->value('faculty_code');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'F' . $formattedCodeNumber;
    }

    public function major()
    {
        return $this->hasMany(Major::class, 'faculty_code');
    }
}
