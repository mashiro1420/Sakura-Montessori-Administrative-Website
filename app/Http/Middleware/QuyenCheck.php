<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuyenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $quyen = session('id_quyen');

        if ($quyen == 1) {
            return $next($request);
        }

        if ($quyen == 2 && $request->path() !== 'ql_hs') {
            return redirect()->route('ql_hs')->with('error', 'Không có quyền truy cập.');
        }

        $trang_nv = ['ql_hs','ql_nv'];
        if ($quyen == 3 && !in_array($request->path(), $trang_nv)) {
            return redirect()->route('ql_nv')->with('error', 'Không có quyền truy cập.');
        }
        return $next($request);
    }
}
