<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckResourceOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $resource): Response
    {
        $user = Auth::user();
        
        switch ($resource) {
            case 'link':
                $link = $request->route('link');
                if (!$link || $link->user_id !== $user->id) {
                    return redirect()->back()
                        ->with('error', '❌ Accès non autorisé : ce lien ne vous appartient pas.');
                }
                break;
                
            case 'category':
                $category = $request->route('category');
                if (!$category || $category->user_id !== $user->id) {
                    return redirect()->back()
                        ->with('error', '❌ Accès non autorisé : cette catégorie ne vous appartient pas.');
                }
                break;
                
            default:
                abort(403, 'Ressource non reconnue');
        }
        
        return $next($request);
    }
}
