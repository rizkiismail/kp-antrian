<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class AdminModel extends Model
{

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'admin_id','name', 'email','password' 
    ];
    

    
}
?>
