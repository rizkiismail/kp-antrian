<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class MahasiswaModel extends Model
{

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'nim', 'name', 'email', 'password'
    ];
}
?>
