<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPackages extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_code',
        'package',
    ];

    protected $table = 'loan_packages';

    public static function createCode()
    {
        $latestCode = self::orderBy('package_code', 'desc')->value('package_code');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'L' . $formattedCodeNumber;
    }
}
