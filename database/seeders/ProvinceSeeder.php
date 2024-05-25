<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Departamento: Amazonas (1)
        Province::create(['department_id' => 1, 'name' => 'Chachapoyas']);
        Province::create(['department_id' => 1, 'name' => 'Bagua']);
        Province::create(['department_id' => 1, 'name' => 'Bongará']);
        Province::create(['department_id' => 1, 'name' => 'Condorcanqui']);
        Province::create(['department_id' => 1, 'name' => 'Luya']);
        Province::create(['department_id' => 1, 'name' => 'Rodríguez de Mendoza']);
        Province::create(['department_id' => 1, 'name' => 'Utcubamba']);
        // Departamento: Áncash (2)
        Province::create(['department_id' => 2, 'name' => 'Huaraz']);
        Province::create(['department_id' => 2, 'name' => 'Aija']);
        Province::create(['department_id' => 2, 'name' => 'Antonio Raymondi']);
        Province::create(['department_id' => 2, 'name' => 'Asunción']);
        Province::create(['department_id' => 2, 'name' => 'Bolognesi']);
        Province::create(['department_id' => 2, 'name' => 'Carhuaz']);
        Province::create(['department_id' => 2, 'name' => 'Carlos Fermín Fitzcarrald']);
        Province::create(['department_id' => 2, 'name' => 'Casma']);
        Province::create(['department_id' => 2, 'name' => 'Corongo']);
        Province::create(['department_id' => 2, 'name' => 'Huari']);
        Province::create(['department_id' => 2, 'name' => 'Huarmey']);
        Province::create(['department_id' => 2, 'name' => 'Huaylas']);
        Province::create(['department_id' => 2, 'name' => 'Mariscal Luzuriaga']);
        Province::create(['department_id' => 2, 'name' => 'Ocros']);
        Province::create(['department_id' => 2, 'name' => 'Pallasca']);
        Province::create(['department_id' => 2, 'name' => 'Pomabamba']);
        Province::create(['department_id' => 2, 'name' => 'Recuay']);
        Province::create(['department_id' => 2, 'name' => 'Santa']);
        Province::create(['department_id' => 2, 'name' => 'Sihuas']);
        Province::create(['department_id' => 2, 'name' => 'Yungay']);
        // Departamento: Apurímac (3)
        Province::create(['department_id' => 3, 'name' => 'Abancay']);
        Province::create(['department_id' => 3, 'name' => 'Andahuaylas']);
        Province::create(['department_id' => 3, 'name' => 'Antabamba']);
        Province::create(['department_id' => 3, 'name' => 'Aymaraes']);
        Province::create(['department_id' => 3, 'name' => 'Cotabambas']);
        Province::create(['department_id' => 3, 'name' => 'Chincheros']);
        Province::create(['department_id' => 3, 'name' => 'Grau']);
        // Departamento: Arequipa (4)
        Province::create(['department_id' => 4, 'name' => 'Arequipa']);
        Province::create(['department_id' => 4, 'name' => 'Camaná']);
        Province::create(['department_id' => 4, 'name' => 'Caravelí']);
        Province::create(['department_id' => 4, 'name' => 'Castilla']);
        Province::create(['department_id' => 4, 'name' => 'Caylloma']);
        Province::create(['department_id' => 4, 'name' => 'Condesuyos']);
        Province::create(['department_id' => 4, 'name' => 'Islay']);
        Province::create(['department_id' => 4, 'name' => 'La Unión']);
        // Departamento: Ayacucho (5)
        Province::create(['department_id' => 5, 'name' => 'Huamanga']);
        Province::create(['department_id' => 5, 'name' => 'Cangallo']);
        Province::create(['department_id' => 5, 'name' => 'Huanca Sancos']);
        Province::create(['department_id' => 5, 'name' => 'Huanta']);
        Province::create(['department_id' => 5, 'name' => 'La Mar']);
        Province::create(['department_id' => 5, 'name' => 'Lucanas']);
        Province::create(['department_id' => 5, 'name' => 'Parinacochas']);
        Province::create(['department_id' => 5, 'name' => 'Pàucar del Sara Sara']);
        Province::create(['department_id' => 5, 'name' => 'Sucre']);
        Province::create(['department_id' => 5, 'name' => 'Víctor Fajardo']);
        Province::create(['department_id' => 5, 'name' => 'Vilcas Huamán']);
        // Departamento: Cajamarca (6)
        Province::create(['department_id' => 6, 'name' => 'Cajamarca']);
        Province::create(['department_id' => 6, 'name' => 'Cajabamba']);
        Province::create(['department_id' => 6, 'name' => 'Celendín']);
        Province::create(['department_id' => 6, 'name' => 'Chota']);
        Province::create(['department_id' => 6, 'name' => 'Contumazá']);
        Province::create(['department_id' => 6, 'name' => 'Cutervo']);
        Province::create(['department_id' => 6, 'name' => 'Hualgayoc']);
        Province::create(['department_id' => 6, 'name' => 'Jaén']);
        Province::create(['department_id' => 6, 'name' => 'San Ignacio']);
        Province::create(['department_id' => 6, 'name' => 'San Marcos']);
        Province::create(['department_id' => 6, 'name' => 'San Miguel']);
        Province::create(['department_id' => 6, 'name' => 'San Pablo']);
        Province::create(['department_id' => 6, 'name' => 'Santa Cruz']);
        // Departamento: Callao (7)
        Province::create(['department_id' => 7, 'name' => 'Prov. Const. del Callao']);
        // Departamento: Cusco (8)
        Province::create(['department_id' => 8, 'name' => 'Cusco']);
        Province::create(['department_id' => 8, 'name' => 'Acomayo']);
        Province::create(['department_id' => 8, 'name' => 'Anta']);
        Province::create(['department_id' => 8, 'name' => 'Calca']);
        Province::create(['department_id' => 8, 'name' => 'Canas']);
        Province::create(['department_id' => 8, 'name' => 'Canchis']);
        Province::create(['department_id' => 8, 'name' => 'Chumbivilcas']);
        Province::create(['department_id' => 8, 'name' => 'Espinar']);
        Province::create(['department_id' => 8, 'name' => 'La Convención']);
        Province::create(['department_id' => 8, 'name' => 'Paruro']);
        Province::create(['department_id' => 8, 'name' => 'Paucartambo']);
        Province::create(['department_id' => 8, 'name' => 'Quispicanchi']);
        Province::create(['department_id' => 8, 'name' => 'Urubamba']);
        // Departamento: Huancavelica (9)
        Province::create(['department_id' => 9, 'name' => 'Huancavelica']);
        Province::create(['department_id' => 9, 'name' => 'Acobamba']);
        Province::create(['department_id' => 9, 'name' => 'Angaraes']);
        Province::create(['department_id' => 9, 'name' => 'Castrovirreyna']);
        Province::create(['department_id' => 9, 'name' => 'Churcampa']);
        Province::create(['department_id' => 9, 'name' => 'Huaytará']);
        Province::create(['department_id' => 9, 'name' => 'Tayacaja']);
        // Departamento: Huánuco (10)
        Province::create(['department_id' => 10, 'name' => 'Huánuc']);
        Province::create(['department_id' => 10, 'name' => 'Amb']);
        Province::create(['department_id' => 10, 'name' => 'Dos de May']);
        Province::create(['department_id' => 10, 'name' => 'Huacaybamb']);
        Province::create(['department_id' => 10, 'name' => 'Huamalíe']);
        Province::create(['department_id' => 10, 'name' => 'Leoncio Prad']);
        Province::create(['department_id' => 10, 'name' => 'Marañó']);
        Province::create(['department_id' => 10, 'name' => 'Pachite']);
        Province::create(['department_id' => 10, 'name' => 'Puerto Inc']);
        Province::create(['department_id' => 10, 'name' => 'Lauricocha']);
        Province::create(['department_id' => 10, 'name' => 'Yarowilca']);
        // Departamento: Ica (11)
        Province::create(['department_id' => 11, 'name' => 'Ica']);
        Province::create(['department_id' => 11, 'name' => 'Chincha']);
        Province::create(['department_id' => 11, 'name' => 'Nasca']);
        Province::create(['department_id' => 11, 'name' => 'Palpa']);
        Province::create(['department_id' => 11, 'name' => 'Pisco']);
        // Departamento: Junín (12)
        Province::create(['department_id' => 12, 'name' => 'Huancayo']);
        Province::create(['department_id' => 12, 'name' => 'Concepción']);
        Province::create(['department_id' => 12, 'name' => 'Chanchamayo']);
        Province::create(['department_id' => 12, 'name' => 'Jauja']);
        Province::create(['department_id' => 12, 'name' => 'Junín']);
        Province::create(['department_id' => 12, 'name' => 'Satipo']);
        Province::create(['department_id' => 12, 'name' => 'Tarma']);
        Province::create(['department_id' => 12, 'name' => 'Yauli']);
        Province::create(['department_id' => 12, 'name' => 'Chupaca']);
        // Departamento: La Libertad (13)
        Province::create(['department_id' => 13, 'name' => 'Trujillo']);
        Province::create(['department_id' => 13, 'name' => 'Ascope']);
        Province::create(['department_id' => 13, 'name' => 'Bolívar']);
        Province::create(['department_id' => 13, 'name' => 'Chepén']);
        Province::create(['department_id' => 13, 'name' => 'Julcán']);
        Province::create(['department_id' => 13, 'name' => 'Otuzco']);
        Province::create(['department_id' => 13, 'name' => 'Pacasmayo']);
        Province::create(['department_id' => 13, 'name' => 'Pataz']);
        Province::create(['department_id' => 13, 'name' => 'Sánchez Carrión']);
        Province::create(['department_id' => 13, 'name' => 'Santiago de Chuco']);
        Province::create(['department_id' => 13, 'name' => 'Gran Chimú']);
        Province::create(['department_id' => 13, 'name' => 'Virú']);
        // Departamento: Lambayeque (14)
        Province::create(['department_id' => 14, 'name' => 'Chiclayo']);
        Province::create(['department_id' => 14, 'name' => 'Ferreñafe']);
        Province::create(['department_id' => 14, 'name' => 'Lambayeque']);
        // Departamento: Lima (15)
        Province::create(['department_id' => 15, 'name' => 'Lima']);
        Province::create(['department_id' => 15, 'name' => 'Barranca']);
        Province::create(['department_id' => 15, 'name' => 'Cajatambo']);
        Province::create(['department_id' => 15, 'name' => 'Canta']);
        Province::create(['department_id' => 15, 'name' => 'Cañete']);
        Province::create(['department_id' => 15, 'name' => 'Huaral']);
        Province::create(['department_id' => 15, 'name' => 'Huarochirí']);
        Province::create(['department_id' => 15, 'name' => 'Huaura']);
        Province::create(['department_id' => 15, 'name' => 'Oyón']);
        Province::create(['department_id' => 15, 'name' => 'Yauyos']);
        // Departamento: Loreto (16)
        Province::create(['department_id' => 16, 'name' => 'Maynas']);
        Province::create(['department_id' => 16, 'name' => 'Alto Amazonas']);
        Province::create(['department_id' => 16, 'name' => 'Loreto']);
        Province::create(['department_id' => 16, 'name' => 'Mariscal Ramón Castilla']);
        Province::create(['department_id' => 16, 'name' => 'Requena']);
        Province::create(['department_id' => 16, 'name' => 'Ucayali']);
        Province::create(['department_id' => 16, 'name' => 'Datem del Marañón']);
        Province::create(['department_id' => 16, 'name' => 'Putumay']);
        // Departamento: Madre de Dios (17)
        Province::create(['department_id' => 17, 'name' => 'Tambopata']);
        Province::create(['department_id' => 17, 'name' => 'Manu']);
        Province::create(['department_id' => 17, 'name' => 'Tahuamanu']);
        // Departamento: Moquegua (18)
        Province::create(['department_id' => 18, 'name' => 'Mariscal Nieto']);
        Province::create(['department_id' => 18, 'name' => 'General Sánchez Cerro']);
        Province::create(['department_id' => 18, 'name' => 'Ilo']);
        // Departamento: Pasco (19)
        Province::create(['department_id' => 19, 'name' => 'Pasco']);
        Province::create(['department_id' => 19, 'name' => 'Daniel Alcides Carrión']);
        Province::create(['department_id' => 19, 'name' => 'Oxapampa']);
        // Departamento: Piura (20)
        Province::create(['department_id' => 20, 'name' => 'Piura']);
        Province::create(['department_id' => 20, 'name' => 'Ayabaca']);
        Province::create(['department_id' => 20, 'name' => 'Huancabamba']);
        Province::create(['department_id' => 20, 'name' => 'Morropón']);
        Province::create(['department_id' => 20, 'name' => 'Paita']);
        Province::create(['department_id' => 20, 'name' => 'Sullana']);
        Province::create(['department_id' => 20, 'name' => 'Talara']);
        Province::create(['department_id' => 20, 'name' => 'Sechura']);
        // Departamento: Puno (21)
        Province::create(['department_id' => 21, 'name' => 'Puno']);
        Province::create(['department_id' => 21, 'name' => 'Azángaro']);
        Province::create(['department_id' => 21, 'name' => 'Carabaya']);
        Province::create(['department_id' => 21, 'name' => 'Chucuito']);
        Province::create(['department_id' => 21, 'name' => 'El Collao']);
        Province::create(['department_id' => 21, 'name' => 'Huancané']);
        Province::create(['department_id' => 21, 'name' => 'Lampa']);
        Province::create(['department_id' => 21, 'name' => 'Melgar']);
        Province::create(['department_id' => 21, 'name' => 'Moho']);
        Province::create(['department_id' => 21, 'name' => 'San Antonio de Putina']);
        Province::create(['department_id' => 21, 'name' => 'San Román']);
        Province::create(['department_id' => 21, 'name' => 'Sandia']);
        Province::create(['department_id' => 21, 'name' => 'Yunguyo']);
        // Departamento: San Martín (22)
        Province::create(['department_id' => 22, 'name' => 'Moyobamba']);
        Province::create(['department_id' => 22, 'name' => 'Bellavista']);
        Province::create(['department_id' => 22, 'name' => 'El Dorado']);
        Province::create(['department_id' => 22, 'name' => 'Huallaga']);
        Province::create(['department_id' => 22, 'name' => 'Lamas']);
        Province::create(['department_id' => 22, 'name' => 'Mariscal Cáceres']);
        Province::create(['department_id' => 22, 'name' => 'Picota']);
        Province::create(['department_id' => 22, 'name' => 'Rioja']);
        Province::create(['department_id' => 22, 'name' => 'San Martín']);
        Province::create(['department_id' => 22, 'name' => 'Tocache']);
        // Departamento: Tacna (23)
        Province::create(['department_id' => 23, 'name' => 'Tacna']);
        Province::create(['department_id' => 23, 'name' => 'Candarave']);
        Province::create(['department_id' => 23, 'name' => 'Jorge Basadre']);
        Province::create(['department_id' => 23, 'name' => 'Tarata']);
        // Departamento: Tumbes (24)
        Province::create(['department_id' => 24, 'name' => 'Tumbes']);
        Province::create(['department_id' => 24, 'name' => 'Contralmirante Villar']);
        Province::create(['department_id' => 24, 'name' => 'Zarumilla']);
        // Departamento: Ucayali (25)
        Province::create(['department_id' => 25, 'name' => 'Coronel Portillo']);
        Province::create(['department_id' => 25, 'name' => 'Atalaya']);
        Province::create(['department_id' => 25, 'name' => 'Padre Abad']);
        Province::create(['department_id' => 25, 'name' => 'Purús']);
    }
}