<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class AntrianModel extends Model
{

    protected $table = 'antrian';
    protected $primaryKey = 'antrian_id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'antrian_id','no_antrian', 'nim','bagian_id', 'keperluan','status','tanggal'
    ];
    

    
}
?>
