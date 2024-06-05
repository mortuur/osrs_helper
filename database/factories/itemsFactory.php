<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition($data)
    {
        return [
            "name" => $data->name,
            "tradeable_on_ge" => $data->tradeable_on_ge,
            "member" => $data->member,
            "linked_id_item" => $data->linked_id_item,
            "linked_id_noted" => $data->linked_id_noted,
            "linked_id_placeholder" => $data->linked_id_placeholder,
            "noted" => $data->note,
            "noteable" => $data->noteable,
            "placeholder" => $data->placeholder,
            "stackable" => $data->stackable,
            "equipable" => $data->equipable,
            "cost" => $data->cost,
            "lowalch" => $data->lowalch,
            "highalch" => $data->highalch,
            "stacked" => $data->stacked,
        ];
    }
}
