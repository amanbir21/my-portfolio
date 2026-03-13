namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast; // 1. CRITICAL
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AttendanceUpdated implements ShouldBroadcast // 2. Add this interface
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // 3. Define the public data to be sent to Vue
    public $newCount;
    public $percentage;

    public function __construct($newCount, $percentage)
    {
        $this->newCount = $newCount;
        $this->percentage = $percentage;
    }

    /**
     * The channel name must match what you listen for in Vue (Echo.channel)
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('registrar-updates'), // 4. Use a public channel
        ];
    }

    /**
     * Optional: Customize the event name sent to the frontend
     */
    public function broadcastAs(): string
    {
        return 'attendance.updated';
    }
}
