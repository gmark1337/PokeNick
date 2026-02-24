<?php

namespace App\Jobs;

use App\Models\Nickname;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Pest\Support\Str;

use function Symfony\Component\String\b;

class GeneratePokemonNickname
{
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Generating nickname for ' . User::count() . ' users....');
        $users = User::all();

        foreach($users as $user){
            $nickname = $this -> generateNickname();

            Nickname::create([
                'user_id' => $user->id,
                'name' => $nickname,
            ]);
        }
    }

    private function generateNickname(): string{
        
        if(config('services.pokeapi.enabled')){
        try{
            $randomPokemonId = rand(1, 1025);
            $response = Http::withoutVerifying()->get("https://pokeapi.co/api/v2/pokemon/{$randomPokemonId}");
            if($response->successful()){
                $name = $response->json()['name'];
                Log::info("Generated Pokémon nickname: {$name}");
                return $name;
                }
            }catch(\Exception $ex){
                Log::error("PokeAPI error: " . $ex->getMessage());
            }
        }
        Log::info('Service disabled or failed. Using fallback...');
        return Str::random(8);
    }
}
