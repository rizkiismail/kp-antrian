<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class BagianModel extends Model
{

    protected $table = 'bagian';
    protected $primaryKey = 'bagian_id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'bagian_id','name'
    ];
    

    
}
?>
