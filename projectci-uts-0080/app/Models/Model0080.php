<?php

namespace App\Models;

use CodeIgniter\Model;

class Model0080 extends Model
{
    protected $table            = 'tbbuku_0080';
    protected $primaryKey       = 'bukukode';
    protected $allowedFields    = ['bukukode', 'bukujudul', 'bukukategori', 'bukuhalaman', 'bukupenerbit', 'bukuisbn', 'bukuharga', 'bukusampul'];

}
