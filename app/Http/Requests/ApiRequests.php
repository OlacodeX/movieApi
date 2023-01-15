<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ApiRequests extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     * This wpould be based on api versions
     * @return bool
     */
    public function authorize()
    {
        return config('app.apiver') >= request('apiver');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    abstract public function rules();
}
