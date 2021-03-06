<?php

namespace SafonovVA\VBParser\Console;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Models\User;

class DataParser
{
    /**
     * Create a new command instance.
     *
     * @return void
     */
    private string $docDirectory = 'storage/vbparser';

    public function __construct()
    {
        if (!file_exists($this->docDirectory)) {
            mkdir($this->docDirectory);
        }
    }

    public function parse(Collection $dataRows): void
    {
        $fileName = $this->docDirectory . DIRECTORY_SEPARATOR . $dataRows->first()->getTable() . '.csv';
        $attributes = collect($dataRows->first()->getAttributes())->keys();

        $file = fopen($fileName, 'w');
        fputcsv($file, $attributes->toArray());

        foreach ($dataRows as $dataRow) {
            $data = [];
            foreach ($attributes as $attribute) {
                if (is_object($dataRow->{$attribute})) {
                    if ($dataRow->{$attribute} instanceof Carbon) {
                        $dataRow->{$attribute} = $dataRow->{$attribute}->toString();
                    } else {
                        $dataRow->{$attribute} = json_encode($dataRow->{$attribute});
                    }
                }
                $data[$attribute] = $dataRow->{$attribute};
            }
            fputcsv($file, $data);
        }

        fclose($file);
    }

    public function parseUserRoles()
    {
        $fileName = $this->docDirectory . DIRECTORY_SEPARATOR . 'user_roles.csv';
        $attributes = collect(['user_id', 'user_name', 'role_id', 'role_name']);

        $file = fopen($fileName, 'w');
        fputcsv($file, $attributes->toArray());

        foreach (User::all() as $user) {
            foreach ($user->roles as $role) {
                fputcsv($file, [
                    $user->id,
                    $user->name,
                    $role->id,
                    $role->name,
                ]);
            }
        }

        fclose($file);
    }
}
