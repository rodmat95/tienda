<?php

namespace Database\Factories;

use App\Models\Commission;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $counter = 3;
        
        $ids = $counter++;
        $supplierName = ["Suministros Industriales del Norte S.A.", "Distribuciones Logísticas González S.C.", "Comercializadora Moderna de Electrónicos S.L.", "Proveedora de Materiales Construx E.I.R.L.", "Importadora Textil Mediterráneo S.A.C.", "Soluciones Agropecuarias del Valle Ltda.", "Innovaciones Tecnológicas GlobalTech S.A.", "Exportadora de Productos Naturales EcoVida S.R.L.", "Logística y Distribución Integral Luna S.C.", "Servicios de Construcción y Mantenimiento ProManten S.A."];
        $suppliers = $this->faker->unique()->randomElement($supplierName);
        $commissions = Commission::all()->random()->id;
        $users = User::factory()->create();
        $users->assignRole('Vendedor');

        return [
            'id' => $ids,
            'name' => $suppliers,
            'slug' => Str::slug($suppliers),
            'commission_id' => $commissions,
            'user_id' => $users->id,
        ];
    }
}