<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement($array = ['In Search of Lost Time', 'Ulysses', 'Don Quixote', 'One Hundred Years of Solitude', 'The Great Gatsby', 'Moby Dick', 'War and Peace']),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->name(),
            'year_published' => $this->faker->year($max = 'now'),
            'category_id' => $this->faker->randomElement($array =[1,2,3,4,5,6,7,8,9,10]),
            'book_status_id' =>$this->faker->randomElement($array = [1,2,3,4]),
            'isbn' => $this->faker->isbn10(),
        ];
    }
}
