<?php

namespace Alansgonzaga\EvolutionApi\Console;

use Illuminate\Console\Command;
// use Laravel\Cashier\Cashier;

class WebhookCommand extends Command
{
    public const DEFAULT_EVENTS = [
        'message.upsert'
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'evolution:webhook
            {--disabled : Immediately disable the webhook after creation}
            {--url= : The URL endpoint for the webhook}
            {--api-version= : The Evolution API version the webhook should use}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the Evolution webhook to interact with EvolutionAPI.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // $webhookEndpoints = Cashier::stripe()->webhookEndpoints;

        // $endpoint = $webhookEndpoints->create(array_filter([
        //     'enabled_events' => config('cashier.webhook.events') ?: self::DEFAULT_EVENTS,
        //     'url' => $this->option('url') ?? route('cashier.webhook'),
        //     'api_version' => $this->option('api-version') ?? Cashier::STRIPE_VERSION,
        // ]));

        $this->components->info('The EvolutionAPI webhook was created successfully.');
        // $this->components->info('The EvolutionAPI webhook was created successfully. Retrieve the webhook secret in your Stripe dashboard and define it as an environment variable.');
        
    }
}
