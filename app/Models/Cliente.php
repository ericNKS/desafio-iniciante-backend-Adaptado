<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'cpf', 'carro_id', 'data_nascimento'];

    public function rules()
    {
        return [
            'nome' => 'required|string|max:50',
            'cpf' => 'required|unique:clientes,cpf|numeric',
            'carro_id' => 'exists:carros,id',
            'data_nascimento' => 'required|date'
        ];
    }

    public function feedback()
    {
        return [
            'required' => ':attribute é obrigatorio',
            'nome.max' => 'O nome so pode ter no máximo 50 caracteres',
            'cpf.unique' => 'O CPF já existe no banco de dados',
            'exists' => 'O :attribute não existe no banco de dados',
            'data_nascimento.date' => 'A data de nascimento não está no formato valido (yyyy-mm-dd)'
        ];
    }

    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }
}
