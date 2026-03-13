<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

protected $fillable = [

'name',
'number',
'club',
'team',
'category',
'position',
'age',

'speed',
'passing',
'shooting',
'defense',
'physical'

];

public function getOverallAttribute()
{

$skills = [
$this->speed,
$this->passing,
$this->shooting,
$this->defense,
$this->physical
];

$skills = array_filter($skills, fn($v)=>!is_null($v));

if(count($skills)==0){
return 0;
}

return round(array_sum($skills)/count($skills));

}

}