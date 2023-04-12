<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UploadMultipleImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request has a file
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $uploadedImages = [];

            // Loop through the images and upload them
            foreach ($images as $image) {
                // Generate a unique name for the image
                $fileName = time() . '_' . $image->getClientOriginalName();

                // Upload the image to the directory
                $image->move(public_path('images'), $fileName);

                // Add the image name to the array
                $uploadedImages[] = $fileName;
            }

            $request->merge(['images_names' => $uploadedImages]);
        }

        return $next($request);
    }
}
