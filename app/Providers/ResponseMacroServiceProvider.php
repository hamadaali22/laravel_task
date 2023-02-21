<?php

namespace App\Providers;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('bEncode', function ($value) {
            return Response::make(base64_encode($value));
        });


        Str::macro('isLength', function ($str, $length) {

            return static::length($str) == $length;
        });

        Carbon::macro('toFormattedDate', function(){
            return $this->format('d/m/Y');
        });
        
        Carbon::macro('toFormattedTime', function(){
            return $this->format('H:i A');
        });

        Response::macro('success', function ($message) {
            return ['status' => true,'message' => $message];
        });
        
        Response::macro('fail', function ($message) {
            return ['status' => false,'message' => $message];
        });

        // Builder::macro('search', function(string $attribute, string $searchTerm) {
        //    return $this->where($attribute, 'LIKE', "%{$searchTerm}%");
        // });

        // UploadedFile::macro('manipulate', function ($callback) {
        //     return tap($this,function (UploadedFile $file) use ($callback) {
        //         $image = Image::make($file->getPathname());
        //         $callback($image);
        //         $image->save();
        //     });
        // });
    }
}
