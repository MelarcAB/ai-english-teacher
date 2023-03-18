<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';
    protected $fillable = [
        'message',
        'extra',
    ];

    static public function log($message, $extra = null)
    {
        $log = new Log();
        $log->message = $message;
        $log->extra = $extra;
        $log->save();
    }
}
