<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'brand',
        'price',
        'price_sale',
        'category',
        'stock',
    ];

    protected $rules = [
        'name' => 'required|string|max:100',
        'description' => 'required|string|max:1000',
        'image' => 'required|string|max:100',
        'brand' => 'required|string|max:100',
        'price' => 'required|numeric',
        'price_sale' => 'required|numeric',
        'category' => 'required|string|max:100',
        'stock' => 'required|integer',
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'name.string' => 'El nombre debe ser un texto',
        'name.max' => 'El nombre no debe exceder los 100 caracteres',
        'description.required' => 'La descripción es requerida',
        'description.string' => 'La descripción debe ser un texto',
        'description.max' => 'La descripción no debe exceder los 1000 caracteres',
        'image.required' => 'La imagen es requerida',
        'image.string' => 'La imagen debe ser un texto',
        'image.max' => 'La imagen no debe exceder los 100 caracteres',
        'brand.required' => 'La marca es requerida',
        'brand.string' => 'La marca debe ser un texto',
        'brand.max' => 'La marca no debe exceder los 100 caracteres',
        'price.required' => 'El precio es requerido',
        'price.numeric' => 'El precio debe ser un número',
        'price_sale.required' => 'El precio de venta es requerido',
        'price_sale.numeric' => 'El precio de venta debe ser un número',
        'category.required' => 'La categoría es requerida',
        'category.string' => 'La categoría debe ser un texto',
        'category.max' => 'La categoría no debe exceder los 100 caracteres',
        'stock.required' => 'El stock es requerido',
        'stock.integer' => 'El stock debe ser un número entero',
    ];

    protected $names = [
        'name' => 'nombre',
        'description' => 'descripción',
        'image' => 'imagen',
        'brand' => 'marca',
        'price' => 'precio',
        'price_sale' => 'precio de venta',
        'category' => 'categoría',
        'stock' => 'stock',
    ];

    public function getRules()
    {
        return $this->rules;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getNames()
    {
        return $this->names;
    }

    public function toArray(){
        $data = parent::toArray();
        $data['category'] = $this->category;
        return $data;
    }




}
