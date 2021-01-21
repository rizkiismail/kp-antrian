<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\core\LogModel;
use Illuminate\Support\Facades\View;


class StaffModel extends Model
{

    protected $table = 'staff';
    protected $primaryKey = 'staff_id';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable = [
        'staff_id','name', 'email','password',
    ];
}
?>
