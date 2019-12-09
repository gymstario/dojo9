<?php

namespace App\Http\Middleware;

use App\Http\Models\Studio;
use Closure;
use Illuminate\Support\Facades\Auth;

class OwnerActionAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->member === null || Auth::user()->member->studio === null) {
            $request->session()->put('showSetupModal', true);
        } else {
            $request->session()->forget('showSetupModal');
            $studio = Auth::user()->member->studio;
            if ($studio->status !== 'active') {
                $status = Auth::user()->member->studio->checkVerificationStatus();
                if ($status !== true) {
                    $request->session()->put('showVerificationErrors', $status);
                } else {
                    $request->session()->forget(['showSetupModal', 'showVerificationErrors']);
                }
            } else {
                $request->session()->forget(['showSetupModal', 'showVerificationErrors']);
            }
        }
        return $next($request);
    }
}
