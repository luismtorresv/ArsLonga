<?php

namespace App\Console\Commands;

use App\Models\Auction;
use Illuminate\Console\Command;

class CloseExpiredAuctions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auctions:close-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close expired auctions and assign winners to the highest bidders';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Checking for expired auctions...');

        // Find all auctions that have ended but don't have a winner yet
        $expiredAuctions = Auction::whereNull('winning_bidder_id')
            ->where('final_date', '<=', now())
            ->get();

        if ($expiredAuctions->isEmpty()) {
            $this->info('No expired auctions found.');

            return self::SUCCESS;
        }

        $closedCount = 0;
        $failedCount = 0;

        foreach ($expiredAuctions as $auction) {
            $this->line("Processing Auction #{$auction->getId()}...");

            if ($auction->closeAuction()) {
                $auction->refresh(); // Reload to get the winner
                $winner = $auction->winning_bidder;
                $latestOrder = $winner->orders()->latest()->first();

                $this->info("  ✓ Auction #{$auction->getId()} closed successfully.");
                $this->line("    Winner: User #{$winner->getId()} ({$winner->getName()})");
                if ($latestOrder) {
                    $this->line("    Order #{$latestOrder->getId()} created with total: \${$latestOrder->getTotal()}"); // @phpstan-ignore-line
                }
                $closedCount++;
            } else {
                $this->warn("  ✗ Auction #{$auction->getId()} could not be closed (no bids or insufficient balance).");
                $failedCount++;
            }
        }

        $this->newLine();
        $this->info('Summary:');
        $this->info("  - Successfully closed: {$closedCount}");
        if ($failedCount > 0) {
            $this->warn("  - Failed to close: {$failedCount}");
        }

        return self::SUCCESS;
    }
}
