<?php
namespace App\Events;

use App\Models\Images;
use App\Models\products;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SaveProductEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $data;
    public $images;

    public function __construct($data, $images)
    {
        $this->data = $data;
        $this->images = $images;
        $this->data['user_id'] = auth()->id();
        $this->product = products::query()->create($this->data);
        $this->saveImages();
    }

    protected function saveImages()
    {
        if ($this->images) {
            foreach ($this->images as $image) {
// Save each image
                $imageName = $image->store('images', 'public');
                Images::create([
                    'name' => $imageName,
                    'imageable_id' => $this->product->id,
                    'imageable_type' => products::class,
                ]);
            }
        }
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
