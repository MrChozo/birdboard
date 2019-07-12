<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SockMerchantsController extends Controller
{
    public function store()
    {
        $n = request('n');
        $ar = request('ar');

        $pair = 2;
        $total_pairs = 0;

        $unique_socks = array_unique($ar);

        foreach ($unique_socks as $sock) {
            $color = array_keys($ar, $sock);
            $count = count($color);
            $remainder = $count % $pair;
            $matches = ($count - $remainder) / $pair;

            $total_pairs += $matches;
        }

        return response('socks for sale', 200)
            ->header('foo', $total_pairs);
    }
}
