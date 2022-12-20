<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	// ----- Rules for validation -----
	public function rules()
	{
		return [
			'number_id' => ['required', 'numeric', 'unique:users,number_id'],
			'name' => ['required', 'string'],
			'last_name' => ['required', 'string'],
			'email' => ['required', 'email', 'unique:users,email'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		];
	}

	// ----- Messsages Function -----
	public function messages()
	{
		return [
			'number_id.required' => 'El documento es requerido.',
			'number_id.numeric' => 'El documento debe ser numérico.',
			'number_id.unique' => 'El documento ya fue registrado.',

			'name.required' => 'El nombre es requerido.',
			'name.string' => 'El nombre no es válido.',

			'last_name.required' => 'El apellido es requerido.',
			'last_name.string' => 'El apellido no es válido.',

			'email.required' => 'El correo es requerido.',
			'email.email' => 'El correo es inválido.',
			'email.unique' => 'Correo ya se encuentra registrado.',

			'password.required' => 'La contraseña es requerida.',
			'password.string' => 'Debe de ser valida.',
			'password.min' => 'La contraseña es muy corta.',
			'password.confirmed' => 'Las contraseñas no coinciden.',
		];
	}
}
