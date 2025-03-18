<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $fillable = [
        'title',
        'type',
        'amount',
        'date',
        'kategori',
        'description',
        'file_path'
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2'
    ];

    public function getTypeLabelAttribute()
    {
        return match($this->type) {
            'income' => 'Pemasukan',
            'expense' => 'Pengeluaran',
            default => $this->type,
        };
    }

    public static function calculateBalance()
    {
        $income = self::where('type', 'income')->sum('amount');
        $expense = self::where('type', 'expense')->sum('amount');
        return $income - $expense;
    }

    public static function getTotalIncome()
    {
        return self::where('type', 'income')->sum('amount');
    }

    public static function getTotalExpense()
    {
        return self::where('type', 'expense')->sum('amount');
    }
} 