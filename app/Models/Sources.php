<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sources extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_code',
        'source',
    ];

    protected $table = 'sources';

    public static function createCode()
    {
        $latestCode = self::orderBy('source_code', 'desc')->value('source_code');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'S' . $formattedCodeNumber;
    }
}
