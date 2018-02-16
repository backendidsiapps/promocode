<?php

namespace Backendidsiapps\Promocode;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Promocode
 * @package App
 */
class Promocode extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'discount', 'hash',
    ];

    /**
     * @param int $length
     * @param int $discount
     * @return $this|Model
     */
    public static function generateCode($length = 8, $discount = 10)
    {
        $randomString = substr(str_shuffle('23456789ABCDEFGHJKMNPQRSTUVWXYZ'), 0, $length);

        if (self::where('code', $randomString)->exists()) {
            return self::generateCode($length, $discount);
        }

        $discount = self::normalizeDiscount($discount);

        return self::create(['discount' => $discount, 'code' => $randomString, 'hash' => Str::random(60)]);
    }

    /**
     * @param int $discount
     * @return int
     */
    private static function normalizeDiscount(int $discount): int
    {
        if ($discount > 99) {
            $discount = 99;
        } elseif ($discount < 1) {
            $discount = 1;
        }

        return $discount;
    }
}
