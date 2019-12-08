<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //en la columna name de mi bd quiero ponerle lo que tengo en mi columna 0 de mi excel
            'name'      => $row["0"], //lo que tengo en el row[0] de mi excel (a)
            'email'     => $row["1"], //b
            'password'  => \Hash::make($row['2'])//convertira la contraseña en formato de la contraseña hash, c
        ]);
    }
}
