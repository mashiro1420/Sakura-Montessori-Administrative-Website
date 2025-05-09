<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QuyenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $quyen): Response
    {
        $quyens = session('quyen');

        if (!in_array($quyen, $quyens)) {
            return redirect()->back()->with('bao_loi', 'Không có quyền truy cập vào trang này.');
        }

        return $next($request);
    }
}
