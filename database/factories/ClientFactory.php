<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $phpFiles = glob('/path/to/files/*.php');
        if (empty($phpFiles) === false)
        {
            $randomFile = $phpFiles[array_rand($phpFiles)];
            include($randomFile);
        }

        return [
            'dealer_group' => $this->faker->randomElement(['H1','H2', 'H3']),
            'full_name' => $this->faker->name(),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Laki-Laki','Perempuan']),
            'religion' => $this->faker->randomElement(['Muslim','Kristen', 'Katolik', 'Hindu', 'Buhdda', 'Konghucu']),
            'education' => $this->faker->randomElement(['SD', 'SMP', 'Sarjana/Diploma']),
            'marital_status' => $this->faker->randomElement(['Menikah', 'Belum Menikah']),
            'honda_id' => $this->faker->regexify('[B]{1}[M]{1}[0-9]{4}[A-Z]{2}'),
            'user_selfie' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),

            'id_card_number' => $this->faker->randomNumber(9, true),
            'id_card_address' => $this->faker->streetName(),
            'id_card_province' => $this->faker->state(),
            'id_card_city' => $this->faker->city(),
            'id_card_districts' => $this->faker->citySuffix(),
            'id_card_village' => $this->faker->stateAbbr(),
            'id_card_postal_code' => $this->faker->randomNumber(5, true),
            'id_card_picture' => $this->faker->regexify('[a]{1}[e]{1}[z]{1}[a]{1}[k]{1}[m]{1}[i]{1}[t]{1}[o]{1}[d]{1}[o]{1}[k]{1}[a]{1}[0-9]{1}[-]{1}[m]{1}[i]{1}[n]{1}[.]{1}[j]{1}[p]{1}[g]{1}'),

            'home_address' => $this->faker->address(),
            'home_province' => $this->faker->state(),
            'home_city' => $this->faker->city(),
            'home_districts' => $this->faker->citySuffix(),
            'home_village' => $this->faker->stateAbbr(),
            'home_postal_code' => $this->faker->randomNumber(5, true),

            'email_user' => $this->faker->email(),
            'facebook_id' => $this->faker->name(),
            'instagram_id' => $this->faker->name(),
            'twitter_id' => $this->faker->name(),
            'telph_number' => $this->faker->phoneNumber(),
            'phone_number' => $this->faker->phoneNumber(),
            'relatives_phone_number' => $this->faker->phoneNumber(),
            'user_hobby_1' => $this->faker->word(),
            'user_hobby_2' => $this->faker->word(),
            'user_hobby_3' => $this->faker->word(),
            'user_supervisor' => $this->faker->firstNameMale(),
            'user_coordinator' => $this->faker->firstNameFemale(),
            'user_position' => $this->faker->jobTitle(),
            'user_position_start_date' => $this->faker->date(),
            'user_selfie' => $this->faker->regexify('[a]{1}[e]{1}[z]{1}[a]{1}[k]{1}[m]{1}[i]{1}[t]{1}[o]{1}[d]{1}[o]{1}[k]{1}[a]{1}[0-1]{1}[0-9]{1}[.]{1}[p]{1}[n]{1}[g]{1}'),

        ];
    }
}
