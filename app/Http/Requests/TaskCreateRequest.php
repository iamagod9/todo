<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskCreateRequest extends FormRequest
{
  public function rules(): array
  {
    return [
      'title' => ['required', 'string', 'max:255'],
      'description' => ['required', 'string', 'max:255'],
      'status' => ['required', 'string', 'max:255'],
      'deadline' => ['required', 'string', 'max:255'],
    ];
  }
}
