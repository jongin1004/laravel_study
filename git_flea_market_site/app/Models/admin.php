<?php

use App\admin;

namespace App;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {

  use HasFactory;
  protected $table ='memos';
  protected $fillable =['content'];
}
