<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'major_code',
        'faculty_code',
        'major',
    ];

    protected $table = 'major';

    public static function createCode()
    {
        $latestCode = self::orderBy('major_code', 'desc')->value('major_code');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'M' . $formattedCodeNumber;
    }

    public function fakultas()
    {
        return $this->belongsTo(Faculty::class, 'faculty_code', 'faculty_code');
    }

    public function kelas()
    {
        return $this->hasMany(Classes::class, 'major_code');
    }
}
