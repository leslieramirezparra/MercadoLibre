<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function categoryId($category)
    {
        return $this->state([
            'category_id'=> $category->id
        ]);
    }
    public function definition()
    {
        return [
            // 'category_id'=> $this->faker->randomElement([1,2,3]),
            'name'=> $this->faker->sentence(),
			'price'=>$this->faker->randomFloat(2,1,1000),
            'stock'=>$this->faker->randomDigit(),
            'description'=>$this->faker->paragraph(),
        ];

    }

    // public function configure()
    // {
    //     return $this->afterCreating(function(Book $book)
    //     {
    //         $file = new File(['route'=> '/storage/image/books/default.png']);
    //         $book->file()->save($file);
    //     });
    // }
}