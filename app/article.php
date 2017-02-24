<?php
/**
 * Created by PhpStorm.
 * User: huiting
 * Date: 2017/2/18
 * Time: 10:12
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model{

  public function test(){

      return 'test model';
  }
}
