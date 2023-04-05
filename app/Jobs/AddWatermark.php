<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($product_image_id)
    {
        $this->product_image_id = $product_image_id;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->product_image_id);
        if(!$i) {
            return;
        }
        $srcPath = storage_path('app/public/' . $i->path);
        $image = SpatieImage::load($srcPath);
        $image->watermark(base_path('public/media/prestowhite.png'))
            ->watermarkPosition('bottom-right')
            ->watermarkOpacity(50)
            ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT);
        
        $image->save($srcPath);

    }
}