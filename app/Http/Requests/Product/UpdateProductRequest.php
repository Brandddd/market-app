<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
			'category_id' => ['required', 'exists:categories,id'],
			'name' => ['required', 'string'],
			'description' => ['required', 'string'],
			'stock' => ['required', 'numeric', 'integer'],
			'price' => ['required', 'numeric', 'regex:/^[\d]{1,6}(\.[\d]{1,2})?$/'],
		];
    }

	public function messages()
	{
		return [
			'category_id.required' => 'La categoría es requerida.',
			'category_id.exists' => 'No se encuentra la categoría en la base de datos.',

			'name.required' => 'El nombre del producto es requerido.',
			'name.string' => 'El nombre debe ser una cadena de texto.',

			'description.required' => 'La descripción es requerida, puede ser breve!',
			'description.string' => 'La descripción debe ser de tipo texto.',

			'stock.required' => 'El stock es requerido. ¡Pon 0 si el producto esta agotado!',
			'stock.numeric' => 'El stock debe ser un número. ¡Las letras no son numeros!',
			'stock.integer' => 'El stock debe ser un número entero. ¿Cómo almacenas 1 y media manzanas?',

			'price.required' => 'El precio es requerido. ¿O lo quieres regalar?',
			'price.numeric' => 'El precio debe ser un número. ¡Las letras no son numeros!',
			'price.regex' => 'El precio debe ser un número entre 1 y 6 digitos, puede ser decimal.',
		];
	}
}
